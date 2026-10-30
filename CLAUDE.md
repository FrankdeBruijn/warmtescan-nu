# warmtescan.nu

Website voor thermografische scans — dienst van Frank de Bruijn.

## Stack (herzien 2026-10-30)

**Statische onepager op Cloudflare Pages**, zelfde opzet als `frankdebruijn-com`:

- Eén pagina: `public/index.html` plus `public/assets/` (css, fonts, img, icons)
- Astro doet alleen de build (kopieert `public/` naar `dist/`); er zijn geen Astro-pagina's.
  Zo blijven de build-instellingen van het Pages-project ongewijzigd.
- Pages-project `warmtescan-nu` bouwt vanuit GitHub: elke push naar `main` deployt naar
  https://warmtescan-nu.pages.dev
- `public/_redirects` stuurt de oude Wix/WordPress-adressen (`/zakelijk`, `/drone`,
  `/aanvraag`, `/login-warmtescan`, ...) naar het juiste anker op de onepager
- `public/_headers` zet een strikte CSP: alleen eigen bestanden, geen scripts, geen
  externe bronnen. Voeg je iets externs toe, pas dan de CSP aan

```bash
npm run build                      # dist/
python3 -m http.server -d dist     # bekijken op http://localhost:8000
```

## Geschiedenis

- Tot okt 2026 draaide de site op Wix.
- Aug 2026: nagebouwd als WordPress-blokthema (subsite 5 op orangestock). Die versie is
  nooit live gegaan en is met het hele WordPress-netwerk opgeheven op 28-10-2026. Het thema
  staat nog als bron in `theme/warmtescan/`; daar komen de kleuren, het lettertype en de
  knopvormen van de onepager vandaan.
- 27-10-2026 besloten: website weg. 30-10-2026 teruggedraaid: de site komt terug als
  onepager op Cloudflare.

## Domein, DNS en mail

- Domein bij **TransIP** (Cloudflare Registrar kan geen .nu). Opgezegd per einde contract:
  **loopt af op 08-10-2027**. Wil Frank de site houden, dan vóór half september 2027
  beslissen over verlengen of verhuizen — zie `PROJECTEN/netwerk-systeembeheer/05-transip-afbouwen.md`.
- DNS-zone bij Cloudflare (nameservers april/rajeev).
- Mail: Cloudflare Email Routing, catch-all naar frankdebruijn@me.com. `frank@warmtescan.nu`
  op de site komt dus daar binnen. Versturen vanaf @warmtescan.nu kan niet.

## Contact op de site

Er is **geen formulier** (geen backend): de aanvraagknop is een `mailto:` met een
ingevuld sjabloon (naam, adres, woonplaats, interesse), plus het telefoonnummer.
- Telefoon: 06 12415418
- E-mail: frank@warmtescan.nu
- Handel, Noord-Brabant · KvK 81239661

## Content en beeld

`content/wix-export.md` bevat alle teksten van de Wix-site, `content/pages/` de
blokinhoud van de WordPress-pagina's, `content/images/` de originele beelden. De
verkleinde webversies staan in `public/assets/img/`.

Niet in git: `content/documenten/` (het voorbeeldrapport, 8 MB) en de
`STOCK-*`-bestanden met onduidelijke licentie. Beide staan bewust **niet** op de onepager.

## Nog te doen

- [ ] Voorbeeldrapport terugzetten? Eerst nakijken of er geen klantadres in staat
- [ ] Eigen beeld bij de voorwaarden (de WordPress-versie had een foto die alleen in de
      back-up `~/Backups/orangestock-2026-10-28/` op de MacBook staat)
