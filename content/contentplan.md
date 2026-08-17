# Contentplan warmtescan.nu

Opgesteld 2026-08-17, op basis van [`wix-export.md`](wix-export.md) — de teksten
die nu live staan. Dit plan gaat vóór de bouw uit, volgens de vaste projectcyclus.

Bouwvorm: WordPress-blokthema `warmtescan` op subsite 5 van het
orangestock-netwerk, in dezelfde opzet als `rooyeplas` en `frankdebruijn`.

## Uitgangspunt

De huidige site werkt inhoudelijk: er staat een duidelijk aanbod, echte prijzen en
concrete voorwaarden. Het is geen herpositionering maar een verhuizing. Wat we
meenemen blijft dus grotendeels zoals het is; wat we verbeteren staat onderaan als
apart lijstje, zodat je kunt zien wat er verandert en waarom.

## Structuur

| Nieuwe URL | Oude Wix-URL | Pagina |
|---|---|---|
| `/` | `/` | Home — particulier |
| `/zakelijk` | `/zakelijkethermografie` | Zakelijk |
| `/drone` | `/dronethermografie` | Drone-thermografie |
| `/thermografie-uitgelegd` | `/thermografie-uitgelegd` | Uitgebreide informatie |
| `/aanvraag` | `/quickscanaanvraag` | Aanvraagformulier |
| `/privacy` | `/blank` (bestond niet) | Privacyverklaring |
| — | `/login-warmtescan` | vervalt → 301 naar `/` |

Alle oude URL's krijgen een 301 naar de nieuwe. De enige die ongewijzigd blijft is
`/thermografie-uitgelegd`, want die is al goed.

Menu: **Particulier · Zakelijk · Drone · Uitgelegd · Aanvraag**, met de
aanvraagknop visueel apart. Zelfde volgorde als nu, zodat je niets hoeft af te
leren. De zoekbalk uit de Wix-header vervalt: op zes pagina's zoekt niemand.

---

## `/` — Home

**Titel:** Thermografie en warmtescans in Noord-Brabant | Warmtescan.nu
**Meta:** Doe je warmtescan.nu en breng je warmteverlies inzichtelijk. Stap 1 naar
verduurzamen. Level 1 gecertificeerd thermograaf, werkzaam in Noord-Brabant.

### Hero

**Stap 1 in verduurzamen**

Doe de Warmtescan.nu en maak je warmteverlies inzichtelijk.

→ *Ik wil een warmtescan* (naar `/aanvraag`)

Beeld: `warmtebeeld-ramen-flir-e53.jpg` — een echte opname uit je eigen werk, geen
stockfoto. Die laat in één beeld zien wat de dienst oplevert.

### Wat je krijgt

Vier blokken, met de prijzen zoals ze nu op de site staan:

**Warmtescan buiten** — Met een thermografische camera fotograferen we rondom je
huis. Duur ongeveer 15 tot 30 minuten. Gemiddeld € 95 tot € 135, exclusief
kilometervergoeding en btw.

**Warmtescan binnen & buiten** — Zowel binnen als buiten worden de warmtebeelden
gemaakt. Duur ongeveer een uur. Gemiddeld € 195 tot € 225, exclusief
kilometervergoeding en btw.

**Drone-opnames** — Warmtebeeldopnames met de drone, ook thermal mapping. Of het
kan, hangt af van het adres — daarom vragen we daar in het formulier naar.

**Rapportage** — Binnen vier dagen ontvang je per mail een pdf-rapport. Het rapport
zit bij de prijs in.

### Voorwaarden voor een goede meting

- Minimaal 10 graden verschil tussen binnen en buiten, en geen direct zonlicht
- Geen regen — dat beïnvloedt de meting direct
- Maximaal windkracht 2 à 3, want wind beïnvloedt de temperatuur van gevels en daken

Dit blok blijft prominent staan. Het voorkomt afspraken die toch niet doorgaan, en
het laat zien dat je weet waar je het over hebt.

### De techniek

FLIR E53 warmtebeeldcamera · DJI Mavic 2 Enterprise Advanced (dual camera) met
RTK-module · Pix4D mapping-software.

### Afsluiter

**Klaar voor inzicht in je warmteverlies?**
→ *Vraag een prijsopgave aan*

---

## `/zakelijk` — Zakelijk

