# warmtescan.nu

Website voor thermografische scans — dienst van Frank de Bruijn.

## Stack (herzien 2026-08-17)

**WordPress-blokthema**, als subsite 5 in het orangestock-multisitenetwerk.
Niet meer Astro op Cloudflare Pages; die opzet is vervallen.

| | |
|---|---|
| Bouwadres | https://orangestock.com/warmtescan/ |
| blog_id | 5 |
| Thema | `warmtescan`, staat in `theme/warmtescan/` in deze repo |
| Server | zie `PROJECTEN/orangestock/CLAUDE.md`, `ssh orangestock` |
| Draaiboek migratie | `PROJECTEN/wix-eruit/03-warmtescan-draaiboek.md` |

Het thema is opgezet als getrouwe nabouw van de Wix-site: limoen `#CEEB4C`,
olijf `#758C10`, zwarte knoppen met radius 10, omlijnde pills met radius 50.
Gotham is betaald en vervangen door Montserrat, zelf gehost in
`theme/warmtescan/assets/fonts/` — dus geen verbinding met Google.

Deployen gaat met rsync naar `~/www/wp-content/themes/warmtescan/`; pagina's met
`wp post update <id> <bestand> --url=orangestock.com/warmtescan/`.

De Astro-map (`src/`, `astro.config.mjs`, `package.json`) staat er nog maar wordt
niet meer gebruikt. Mag weg zodra de WordPress-versie live staat.

## Repo
- GitHub: https://github.com/FrankdeBruijn/warmtescan-nu
- Oude Cloudflare Pages-omgeving: `warmtescan-nu.pages.dev` (vervalt)

## Huidige situatie
De site draait nog op Wix; alleen de **DNS-zone** zit daar. Het domein staat gewoon
bij TransIP (de whois toont `Key-Systems GmbH`, maar dat is TransIP's eigen
registrar-backend — `orangestock.com` toont hetzelfde). Er is dus geen
domeinverhuizing nodig, alleen een nameserverwissel.

**Hosting herzien 2026-08-17: niet Cloudflare Pages, maar de orangestock-server**
(TransIP), naast frankdebruijn.com en rooyeplas. Mail gaat van Google Workspace
naar TransIP. Draaiboek: `PROJECTEN/wix-eruit/03-warmtescan-draaiboek.md`.

## Pagina's

| Pagina | blog-id | Stand |
|---|---|---|
| `/` (home) | 12 | ✅ nagebouwd naar de Wix-versie |
| `/zakelijk` | 13 | ✅ nagebouwd |
| `/drone` | 14 | inhoud klaar, vormgeving nog niet gelijkgetrokken |
| `/thermografie-uitgelegd` | 15 | inhoud klaar, vormgeving nog niet gelijkgetrokken |
| `/aanvraag` | 16 | formulier werkt, vormgeving nog niet gelijkgetrokken |
| `/privacy` | 17 | ✅ nieuw, met KvK 81239661 |

De Wix-klantlogin `/login-warmtescan` komt niet terug; die krijgt bij livegang
een 301 naar `/`.

## Content en beeld

`content/wix-export.md` bevat alle teksten van de Wix-site, opgehaald met
Playwright omdat ze achter JavaScript zitten. `content/images/` bevat de
originelen, `content/pages/` de blokinhoud van elke pagina.

Niet in git: `content/documenten/` (het voorbeeldrapport, 8 MB) en de
`STOCK-*`-bestanden met onduidelijke licentie.

## Het formulier

`theme/warmtescan/inc/formulier.php`: shortcode `[warmtescan_formulier]`, met
honeypot en minimale invultijd in plaats van een captcha. Elke aanvraag wordt
gemaild **en** opgeslagen als berichttype "Aanvraag", zodat een misgelopen mail
niet betekent dat de klant weg is.

Verzending via `smtp.transip.email`; de inloggegevens staan in `wp-config.php`
op de server en lezen het wachtwoord uit `~/warmtescan-smtp.pass`, buiten de
webroot. Nooit in deze repo.

## Nog te doen

- [ ] Drone, Uitgelegd en Aanvraag langs dezelfde vormgeving als home en zakelijk
- [ ] Twee stockfoto's vervangen door eigen werk (licentie onduidelijk)
- [ ] Bij de cutover een `search-replace` over de database: de afbeeldings-URL's
      wijzen nu naar orangestock.com

## Contactgegevens (voor in de site)
- Telefoon: +31 (0)6 12 41 54 18
- E-mail: info@frankdebruijn.com
- Adres: Krakenburg 23, 5341 BM Oss
- Werkgebied: Noord-Brabant en omgeving

## Doel
Exact nagebouwd naar de Wix-versie op warmtescan.nu.
Lichte, professionele uitstraling. Gericht op particulieren en bedrijven.
Wix weghalen zodra de site goedgekeurd is.
