# warmtescan.nu

Website voor thermografische scans — dienst van Frank de Bruijn.

## Stack
- Astro (static site)
- Vanilla CSS (geen framework)
- Gehost op Cloudflare Pages — elke push naar `main` deployt automatisch

## Lokaal ontwikkelen
```bash
npm run dev      # start dev server op http://localhost:4321
npm run build    # build naar dist/
```

## Deployment
- GitHub: https://github.com/FrankdeBruijn/warmtescan-nu
- Cloudflare Pages: https://warmtescan-nu.pages.dev
- Live domein (nog te koppelen): https://warmtescan.nu

## Huidige situatie
De site draait nog op Wix; alleen de **DNS-zone** zit daar. Het domein staat gewoon
bij TransIP (de whois toont `Key-Systems GmbH`, maar dat is TransIP's eigen
registrar-backend — `orangestock.com` toont hetzelfde). Er is dus geen
domeinverhuizing nodig, alleen een nameserverwissel.

**Hosting herzien 2026-08-17: niet Cloudflare Pages, maar de orangestock-server**
(TransIP), naast frankdebruijn.com en rooyeplas. Mail gaat van Google Workspace
naar TransIP. Draaiboek: `PROJECTEN/wix-eruit/03-warmtescan-draaiboek.md`.

## Pagina's
- `/` — Home
- `/diensten`
- `/contact`

Nog te bouwen voor een volwaardige vervanger van de Wix-site (vergeleken
2026-08-17): `/zakelijkethermografie`, `/dronethermografie`,
`/thermografie-uitgelegd`, een werkend aanvraagformulier op `/quickscanaanvraag`
en een privacybeleid. Verder ontbreekt al het beeldmateriaal, en de footer moet
`frank@warmtescan.nu` noemen in plaats van `info@frankdebruijn.com`.
De Wix-klantlogin `/login-warmtescan` komt niet terug (301 naar `/`).

## Contactgegevens (voor in de site)
- Telefoon: +31 (0)6 12 41 54 18
- E-mail: info@frankdebruijn.com
- Adres: Krakenburg 23, 5341 BM Oss
- Werkgebied: Noord-Brabant en omgeving

## Doel
Exact nagebouwd naar de Wix-versie op warmtescan.nu.
Lichte, professionele uitstraling. Gericht op particulieren en bedrijven.
Wix weghalen zodra de site goedgekeurd is.