**Titel:** Zakelijke thermografie en bouwoplevering | Warmtescan.nu
**Meta:** Thermografische inspectie van woningen en bedrijfspanden bij oplevering,
zonnepaneelinspectie, wildbeheer en 3D drone-mapping in Noord-Brabant.

**H1:** Zakelijk

Meerdere woningen voor oplevering thermografisch laten inspecteren, of als
onafhankelijk thermograaf één woning laten beoordelen — beide kan. Neem contact op
via mail of telefoon (06 12 41 54 18), dan kom ik langs om de mogelijkheden te
bespreken. De scans worden gemaakt door een Level 1 gecertificeerd thermograaf.

Vier genummerde blokken, tekst ongewijzigd overgenomen:

1. **Warmtescan bouw** — meerdere woningen of bedrijfspanden bij oplevering laten
   inspecteren, snel met de buiten-warmtescan, eventueel uitgebreid met drone-opnames
2. **Zonnepanelen-inspectie** — via mapping met een drone met warmtebeeldcamera
   grote hoeveelheden panelen in korte tijd inspecteren
3. **Wildbeheer of maaioppervlak** — dieren opsporen voor wildbeheer, en velden
   controleren vóór het maaien om nesten en jonge reeën te vinden
4. **3D drone-mapping** — een gebied snel in kaart brengen, met RTK tot op de
   centimeter nauwkeurig, eventueel met GCP's, inclusief photogrammetry voor een
   3D-weergave van een gebouw of object

---

## `/drone` — Drone-thermografie

**Titel:** Drone-thermografie: daken, zonnepanelen en mapping | Warmtescan.nu
**Meta:** Met een warmtebeelddrone daken, zonnepanelen en terreinen inspecteren.
Ook thermal mapping en inzet bij wildbeheer.

**H1:** Drone-thermografie

Met een drone wordt het bereik flink groter. Lekkages en isolatieproblemen bij
daken of op hoogte zijn zo goed te inspecteren, en zonnepanelen gaan snel en
efficiënt. Door met mapping te werken is een groot oppervlak in korte tijd gedaan.

Vier toepassingen: **Drone-quickscan** (warmteverlies via het dak, plus thermal
mapping) · **Zonnepanelen** (zien welke panelen deels of geheel defect zijn, zeer
geschikt voor parken) · **Wildbeheer** (dieren spotten, en velden scannen vóór het
maaien) · **Search & Rescue** (snel inzetbaar bij vermissingen).

Toevoegen, want het staat nu alleen op de uitleg-pagina: dat er altijd naar het
adres wordt gevraagd om vooraf te bepalen of daar gevlogen mag worden.

---

## `/thermografie-uitgelegd` — Uitgebreide informatie

**Titel:** Hoe werkt een warmtescan? Thermografie uitgelegd | Warmtescan.nu
**Meta:** Wat thermografie is, hoe je warmtebeelden leest, en wat het verschil is
tussen een warmtescan binnen en buiten.

De langste en inhoudelijk sterkste pagina van de site. Tekst integraal overnemen,
in vier delen: *Wat is thermografie?* · *Warmtescan buiten en binnen* ·
*Drone-thermografie* · *Rapportage*.

Op Wix zat de eerste alinea achter een "Lees meer"-knop. Dat halen we weg: deze
tekst is precies waarvoor mensen op deze pagina komen, en verborgen tekst telt ook
minder mee voor Google.

Drie afbeeldingen met de bijschriften die er al staan: warmteverlies bij de ramen,
de brievenbus, en de drone-opname. **De laatste twee moeten nog uit de
Wix-media-export komen** — die staan niet in de gedownloade set.

---

## `/aanvraag` — Aanvraag

**Titel:** Warmtescan aanvragen — vrijblijvende prijsopgave | Warmtescan.nu
**Meta:** Vraag vrijblijvend een prijsopgave aan voor een warmtescan of
drone-inspectie.

Velden ongewijzigd overnemen: voornaam, achternaam, adres, woonplaats, telefoon,
e-mailadres, zes vinkjes (Warmtescan buiten / binnen / drone, zonnepanelen-inspectie,
thermal mapping, wildbeheer) en een opmerkingenveld.

Adres blijft verplicht — dat is nodig om te bepalen of er ter plekke met een drone
gevlogen mag worden.

