# warmtescan.nu

Website voor thermografische scans — dienst van Frank de Bruijn.

## Stack (herzien 2026-11-07)

**Statische site op Cloudflare Pages, exact nagebouwd naar de oude Wix-site** (vijf pagina's op
dezelfde adressen als op Wix, dus geen SEO-verlies):

| Bestand | Adres |
|---|---|
| `public/index.html` | `/` (Particulier) |
| `public/zakelijkethermografie.html` | `/zakelijkethermografie` |
| `public/dronethermografie.html` | `/dronethermografie` |
| `public/quickscanaanvraag.html` | `/quickscanaanvraag` |
| `public/thermografie-uitgelegd.html` | `/thermografie-uitgelegd` |

- Opmaak in `public/assets/css/wix.css`, gemeten op de Wayback-snapshots van april 2026
  (`web.archive.org/web/2026*/warmtescan.nu/*`). Kleuren: lichtgrijs `#f7f7f7`, limoen
  `#ceeb4c`, olijf `#758c10`, grijs vlak `#cccccc`. Wix gebruikte **Gotham** (commercieel,
  zelf geüpload); hier staat **Montserrat** als vrije vervanger.
- Beelden in `public/assets/wix/`, verkleind uit de originelen die nog op de Wix-CDN staan
  (`static.wixstatic.com/media/<id>` zonder `/v1/...` geeft het origineel). De originelen
  staan lokaal in `content/wix-origineel/` (gitignored).
- **Niet overgenomen, bewust:** de twee Wix-stockfoto's (huis onder water bij de voorwaarden,
  stockfoto op de aanvraagpagina; Wix-licentie geldt alleen op Wix) en het iStock-preview-icoon
  bij "Drone opnames". Daar staan eigen warmtebeelden en een eigen drone-icoon.
- **Apparatuur (bijgewerkt 08-11-2026):** HIKMICRO M60 (eigen camera) en DJI Mavic 3 Thermal
  (gehuurd bij DroneLand). Beelden `assets/wix/m60.png` (officiële HIKMICRO-render, via een
  dealer-webshop; hikmicrotech.com blokkeert downloads) en `assets/wix/mavic3.png` (DJI-render van
  de Mavic 3 Enterprise-serie, enterprise.dji.com). Vervangen: FLIR E53 en Mavic 2 Enterprise Advanced.
- Mailhandtekening: `content/mail/handtekening.html` (in Safari openen, kopiëren, plakken in
  Mail → Instellingen → Handtekeningen, "Warmtescan 2026"). Het logo laadt van warmtescan.nu.
- Header zonder "Login" (Wix-ledenlogin, vervallen). Het zoekveld werkt: springt naar de
  best passende pagina (`public/assets/js/site.js`).
- **Aanvraagformulier** ziet eruit als op Wix, maar heeft geen backend: bij verzenden opent het
  mailprogramma van de bezoeker met een ingevulde mail aan frank@warmtescan.nu. Mogelijke
  upgrade: Pages Function die via de Cloudflare Email Service-API naar frankdebruijn@me.com
  stuurt (gratis naar geverifieerde adressen).
- `public/_redirects`: oude Wix-varianten (`/kopie-van-*`, `/product-page/*`, ...) en de
  WordPress/onepager-adressen naar de juiste pagina.
- `public/_headers`: strikte CSP, alleen eigen bestanden; `script-src 'self'` voor site.js.
  **Geen inline `style=""`** gebruiken, die blokkeert de CSP. Klassen in wix.css.
- Astro doet alleen de build (kopieert `public/` naar `dist/`). Pages-project `warmtescan-nu`
  hoort vanuit GitHub te bouwen bij elke push naar `main`.
- **Let op (07-11-2026):** dat gebeurde niet. warmtescan.nu én warmtescan-nu.pages.dev
  serveerden nog de allereerste Astro-versie (oranje, "Home — Warmtescan.nu", met woonadres in
  de footer); ook de onepager van 30-10 is dus nooit live geweest. Commits krijgen geen
  Cloudflare-check op GitHub. Vermoedelijke oorzaak (zelfde als bij frankdebruijn-com in okt):
  de GitHub-app "Cloudflare Workers and Pages" heeft geen toegang tot deze repo. Controleren na
  een push: `curl -s https://warmtescan-nu.pages.dev/ | grep -o '<title>[^<]*'`.

```bash
npm run build                      # dist/
python3 -m http.server -d dist     # bekijken; lokaal wel met .html achter de subpagina's
```

## Geschiedenis

- Tot okt 2026 draaide de site op Wix.
- Aug 2026: nagebouwd als WordPress-blokthema (subsite 5 op orangestock). Die versie is
  nooit live gegaan en is met het hele WordPress-netwerk opgeheven op 28-10-2026. Het thema
  staat nog als bron in `theme/warmtescan/`; daar komen de kleuren, het lettertype en de
  knopvormen van de onepager vandaan.
