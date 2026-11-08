// Warmtescan.nu — menu op mobiel, zoekveld en het aanvraagformulier.
(function () {
	'use strict';

	// Mobiel menu
	var kop = document.querySelector('.kop');
	var knop = document.querySelector('.menu-knop');
	if (kop && knop) {
		knop.addEventListener('click', function () {
			var open = kop.classList.toggle('open');
			knop.setAttribute('aria-expanded', open ? 'true' : 'false');
		});
	}

	// Zoekveld: springt naar de pagina die het best past
	var paginas = [
		{ url: '/', woorden: 'particulier home woning huis prijs kosten buiten binnen warmtescan rapport voorwaarden technologie flir camera isolatie verduurzamen' },
		{ url: '/zakelijkethermografie', woorden: 'zakelijk bedrijf oplevering bouw woningen bedrijfspand zonnepanelen wildbeheer maaien mapping 3d' },
		{ url: '/dronethermografie', woorden: 'drone dak zonnepanelen park wild reekalf search rescue vermissing mapping' },
		{ url: '/quickscanaanvraag', woorden: 'aanvraag aanvragen offerte prijsopgave formulier contact afspraak quickscan' },
		{ url: '/thermografie-uitgelegd', woorden: 'uitleg uitgelegd thermografie infrarood hoe werkt brievenbus latei kozijn glas rapportage informatie' }
	];
	var zoek = document.querySelector('.zoek');
	if (zoek) {
		zoek.addEventListener('submit', function (e) {
			e.preventDefault();
			var q = (zoek.q.value || '').toLowerCase().split(/\s+/).filter(Boolean);
			if (!q.length) return;
			var beste = null, score = 0;
			paginas.forEach(function (p) {
				var s = 0;
				q.forEach(function (w) { if (p.woorden.indexOf(w) !== -1) s++; });
				if (s > score) { score = s; beste = p; }
			});
			window.location.href = beste ? beste.url : '/thermografie-uitgelegd';
		});
	}

	// Aanvraagformulier: zet de gegevens in een e-mail aan frank@warmtescan.nu
	var form = document.querySelector('.formulier');
	if (form) {
		var start = Date.now();
		form.addEventListener('submit', function (e) {
			e.preventDefault();
			if (!form.reportValidity()) return;
			var v = function (n) { return (form.elements[n].value || '').trim(); };
			var interesse = Array.prototype.slice.call(form.querySelectorAll('input[name="interesse"]:checked'))
				.map(function (i) { return i.value; }).join(', ') || '-';
			var regels = [
				'Aanvraag vrijblijvende prijsopgave via warmtescan.nu',
				'',
				'Naam: ' + v('voornaam') + ' ' + v('achternaam'),
				'Adres: ' + v('adres'),
				'Woonplaats: ' + v('woonplaats'),
				'Telefoon: ' + (v('telefoon') || '-'),
				'E-mail: ' + v('email'),
				'Interesse: ' + interesse,
				'',
				'Opmerkingen:',
				v('opmerkingen') || '-'
			];
			var m = form.querySelector('.melding');
			var knop = form.querySelector('button[type=submit]');
			var viaMail = function () {
				var onderwerp = 'Aanvraag warmtescan - ' + v('woonplaats');
				window.location.href = 'mailto:frank@warmtescan.nu?subject=' + encodeURIComponent(onderwerp) +
					'&body=' + encodeURIComponent(regels.join('\n'));
				if (m) m.textContent = 'Uw mailprogramma opent met de aanvraag erin. Verstuur die mail, dan hoort u binnen 2 werkdagen van mij. Lukt het niet? Bel of app 06 12415418.';
			};
			var gegevens = {
				voornaam: v('voornaam'), achternaam: v('achternaam'), adres: v('adres'), woonplaats: v('woonplaats'),
				telefoon: v('telefoon'), email: v('email'), interesse: interesse === '-' ? '' : interesse,
				opmerkingen: v('opmerkingen'), website: v('website'), ms: Date.now() - start
			};
			if (knop) knop.disabled = true;
			if (m) m.textContent = 'Bezig met versturen…';
			fetch('/api/aanvraag', {
				method: 'POST',
				headers: { 'Content-Type': 'application/json' },
				body: JSON.stringify(gegevens)
			}).then(function (r) {
				return r.json().then(function (j) { return { ok: r.ok && j.ok, status: r.status, fout: j.fout }; });
			}).then(function (res) {
				if (res.ok) {
					form.reset();
					if (m) m.textContent = 'Bedankt! Uw aanvraag is binnen. U hoort binnen 2 werkdagen van mij.';
				} else if (res.status === 400 && res.fout) {
					if (m) m.textContent = res.fout;
				} else {
					viaMail();
				}
			}).catch(viaMail).then(function () { if (knop) knop.disabled = false; });
		});
	}
})();