Onder het formulier: *Na het versturen kunnen wij je een vrijblijvende offerte
sturen, en aangeven welke vergunningen eventueel nodig zijn voor drone-opnames.*

Nieuw: een korte regel over wat er met je gegevens gebeurt, met een link naar
`/privacy`. Dat hoort er wettelijk bij en het ontbreekt nu.

### Techniek achter het formulier

- Verzenden via SMTP op `smtp.transip.email`, met de mailbox `frank@warmtescan.nu`.
  SPF en DKIM staan al goed in de TransIP-zone, dus de aanvraag komt niet in de spam
- **Elke inzending wordt ook in de database opgeslagen**, niet alleen gemaild. Bij
  Wix stonden ze in het dashboard; gaat de mail een keer mis, dan is de aanvraag
  anders weg
- Spambescherming zonder captcha: een honeypot-veld plus een minimale invultijd.
  Geen Google reCAPTCHA — dat kost je bezoekers privacy en de site snelheid

---

## `/privacy` — Privacyverklaring

Nieuw. Op de huidige site linkt de cookiemelding naar `/blank`, en die pagina
bestaat niet — terwijl het formulier naam, adres, telefoonnummer en e-mailadres
verzamelt. Dat moet geregeld zijn.

Inhoud: welke gegevens je via het formulier ontvangt, waarvoor je ze gebruikt
(offerte uitbrengen en de scan uitvoeren), hoe lang je ze bewaart, dat ze niet
worden gedeeld, en hoe iemand inzage of verwijdering kan vragen. Plus je
bedrijfsgegevens en KvK-nummer.

**Van jou nodig:** KvK-nummer, en of je een bewaartermijn wilt noemen.

Cookies: de nieuwe site heeft er geen nodig — geen analytics, geen externe
lettertypen, geen ingesloten video. Dan hoeft er ook geen cookiebanner te komen.
Wil je later toch statistieken, kies dan iets dat zonder cookies werkt.

---

## Footer

Frank de Bruijn · Level 1 gecertificeerd thermograaf · Certified Drone Pilot
M. 06 12 41 54 18 · frank@warmtescan.nu
LinkedIn · Facebook
Werkgebied: Noord-Brabant en omgeving

Let op: het mailadres is `frank@warmtescan.nu`, niet `info@frankdebruijn.com` —
dat laatste stond ten onrechte in de oude Astro-opzet.

---

## Vormgeving

Licht en zakelijk, met het warmtebeeld als enige kleuraccent. Thermografie heeft
een eigen, herkenbaar kleurenpalet — zwart via blauw en rood naar wit — en dat is
mooi genoeg om de site op te bouwen zonder er versiering bij te verzinnen.

- Achtergrond wit tot lichtgrijs, tekst bijna zwart, ruim wit rondom
- Eén accentkleur uit het warmtebeeldpalet voor knoppen en links
- Systeemlettertypen: geen Google Fonts, dat scheelt een externe verbinding en een
  privacyprobleem
- De beelden doen het werk. Bij deze dienst is één goede warmteopname overtuigender
  dan welke tekst dan ook

## Wat er verandert ten opzichte van nu

1. **Privacyverklaring komt er echt** — nu een dode link
2. **De klantlogin vervalt** — 301 naar de homepage
3. **Formulier-inzendingen worden bewaard**, niet alleen gemaild
4. **Geen zoekbalk en geen chatwidget** — die voegen op zes pagina's niets toe
5. **"Lees meer"-inklap weg** op de uitleg-pagina
6. **Stockfoto's eruit**, eigen beeld erin

## Open punten — hier heb ik jou voor nodig

- [ ] **Kloppen de prijzen nog?** Ze staan er sinds 2022 (€ 95–135 buiten,
      € 195–225 binnen & buiten). Dit is hét moment om ze bij te stellen
- [ ] **KvK-nummer** voor de privacyverklaring
- [ ] **Twee afbeeldingen** uit de Wix-media-export: de brievenbus en de
      drone-opname van `/thermografie-uitgelegd`
- [ ] **Eigen beeld** ter vervanging van de twee stockfoto's — je hebt genoeg
      eigen thermografie- en drone-opnames
- [ ] Is "Search & Rescue" nog een dienst die je aanbiedt, of mag die weg?