- 27-10-2026 besloten: website weg. 30-10-2026 teruggedraaid: de site komt terug als
  onepager op Cloudflare.
- 07-11-2026: onepager vervangen door een exacte nabouw van de Wix-site (Frank wilde "hetzelfde
  als ik had"; veel bezoekers nu het koud wordt). Frank blijft warmtescan doen.

## Domein, DNS en mail

- Domein bij **TransIP** (Cloudflare Registrar kan geen .nu). Opgezegd per einde contract:
  **loopt af op 08-10-2027**. Wil Frank de site houden, dan vóór half september 2027
  beslissen over verlengen of verhuizen — zie `PROJECTEN/netwerk-systeembeheer/05-transip-afbouwen.md`.
- DNS-zone bij Cloudflare (nameservers april/rajeev).
- Mail (sinds 08-11-2026): **iCloud+ eigen e-maildomein**, op het Apple-account
  frankdebruijn@me.com. Records gezet via Domain Connect vanuit iCloud: MX mx01/mx02.mail.icloud.com,
  TXT `apple-domain=…`, SPF `v=spf1 include:_spf.mx.cloudflare.net include:icloud.com ~all`, CNAME
  `sig1._domainkey` (DKIM). De MX-records van Cloudflare Email Routing zijn daarbij vervangen.
  - Eén postvak: mail aan @warmtescan.nu en @me.com komt in dezelfde iCloud-inbox. Scheiden kan
    met een regel in iCloud Mail (aan frank@warmtescan.nu → map Warmtescan).
  - Outlook: IMAP imap.mail.me.com:993 SSL, SMTP smtp.mail.me.com:587 STARTTLS, gebruikersnaam
    frankdebruijn@me.com, app-specifiek wachtwoord. Dat account verstuurt als frank@warmtescan.nu.
  - Opruimen: Email Routing in Cloudflare uitzetten, en daarna `include:_spf.mx.cloudflare.net`
    uit de SPF halen.

## Contact op de site

Het formulier op `/quickscanaanvraag` maakt een ingevulde `mailto:` (zie boven), plus het
telefoonnummer.
- Telefoon: 06 12415418
- E-mail: frank@warmtescan.nu
- Oss, Noord-Brabant · KvK 81239661

## Content en beeld

`content/wix-export.md` bevat alle teksten van de Wix-site, `content/pages/` de
blokinhoud van de WordPress-pagina's, `content/images/` de originele beelden. De
verkleinde webversies staan in `public/assets/img/`.

Niet in git: `content/documenten/` (het voorbeeldrapport, 8 MB) en de
`STOCK-*`-bestanden met onduidelijke licentie. Beide staan bewust **niet** op de onepager.

## Offertes (privé)

`offertes/` is een eigen **privérepo**,
[warmtescan-offertes](https://github.com/FrankdeBruijn/warmtescan-offertes), en wordt door
deze repo genegeerd, omdat deze repo publiek is. Er staan klantnamen, adressen en prijzen in.
Na een clone: `gh repo clone FrankdeBruijn/warmtescan-offertes offertes`.
Pdf's maken in de huisstijl: `python3 offertes/maak-pdf.py`.

## Nog te doen

- [ ] Voorbeeldrapport terugzetten? Eerst nakijken of er geen klantadres in staat
- [ ] Eigen beeld bij de voorwaarden (de WordPress-versie had een foto die alleen in de
      back-up `~/Backups/orangestock-2026-10-28/` op de MacBook staat)
- [x] **Site live (08-11-2026):** Frank gaf de GitHub-app toegang, de lege commit 9756bc4 startte de
      build, Cloudflare-check geslaagd. warmtescan.nu en www tonen de vijf Wix-pagina's, het oude
      woonadres staat er niet meer op. Oorspronkelijke notitie:
- [ ] ~~Site live krijgen (07-11-2026):~~ Frank geeft de GitHub-app "Cloudflare Workers and Pages"
      toegang tot `warmtescan-nu` (GitHub → Settings → Applications → Configure). Plan B:
      `npx wrangler login` (door Frank) en dan `npx wrangler pages deploy dist --project-name warmtescan-nu`.
      Daarna controleren dat het custom domain warmtescan.nu aan het Pages-project hangt.
- [x] **Mailen vanaf frank@warmtescan.nu (08-11-2026):** via iCloud+, zie *Domein, DNS en mail*.
      Een formulier-backend moet voortaan via frankdebruijn.com sturen; Email Routing is hier weg.
- [ ] Email Routing in Cloudflare uitzetten en SPF opschonen (zie boven).
- [ ] **Domeinopzegging terugdraaien** bij TransIP (loopt af 08-10-2027), want Frank gaat door.
