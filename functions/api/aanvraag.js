// Pages Function: POST /api/aanvraag
// Ontvangt het aanvraagformulier en mailt het naar Frank via Cloudflare Email Service (REST API).
//
// Instellingen (Pages-project → Settings → Variables and Secrets):
//   CF_ACCOUNT_ID   Cloudflare-account-id (variabele)
//   CF_EMAIL_TOKEN  API-token met "Email Sending: Edit" (secret, nooit in de repo)
//   MELDING_AAN     waar de aanvraag heen gaat; moet een geverifieerd adres zijn (gratis)
//                   standaard frankdebruijn@me.com
//   MELDING_VAN     afzender, op een domein met Email Routing; standaard formulier@frankdebruijn.com
//   BEVESTIGING     "aan" = de klant krijgt ook een bevestigingsmail. Vereist Workers Paid
//                   en warmtescan.nu onboarded bij Email Sending. Standaard uit.
//
// Werkt het versturen niet, dan antwoordt de functie met een fout en valt site.js terug op mailto,
// zodat er geen aanvraag verloren gaat.

const VELDEN = {
	voornaam: 80, achternaam: 80, adres: 150, woonplaats: 80,
	telefoon: 30, email: 120, interesse: 300, opmerkingen: 3000,
};
const EMAIL_RE = /^[^\s@<>]+@[^\s@<>]+\.[^\s@<>]+$/;

const json = (status, body) => Response.json(body, { status, headers: { "Cache-Control": "no-store" } });
const enkeleRegel = (s) => s.replace(/[\r\n\t]+/g, " ");
const esc = (s) => s.replace(/[&<>"']/g, (c) => ({ "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;" }[c]));

async function stuur(env, bericht) {
	const r = await fetch(
		`https://api.cloudflare.com/client/v4/accounts/${env.CF_ACCOUNT_ID}/email/sending/send`,
		{
			method: "POST",
			headers: { Authorization: `Bearer ${env.CF_EMAIL_TOKEN}`, "Content-Type": "application/json" },
			body: JSON.stringify(bericht),
		},
	);
	const data = await r.json().catch(() => ({}));
	if (!r.ok || !data.success) {
		throw new Error(`Email Service ${r.status}: ${JSON.stringify(data.errors ?? data).slice(0, 300)}`);
	}
	return data;
}

export async function onRequestPost({ request, env }) {
	if (!(request.headers.get("Content-Type") || "").includes("application/json")) {
		return json(415, { ok: false, fout: "Verkeerd formaat" });
	}
	let d;
	try {
		d = await request.json();
	} catch {
		return json(400, { ok: false, fout: "Ongeldige aanvraag" });
	}

	// Spamfilter: verborgen veld dat mensen niet zien, en minimaal 3 seconden invultijd.
	if (d.website || (Number(d.ms) > 0 && Number(d.ms) < 3000)) {
		return json(200, { ok: true });
	}

	const v = {};
	for (const [k, max] of Object.entries(VELDEN)) {
		const s = String(d[k] ?? "").trim();
		if (s.length > max) return json(400, { ok: false, fout: `Het veld ${k} is te lang.` });
		v[k] = k === "opmerkingen" ? s : enkeleRegel(s);
	}
	if (!v.voornaam || !v.achternaam || !v.adres || !v.woonplaats || !EMAIL_RE.test(v.email)) {
		return json(400, { ok: false, fout: "Vul alle verplichte velden in." });
	}
	if (!env.CF_ACCOUNT_ID || !env.CF_EMAIL_TOKEN) {
		return json(503, { ok: false, fout: "Formulier nog niet ingesteld." });
	}

	const regels = [
		["Naam", `${v.voornaam} ${v.achternaam}`],
		["Adres", v.adres],
		["Woonplaats", v.woonplaats],
		["Telefoon", v.telefoon || "-"],
		["E-mail", v.email],
		["Interesse", v.interesse || "-"],
	];
	const tekst = [
		"Nieuwe aanvraag via warmtescan.nu/quickscanaanvraag",
		"",
		...regels.map(([k, w]) => `${k}: ${w}`),
		"",
		"Opmerkingen:",
		v.opmerkingen || "-",
		"",
		"Beantwoorden gaat rechtstreeks naar de aanvrager.",
	].join("\n");
	const html =
		`<p>Nieuwe aanvraag via <a href="https://warmtescan.nu/quickscanaanvraag">warmtescan.nu</a></p>` +
		`<table cellpadding="4" style="border-collapse:collapse;font-family:Helvetica,Arial,sans-serif;font-size:14px">` +
		regels.map(([k, w]) => `<tr><td style="color:#758c10"><b>${k}</b></td><td>${esc(w)}</td></tr>`).join("") +
		`</table><p><b>Opmerkingen</b><br>${esc(v.opmerkingen || "-").replace(/\n/g, "<br>")}</p>` +
		`<p style="color:#888">Beantwoorden gaat rechtstreeks naar de aanvrager.</p>`;

	try {
		await stuur(env, {
			to: env.MELDING_AAN || "frankdebruijn@me.com",
			from: { address: env.MELDING_VAN || "formulier@frankdebruijn.com", name: "Warmtescan.nu formulier" },
			reply_to: v.email,
			subject: `Aanvraag warmtescan - ${v.woonplaats}`,
			text: tekst,
			html,
		});
	} catch (e) {
		console.error("Melding versturen mislukt:", e.message);
		return json(502, { ok: false, fout: "Versturen mislukt." });
	}

	if (env.BEVESTIGING === "aan") {
		const groet = `Beste ${v.voornaam},`;
		const bTekst = [
			groet, "",
			"Bedankt voor uw aanvraag bij Warmtescan.nu. Ik heb hem goed ontvangen en reageer binnen 2 werkdagen met een vrijblijvende prijsopgave.",
			"", "Met vriendelijke groet,", "Frank de Bruijn", "Warmtescan.nu · 06 12415418",
		].join("\n");
		try {
			await stuur(env, {
				to: v.email,
				from: { address: "frank@warmtescan.nu", name: "Frank de Bruijn | Warmtescan.nu" },
				reply_to: "frank@warmtescan.nu",
				subject: "Uw aanvraag bij Warmtescan.nu is ontvangen",
				text: bTekst,
				html: `<p>${esc(groet)}</p><p>Bedankt voor uw aanvraag bij Warmtescan.nu. Ik heb hem goed ontvangen en reageer binnen 2 werkdagen met een vrijblijvende prijsopgave.</p><p>Met vriendelijke groet,<br>Frank de Bruijn<br>Warmtescan.nu · 06 12415418</p>`,
			});
		} catch (e) {
			// De aanvraag zelf is binnen; een mislukte bevestiging mag de bezoeker niet tegenhouden.
			console.error("Bevestiging versturen mislukt:", e.message);
		}
	}

	return json(200, { ok: true });
}

export function onRequest() {
	return json(405, { ok: false, fout: "Alleen POST" });
}
