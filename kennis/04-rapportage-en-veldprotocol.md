# 04 - Rapportage-standaard en veldprotocol

Opgesteld 2026-11-06. Onderdeel van de kennisbank Warmtescan.nu. Rolverdeling: Claude maakt het opnameplan, analyseert de beelden en schrijft het rapport; Frank is operator in het veld. Apparatuur: HIKMICRO M60 (640x480) en soms een gehuurde DJI Mavic 3 Thermal (M3T).

## Samenvatting

- **Een goed rapport staat of valt met drie dingen**: (1) meetcondities en instellingen volledig vastgelegd, (2) elk beeld ondubbelzinnig aan een adres gekoppeld, (3) voorzichtige formuleringen ("zichtbaar" vs "vermoedelijk"). Dat zijn precies de pijnpunten uit Franks mails. Dit document lost ze op met een vast sjabloon, een vaste veldvolgorde en een verzendchecklist.
- **Norm-situatie**: EN 13187 (1998) is vervangen door **EN ISO 6781-1:2023** (algemene procedure, kwalitatief). **ISO 6781-3:2015** gaat over kwalificatie van personeel (drie klassen), niet over de rapportinhoud. De normteksten zitten achter een betaalmuur en zijn niet gelezen; de drempelwaarden hieronder komen uit het Kiwa-BDA-infoblad en uit praktijk, en zijn als richtwaarde gemarkeerd. **Actie voor Frank: de norm (of een samenvatting van je cursusmateriaal) naast dit document leggen en de richtwaarden bevestigen.**
- **Let op, formeel punt**: Frank is Level 1. Het rapport moet een mens met certificaat als verantwoordelijke noemen. Claude is geen gecertificeerd persoon. Zet in elk rapport de werkelijke rolverdeling, zie 1.0, en laat Frank het rapport inhoudelijk accorderen voor verzending. Check of een Level 1 onder de eigen cursusregels zelfstandig mag rapporteren, anders is een Level 2 als eindverantwoordelijke nodig.
- **Uitlezen van radiometrische data**: DJI M3T is goed uitleesbaar (DJI Thermal SDK, `thermal_parser`, Thermal-Tools voor macOS via Docker). HIKMICRO M60 is minder open: de officiele route is **HIKMICRO Analyzer (alleen Windows)** met CSV-export van de temperatuurmatrix. Een open-source decoder voor HIKMICRO is niet gevonden. Praktische route staat in sectie 2.5.
- **SwissTransfer**: gratis tot 50 GB, maar max 30 dagen bewaartermijn, dus niet "verloopt nooit". Voor klantleveringen: eigen vaste link plus een kopie per mail (PDF onder 10 MB).

---

## 0. Bronnenoverzicht: wat is gelezen en wat niet

| Bron | Gelezen? | Oordeel |
|---|---|---|
| Kiwa BDA infoblad "Infrarood opname" (2022) | Ja, volledig | Goed voor randvoorwaarden en taalgebruik ("schijnbare temperaturen", kwalitatief conform NEN-EN 13187). Geen rapportsjabloon. |
| Ing.bureau Van der Kleij, "Thermografisch onderzoek met blowerdoortest Stadswaardenlaan Arnhem" (opdrachtgever gemeente Arnhem, 2021) | Ja, de eerste ~6 pagina's tekst | **Goed**: gegevenstabel (datum, ordernummer, wie inspecteert, camera, buitentemp, RV, wind, richting, luchtdruk, binnentemp), doel, werkwijze met tijden, verbeterpunten met concreet advies, conclusie, bijlagen met buiten-/binnenopnamen. **Mist (in het gelezen deel)**: emissiviteit/reflectietemperatuur, kalibratie, certificaat van de thermograaf, zekerheidsniveau per bevinding, bewolking/neerslag/zon. |
| Duurzaam Bouwloket, "Quickscan energiebesparing Alkmaar Huiswaard" (gemeente Alkmaar) | Ja, hoofdstuk 5 en disclaimer | Is een energiebesparingsrapport met een IR-hoofdstuk, geen thermografierapport. **Goed**: eerlijk over zon-vertekening ("de foto's van de voorzijde geven een vertekend beeld"), temperatuurschaal naast de foto. **Slecht**: weinig meetcondities (buitentemp ca. 8 graden, zon af en toe), geen instellingen, disclaimer zegt "geen metingen" terwijl er wel gemeten is (tegenstrijdig). Wel een nuttig voorbeeld van een disclaimer die niet-aansprakelijkheid voor niet-waarneembare gebreken regelt. |
| HIKMICRO M60 datasheet | Ja | Zie 2.5. |
| HIKMICRO Analyzer 1.7.1 datasheet | Ja | Zie 2.5. |
| thermal_parser, Thermal-Tools macOS, DJI TSDK-forum | Deels (samenvatting door fetch-tool) | Zie 2.5. |
| ISO 6781-3 (ANSI-preview), EN 13187 / ISO 6781-1 | Nee (paywall / 403) | Alleen scope en status uit catalogusbeschrijvingen. |
| Fluke-blogs over rapportage, UGent Thermografie-Handboek, Renofase spouwvulling-rapport, UTwente drone-protocol | Alleen titel/snippet | Aanrader om zelf te lezen, zie bronnenlijst. Niet beoordeeld. |
| Open Nederlandse VvE-/corporatie-rapporten met drone | **Niet gevonden** | Er is geen openbaar VvE-voorbeeldrapport gevonden. Het VvE-sjabloon (1.3) is dus afgeleid van de woningsjablonen plus de dronebronnen. |

---

## 1. RAPPORTSJABLONEN

Gemeenschappelijke bouwstenen eerst (1.0), daarna de drie soorten.

### 1.0 Gemeenschappelijke bouwstenen (in elk rapport)

**Voorblad**
- Titel: "Thermografisch onderzoek - [adres, postcode, plaats]"
- Klantnaam, opdrachtnummer, rapportdatum, **inspectiedatum**, versienummer (v1.0)
- Logo/contact Warmtescan.nu
- Rapportnummer = `JJJJ-NNN` (jaartal wordt automatisch uit inspectiedatum gehaald, niet handmatig typen)

**Gegevenstabel (verplicht, bovenaan, zoals Stadswaardenlaan maar completer)**

| Veld | Invullen |
|---|---|
| Opdrachtgever / contactpersoon | |
| Locatie (volledig adres + kadastraal indien VvE) | |
| Bouwjaar, woningtype, gevelorientatie (voorgevel op ...) | Uit klant of schatting; noteer "volgens opdrachtgever" |
| Datum + tijdvenster buitenopnamen | bv. 2026-11-12, 06:50-07:40 |
| Datum + tijdvenster binnenopnamen | |
| Zonsopkomst/-ondergang die dag | |
| Buitentemperatuur (begin/eind) | graden C, bron: eigen meting + KNMI-station |
| Binnentemperatuur | graden C, per ruimte indien binnenopname |
| **Delta T binnen-buiten** | K |
| Windsnelheid + richting (begin/eind) | m/s, t.o.v. gevel (loef/lijzijde) |
| Bewolking | achtsten (0-8/8) |
| Neerslag laatste 24 h | mm, bron |
| Zoninstraling op de gevel voor/tijdens opname | geen / indirect / direct; hoelang geleden zon op deze gevel |
| Luchtvochtigheid | % |
| Verwarming binnen | aan/uit, sinds wanneer stabiel (uren) |
| Camera: merk/type/serienr., detector, NETD, lens | M60: 640x480, NETD < 35 mK, 15 mm lens, FOV 41.9 x 33.3 gr (datasheet) |
| Kalibratie camera | datum laatste kalibratie/controle + door wie |
| Software/firmware (camera en analyse) | |
| Emissiviteit ingesteld (per materiaal) | bv. baksteen/stuc 0,93; glas niet meetbaar (reflectie) |
| Gereflecteerde temperatuur + hoe bepaald | methode: kreukelfolie/aluminium |
| Afstand opname, atmosferische instellingen | |
| Palet en span/level | vast per reeks, zie veldprotocol |
| Operator (veld) | naam, rol, certificering, nummer |
| Analist/rapporteur | naam, niveau, certificaatnummer + geldigheid |
| Verantwoordelijke voor inhoud | naam; zie opmerking Level 1 in de samenvatting |
| Gebruikte hulpmiddelen bij analyse | "Beeldanalyse met AI-ondersteuning, gecontroleerd door [naam]" (transparant zijn) |

**Methode in 5 regels (vast tekstblok)**
Kwalitatief thermografisch onderzoek volgens de principes van EN ISO 6781-1 (voorheen NEN-EN 13187). Er zijn *schijnbare* oppervlaktetemperaturen vastgelegd; de getoonde temperatuurschaal is een beeldschaal en geen absolute meting van bouwdeeltemperaturen. Het onderzoek is een momentopname onder de vermelde omstandigheden. Bevindingen zijn aanwijzingen voor afwijkingen in warmte-, lucht- of vochtgedrag; de oorzaak is zonder aanvullend onderzoek niet altijd vast te stellen.

**Bevindingenkaart (herhaal per bevinding, dit is het hart van het rapport)**

```
### Bevinding [WONINGNR]-[VOLGNR]  - [korte titel]
Locatie:        gevel [voor/achter/zij-links/zij-rechts], bouwlaag, t.o.v. [kozijn/hoek/dakrand], hoogte ca. x m
Beelden:        IR: [bestandsnaam]   Visueel: [bestandsnaam]   (naast elkaar, zelfde uitsnede, zelfde nummering)
Schaal:         min / max op beeld, palet, emissiviteit, afstand
Observatie:     (feit, zonder oorzaak) "Over een lengte van ca. 1,2 m is de schijnbare temperatuur 2,1 K lager dan
                 de omgeving."
Waarschijnlijke oorzaak: (hypothese) "Dit patroon past bij ..."
Zekerheid:      A = duidelijk zichtbaar en past bij een bekende oorzaak
                B = zichtbaar, oorzaak aannemelijk maar niet vast te stellen
                C = twijfelachtig/beinvloed door zon, reflectie, bewoning; verificatie nodig
Alternatieve verklaringen: (min. 1 bij B/C, bv. reflectie, zon, binnenradiator, afwijkende gevelafwerking)
Advies:         (verificatie of maatregel) bv. "Binnenopname bij onderdruk", "Visuele controle", "Specialist raadplegen"
Prioriteit:     1 = zo snel mogelijk (vocht/bouwkundig risico)  2 = bij eerstvolgend onderhoud/renovatie
                3 = informatief / geen actie nodig
```

**Standaardformuleringen (kies expres de zwakste die klopt)**

| Situatie | Gebruik | Vermijd |
|---|---|---|
| Waargenomen patroon | "Op de opname is te zien dat..." / "Zichtbaar is..." | "Er is een lek" |
| Aannemelijke oorzaak | "Dit patroon past bij..." / "Mogelijke oorzaak is..." | "Dit komt door..." |
| Onzeker | "Dit kan duiden op ... maar kan ook veroorzaakt zijn door ..." | "Waarschijnlijk" zonder alternatief |
| Niet vast te stellen | "Met thermografie alleen is dit niet vast te stellen. Aanbevolen: ..." | Gokken |
| Geen afwijking | "Binnen de omstandigheden van deze opname zijn geen afwijkingen waargenomen." | "De gevel is goed geisoleerd" / "geen gebreken" |
| Isolatie | "Het patroon wijst op een gelijkmatige/ongelijkmatige warmteafgifte" | "Isolatie ontbreekt/is voldoende" |
| Vocht | "Mogelijk vochtige zones; bevestiging met vochtmeting nodig" | "Er is vochtschade" |
| Conclusie | "De bevindingen zijn aanwijzingen en geen bewijs" | stellige conclusie zonder zekerheidsklasse |

Dit is het antwoord op "conclusie afzwakken": de zekerheidsklasse A/B/C staat per bevinding in het rapport, dus klanten zien zelf hoe stellig iets is. De conclusie in de samenvatting herhaalt alleen A-bevindingen als feit en B/C als "aandachtspunt".

**Standaard-disclaimers en beperkingen (vast achterin, kort en leesbaar)**
1. Momentopname onder vermelde weersomstandigheden; ander weer of ander verwarmingsgedrag kan andere beelden geven.
2. Kwalitatief onderzoek; schijnbare temperaturen; geen bepaling van U-waarde, Rc of luchtdichtheid.
3. Thermografie meet alleen het oppervlak. Wat erachter zit (spouwvulling, vocht, leidingen) wordt afgeleid, niet gezien.
4. Zon, wind, regen, reflecties, gevelafwerking, glas en bewoning (radiatoren, meubels) kunnen beelden vertekenen; waar dat speelde is het per bevinding vermeld.
5. Niet-bereikbare/niet-opgenomen gevels of ruimten zijn in sectie "Afbakening" genoemd; daarover wordt niets gezegd.
6. Geen bouwkundige keuring, energielabel of constructieve beoordeling.
7. Aansprakelijkheid beperkt tot de opdrachtsom, tenzij opzet/grove schuld (laat juridisch toetsen, algemene voorwaarden koppelen, bv. DNR-achtig).
8. Het rapport is opgesteld met AI-ondersteuning en geaccordeerd door [naam]. *(Transparantie; houd dit consistent met wat je aan klanten zegt.)*

Opmerking: de Alkmaar-disclaimer ("er worden geen metingen verricht") spreekt het rapport zelf tegen. Formuleer dat het om *kwalitatieve* metingen gaat.

---

### 1.1 (a) Particuliere woning, buiten en/of binnen

Doelgroep: woningeigenaar, 1 woning, meestal 1 rapport van 8-14 pagina's.

```
Voorblad
1. Samenvatting voor de bewoner (max 1 pagina)
   - 3-5 belangrijkste bevindingen met prioriteit, elk 2 regels
   - "Wat we niet hebben kunnen beoordelen"
2. Opdracht en afbakening
   - vraag van de klant (bv. tocht, schimmel, spouwmuurisolatie controle)
   - wat wel/niet onderzocht: gevels voor/achter/zij, daken, binnenruimten
   - niet bereikbaar/niet opgenomen (bv. achtergevel via poort dicht) -> expliciet
3. Gegevenstabel (1.0) + weeroverzicht
4. Methode en instellingen (1.0 tekstblok)
5. Woningbeschrijving
   - orientatie, bouwjaar, gevelopbouw volgens klant, bekende renovaties
6. Bevindingen buiten, per gevel  (bevindingenkaart, volgorde: voor, links, achter, rechts, dak)
   - per gevel eerst overzichtsfoto visueel + IR met schaal, daarna details
   - ook "geen bijzonderheden" per gevel vastleggen
7. Bevindingen binnen (indien opgedragen), per ruimte; verwarmingsstatus per ruimte
   - bij onderdruk/blowerdoor: druk (Pa), tijdstip, hoe lang onder druk
8. Conclusie en advies
   - A-bevindingen als feit, B/C als aandachtspunt
   - Volgorde van acties
   - Aanbevolen vervolgonderzoek (vochtmeting, endoscopie, blowerdoor, vakman)
9. Beperkingen en disclaimers (1.0)
Bijlage A: fotoreportage (alle IR + visueel, met bestandsnaam en nummering)
Bijlage B: instellingen per opname (tabel: bestandsnaam, tijd, emissiviteit, Trefl, afstand, span)
Bijlage C: certificaat/kwalificatie analist (kopie of verwijzing)
```

### 1.2 (b) Projectreeks woningen / kopgevels (isolatiebedrijf of corporatie)

Doelgroep: opdrachtgever wil per woning een afzonderlijk bruikbaar rapport en daarnaast een totaalbeeld. Pijnpunten die hier het hardst raken: nummering, adressen, beeld bij verkeerde woning, rapportplanning.

**Structuur: 1 overzichtsrapport + N woningrapporten (aparte PDF's)**

*Overzichtsrapport (1x per project, 6-12 pagina's)*
```
1. Opdracht, scope, adreslijst (tabel: volgnummer, adres, bouwtype, opgenomen ja/nee, reden niet)
2. Weer en condities per opnamedag (en per tijdvenster als het weer veranderde); welke woningen onder welke conditie
3. Methode en vaste instellingen voor de hele reeks (palet, span/level, emissiviteit)
4. Resultaatmatrix (woningen x bouwdeel): A/B/C/geen-afwijking met kleurcode
   - kolommen bv.: kopgevel, voorgevel, achtergevel, kozijnaansluiting, dakrand, hoeken
5. Patronen over de reeks (bv. "bij 14 van 20 woningen een koudere strook onder het dakoverstek")
6. Prioriteitenlijst voor de opdrachtgever (welke woningen eerst)
7. Beperkingen (1.0)
Bijlage: adres <-> bestandsnaam <-> rapportnummer tabel (de sleutel tegen nummeringsfouten)
```

*Woningrapport (per woning, 3-6 pagina's)*
```
Voorblad (adres + woningvolgnummer + inspectiedatum + rapportnummer)
1. Gegevenstabel (verkort, met verwijzing naar overzicht voor methode) - wel eigen tijdstip, wind, camera
2. Eerste beeld: adresbord/huisnummer (uit veldprotocol) naast gevelfoto
3. Per gevel: visueel + IR + bevinding(en) of "geen afwijkingen"
4. Conclusie voor deze woning
5. Beperkingen (kort)
```

*Variant kopgevels vóór/na spouwvulling*: voeg een vergelijkingspagina toe per kopgevel: voor-IR en na-IR naast elkaar met **identieke** span/level, camerastandpunt, afstand, en **vergelijkbare weercondities**. Vermeld expliciet het verschil in Delta T en wind tussen voor en na. Zonder vergelijkbare condities mag het rapport geen uitspraak doen over "verbetering"; schrijf dan "niet goed vergelijkbaar door verschil in omstandigheden". Een bron waarin dit effect speelt: bij een Renofase-nameting na vier maanden was het binnen/buiten-temperatuurverschil kleiner, waardoor holtes minder zichtbaar waren (alleen snippet gelezen, zie bronnen).

### 1.3 (c) VvE / appartementencomplex met drone

Doelgroep: bestuur/beheerder VvE; leesbaar voor een bestuurder zonder techniek, met technische bijlage. Er is geen openbaar voorbeeld gevonden; dit is een eigen opzet.

```
Voorblad
1. Management-samenvatting (1 pagina): belangrijkste bevindingen, aantal per prioriteit, aanbeveling aan ALV
2. Opdracht, afbakening, kadaster/complexgegevens (bouwlagen, orientaties, blokken/trappenhuizen)
3. Condities + drone-gegevens
   - alles uit 1.0 plus: droneType, thermische camera (M3T: 640x512, 16-bit R-JPEG, volgens listings +-2 gr C of 2%),
     vlieghoogte, afstand tot gevel, snelheid, gimbalhoek, vluchtdatum/tijd per vlucht
   - vergunning/ontheffing/NOTAM/GEN-regels: kenmerk; weersgrenzen drone
   - privacy: hoe omgegaan met bewoners/ramen (wazig maken of niet publiceren bij ramen)
4. Overzichtsplan: gevelplattegrond/schema met genummerde zones (bv. Noord-gevel, zone N1...N6, per bouwlaag B1-B5)
5. Bevindingen per gevel > per bouwlaag > per zone (bevindingenkaart); dak apart (hellend/plat)
   - dak: orthomozaiek of stitched overzicht is hulpmiddel, controleer met losse R-JPEG's; nadir (loodrecht) beelden
   - gevels: zo loodrecht mogelijk; schuine beelden alleen voor detail, met vermelding
6. Parkeergarage / onderdelen binnen (handcamera M60): plafond/kolommen/aansluitingen; wel vermelden dat het handopnamen zijn
7. Prioriteiten en kostenindicatie-ranges *niet* opnemen zonder offerte (alleen "indicatief, niet bindend")
8. Beperkingen (1.0 + drone-specifiek: hoogte/afstand beperkt resolutie, 640 px sensor geeft per beeld grotere pixel op afstand, 
   pixelgrootte op de gevel noteren, kleine afwijkingen kunnen ontbreken)
Bijlage: vlieglogs (DJI-logbestanden), vluchtplan-kaartje, fotolijst met GPS/tijd
```

Rekenregel voor bijlage: pixelgrootte op de gevel ~ afstand x IFOV. M60: 1,13 mrad = ca. 1,1 cm per pixel op 10 m. Noteer voor de M3T de IFOV uit de officiele specs (niet in de gelezen bronnen gevonden; opzoeken en hier invullen).

---

## 2. VELDPROTOCOL VOOR FRANK

### 2.1 Vooraf (T-3 dagen tot T-1 uur)

**Weer (richtwaarden, controleren tegen ISO 6781-1; Kiwa BDA noemt: droog, buiten max 10 gr C bij 20 gr C binnen, weinig wind, half tot geheel bewolkt, bij voorkeur 's nachts / pas uren na zonsondergang)**

| Parameter | Go | Voorzichtig (noteer in rapport) | No-go |
|---|---|---|---|
| Delta T binnen-buiten | >= 10 K (richtwaarde, algemeen aangehouden; verifieer) | 7-10 K, alleen duidelijke afwijkingen betrouwbaar | < 7 K |
| Wind | <= 3 m/s | 3-5 m/s, vermeld richting; lijzijde vergelijkt anders | > 5 m/s |
| Neerslag | geen 24 h ervoor, gevel droog | nevel, vochtige gevel: noteer | regen tijdens, natte gevel |
| Zon op gevel | geen (nacht/voor zonsopkomst), gevel >= ~2-3 u uit de zon (praktijkwaarde) | bewolkt, geen directe zon, maar gevel was wel opgewarmd | directe zon op gevel |
| Bewolking | 4/8 - 8/8 | 0-3/8 voor zonsopkomst: nachtelijke uitstraling, noteer | helder + dak/gevel verwacht uitstraling zonder context |
| Binnen | verwarming >= 12 uur stabiel, geen koude pieken | recent bijgestookt | verwarming uit |

Bronnen/Apps voor Nederland:
- **KNMI** (uurwaarden per station: temperatuur, wind, bewolking, neerslag 24 h) voor het archief/rapport. Dichtstbijzijnde station voor Oss/Handel: kies Volkel of Eindhoven en noteer welk station je gebruikt.
- **Buienradar** of **Buienalarm** voor neerslag-nowcast (2 uur) en windvoorspelling.
- Aanvullend gratis: Windy of Meteoblue voor bewolking en wind per uur. Let op: voorspelling is niet meetwaarde; noteer in het veld je eigen meting (zakthermometer/anemometer) en gebruik KNMI achteraf als bronvermelding.
- Zonsopkomst/-ondergang opzoeken en in het rapport noteren (tijdstip zon op de gevel per orientatie).
- Go/no-go besluit **de avond ervoor en 1 uur ervoor**; zeg af bij no-go en plan opnieuw; liever vertraging dan een rapport met "voorzichtig"-condities op alle gevels.

**Tijdstip**: buiten bij voorkeur vlak voor zonsopkomst (gevel koud, geen zonbelasting), of nacht. Let op: voor het adresbord en visuele beelden is licht nodig. Plan: eerst IR in de schemering, adres- en visuele foto's met zaklamp/flits of een tweede ronde zodra het licht is. Test dit met een proefwoning en leg vast welk tijdstip werkt.

**Materiaal en batterijen**
- 2-3 M60-accu's (datasheet: ca. 4 uur speeltijd, bij koude minder; accu's warm houden in binnenzak) en powerbank/USB-C lader.
- Micro-SD 64 GB leeg en geformatteerd (datasheet: ca. 35.000 beelden), reserve-kaart.
- Statief (UNC 1/4"-20), lichte handschoenen die touchscreen aankunnen, hoofdlamp.
- Reflector: kreukelfolie of aluminium voor reflectietemperatuur, zakthermometer, wind-/anemometer, dauwpuntmeter indien aanwezig.
- Tablet/telefoon voor KNMI + notities. Spraaknotitie max 60 s en tekstnotitie max 200 tekens per beeld zijn mogelijk op de M60 (datasheet).
- Drone: opgeladen accu's, ND-onnodig, SD-kaart leeg, laatste firmware/RTH-hoogte, vergunning/NOTAM/ontheffing en toestemming eigenaar/VvE.
- Opdrachtblad (zie 2.6) uitgeprint of op telefoon: adreslijst met volgorde en bijzonderheden.
- Camera-instellingen vooraf: datum/tijd correct (check!), taal, eenheid graden C, bestandsformaat radiometrische JPG, SuperIR uit (voor consistente beelden; als aan, noteren), spotmeter aan, palet vast (Ironbow of Rainbow; kies er een en blijf erbij).

### 2.2 Op locatie

**Per project, eenmalig**
1. Datum/tijd van camera en telefoon controleren. Noteer begintemperatuur, wind, bewolking, zon, RV in veldlog.
2. **Reflectietemperatuur meten** (methode kreukelfolie): kreukel aluminiumfolie, plat opspannen, emissiviteit camera op 1,0, afstand zelfde als meetafstand, gemiddelde temperatuur van de folie = Trefl. Stel in. Herhaal per project en bij weerverandering. (UGent-handboek en een Nederlandse MBO-handleiding noemen dezelfde volgorde: eerst Trefl, dan emissiviteit; alleen snippet gelezen.)
3. **Emissiviteit** instellen: baksteen/stuc/steen ca. 0,90-0,95 (richtwaarde; controleren met contactsticker, bv. electriciantape 0,95, referentiemeting), glas is niet bruikbaar (reflecteert), blank metaal onbetrouwbaar. Noteer per materiaal.
4. **Vaste span/level per reeks**: kies bij het eerste huis een span (bv. buiten 4-8 K rond de wandtemperatuur, handmatig), zet op Manual en laat staan voor alle woningen van die reeks en dat tijdvenster. Alleen veranderen met notitie in de veldlog (en nieuw nummer). Dit maakt woningen onderling vergelijkbaar.
5. Statief en vaste afstand: kies standaardafstand per gevel (bv. 6-10 m voor een gevel, 2-3 m voor details). Noteer.

**Per woning, vaste volgorde (nooit overslaan)**
1. **Adresbord/huisnummer fotograferen** (visuele foto, of M60-foto met bord leesbaar) = beeld #1. Dit is de scheidslijn tussen woningen. Voor meerdere kopgevels/blokken: ook een foto van het straatnaambord.
2. **Spraaknotitie op dat eerste beeld**: "Woning [nr], [straat], voorgevel/zijkant, tijd, bijzonderheden." (max 60 s)
3. **Overzicht visueel** van de gevel (zelfde standpunt als IR).
4. **Overzicht IR** van de gevel (loodrecht zoveel mogelijk, geen schuine kijkhoek groter dan ca. 30-45 gr zonder notitie).
5. **Details**: kozijnaansluitingen, hoeken, dakrand, aansluiting begane grond/kruipruimte, ventilatieopeningen, verdachte zones. Elk detail: IR + visueel van hetzelfde punt (bij voorkeur zelfde standpunt).
6. Volgorde van gevels altijd gelijk: **voor > links > achter > rechts > dak/overig**. Achterkant bereikbaar? Zo niet: foto van de gesloten poort + notitie "achtergevel niet bereikbaar" en meld het meteen aan Claude/klant. (Pijnpunt: gemiste achtergevels.)
7. Einde woning: laatste foto = adresbord weer, of een foto met "klaar woning X". Dan weet je bij het uitlezen waar de volgende begint.
8. Veldlog: kruis aan op de adreslijst (opgenomen, niet bereikbaar, bewoner afwezig, zon, afwijkend weer).

**Binnen** (indien opgedragen)
- Verwarming op stabiel; bewoners voorafgaand vragen niet te luchten/ramen.
- Per ruimte: deur, hoek, plint, raam, plafond-wandaansluiting, stopcontacten op buitengevel.
- Bij blowerdoor (optioneel): onderdruk 50 Pa (vergelijkbaar met de Stadswaardenlaan-aanpak: woning voorbereiden, ventilatie dicht, kap afgeplakt, onderdruk, luchtlekken zichtbaar met IR). Noteer drukken en tijden. Je hebt aparte apparatuur en expertise nodig (alleen Level-2 werk, niet vaardig dan zonder meter).
- Kamer waar radiator/zonlicht/lamp invloed heeft: noteer.

**Foto's van de verkeerde kant**: gebruik compas/telefoon: noteer in de spraaknotitie de gevelorientatie ("voorgevel, kijkrichting noordwest"). Bij twijfel hetzelfde standpunt met adresbord in beeld.

### 2.3 Na afloop

1. Direct na de ronde: veldlog afronden (eind-weer, wind, bewolking, afwijkingen).
2. **Back-up volgens 3-2-1**: (a) SD-kaart niet wissen, (b) kopie op MacBook, (c) kopie op NAS/cloud. Pas na bevestigde kopie op 2 plekken de SD-kaart formatteren.
3. Origineel nooit bewerken. Map `ruw/` alleen-lezen maken.
4. Bestanden hernoemen **na** back-up, met een script, niet met de hand.

**Bestandsnaam-conventie**: `JJJJMMDD_adres_gevel_nr`

| Deel | Regels | Voorbeeld |
|---|---|---|
| JJJJMMDD | inspectiedatum uit EXIF/camera | `20261112` |
| adres | `straat-huisnr` in kleine letters, zonder spaties/accenten; met toevoeging | `kerkstraat-12`, `kerkstraat-12a` |
| gevel | `voor`, `achter`, `links`, `rechts`, `dak`, `bord` (adresbord), `int-<ruimte>` | `voor` |
| nr | 3 cijfers per adres, doorlopend | `001` |
| type | `_ir` of `_vis` achter nr (bij losse bestanden) | `_ir` |

Voorbeelden:
- `20261112_kerkstraat-12_bord_001.jpg`
- `20261112_kerkstraat-12_voor_002_ir.jpg`
- `20261112_kerkstraat-12_voor_003_vis.jpg`

Map-structuur:
```
JJJJMMDD_project/
  veldlog.csv                (of .md: weer, instellingen, afwijkingen)
  adreslijst.csv             (volgorde + opgenomen ja/nee)
  <adres>/                   (kerkstraat-12/)
    ruw/                     (originele radiometrische JPG's, alleen-lezen)
    export/                  (PNG/JPG met vaste palet+span voor gebruik in rapport)
    csv/                     (temperatuurmatrix per sleutelbeeld)
    notities/                (spraakmemo's of getypt)
```

### 2.4 Aanlevering aan Claude

Doel: Claude moet per beeld (a) het beeld kunnen zien, (b) kunnen weten bij welk adres, (c) zo nodig temperaturen kunnen lezen.

Lever per project:
1. **`export/`**: per beeld een gewone JPG/PNG van het IR-beeld mét temperatuurschaal in beeld en de zichtbare tegenhanger (fusion of apart). Gewone beelden kan Claude direct bekijken.
2. **`csv/`** voor sleutelbeelden (afwijkingen, referenties): temperatuurmatrix (CSV). Voor de M60: via HIKMICRO Analyzer (zie 2.5). Voor de M3T: via een van de tools in 2.5, of CSV/TIFF vanuit DJI Thermal Analysis Tool.
3. **`ruw/`** de originele radiometrische bestanden meesturen (voor toekomstige herverwerking), maar Claude analyseert voornamelijk uit `export/` en `csv/`.
4. **`veldlog`**: een tekst-/csv-bestand met per woning: adres, tijdstip, wind/zon, Trefl, emissiviteit, span, afwijkende opmerkingen.
5. **Spraakmemo's** getranscribeerd of 1 regel per woning in de log.
6. Maximale bestandsgrootte: zip per woning < 50 MB; of deel via link, zie 4.

Claude controleert bij ontvangst: aantal bestanden per adres, ontbrekende gevels, dubbele nummers, tijdvolgorde, adresbord-beelden. Meldt afwijkingen terug **voor** het rapport wordt geschreven.

### 2.5 Tools om radiometrische data uit te lezen

**DJI Mavic 3 Thermal (R-JPEG, 16-bit)**
| Tool | Wat | Opmerking |
|---|---|---|
| DJI Thermal SDK (TSDK, "dirp") | Officiele library, Windows en Linux (x86_64); Linux-versie 1.8 (dec 2025) genoemd | Geen ARM64/Apple-Silicon-build volgens DJI-forum; macOS native niet. DJI-download: https://www.dji.com/downloads/softwares/dji-thermal-sdk |
| `thermal_parser` (Python, MIT) | Wrapper rond DJI SDK, geeft NumPy-array; lijst M3T/M30T/M4T/H30T ondersteund; ook FLIR | Gebruikt DJI-bibliotheken uit `plugins`-map; Docker-optie voor macOS beschreven. https://github.com/SanNianYiSi/thermal_parser |
| Thermal Tools for macOS | Mac-port van UAV4GEO Thermal-Tools; DJI R-JPEG naar 32-bit TIFF met behoud metadata; Docker Desktop nodig | AGPLv3, getest op H30T, niet op M3T; app niet notarized. https://github.com/Estratonauta/thermal-tools-macos/releases |
| `dji-thermal-sdk` (npm) | Node-wrapper; waarden in 0,1 gr C | Platformbeperkt |
| `dji-thermal-sdk` (PyPI) | ctypes-wrapper | Alleen Windows, 2022 |
| Rust `thermal` crate | Parser voor DJI en FLIR | Zelf bouwen |
| DJI Thermal Analysis Tool (DTAT 3) | Officiele GUI, export temperatuurmatrix/rapport | Windows (niet geverifieerd voor macOS). Check op DJI-downloadpagina bij het toestel. |

Een open-source project genaamd precies `dji_irp` is niet bevestigd; "dirp" (DJI IR Process) is de naam van de officiele SDK-bibliotheek (`libdirp`). De Docker-route (x86_64 Linux-container, `--platform linux/amd64` op Apple Silicon) is het meest werkbare op Franks MacBook; test met 1 M3T-beeld vooraf.

**HIKMICRO M60 (radiometric JPEG)**
- **Datasheet M60**: 640x480 detector, SuperIR 1280x960, 8 MP visueel, voice note 60 s, tekstnotitie 200 tekens, Wi-Fi, BT 4.2, USB-C, MP4 + radiometrische video, app met "remote album access, download and quick report". *Geen GPS in de gelezen specificatietabel* (de lijst was mogelijk niet volledig; controleer in de camera).
- **HIKMICRO Analyzer 1.7.1**: analyseert Radiometric JPEG en radiometrische video (HRV/RV); **exporteert temperatuurmatrix als CSV**, rapport als ODT of PDF (max 512 beelden, 64 rapportsjablonen); 3D-thermal, tag-notitiesjablonen. **Systeemvereisten: alleen Windows 7/10/11 (64-bit)**. Frank werkt op Mac, dus: Windows-pc, VM (Parallels/VMware) of een tweede machine nodig. *Dit moet je vooraf testen.*
- **HIKMICRO Viewer-app (mobiel)**: kan beelden downloaden en een snel rapport maken (volgens datasheet). Geen beperking voor Mac getest.
- **Open-source**: geen HIKMICRO-specifieke decoder gevonden. De gangbare FLIR-tools (`flirimageextractor`, `read_thermal.py`, via ExifTool) werken **niet** vanzelf voor HIKMICRO; de auteur stelt zelf dat andere camera's "tweaks" nodig hebben. `flirpy` kwam in de zoekresultaten niet voor; gericht FLIR/Boson, vermoedelijk niet geschikt.
- **Eerste test (30 minuten, hoge prioriteit)**:
  1. Maak met de M60 een testbeeld, kopieer de JPG.
  2. `exiftool -a -G1 -s bestand.jpg | head -100` en `exiftool -b -ThumbnailImage`; kijk of er een groot embedded binair blok of herkenbare tags zijn (emissiviteit, Trefl, afstand zijn dikwijls aanwezig; zegt niets over de ruwe matrix).
  3. Open hetzelfde bestand in Analyzer (Windows), exporteer CSV (640x480 = 480 rijen x 640 kolommen verwacht). Vergelijk met de display-waarde van een spot op de camera.
  4. Als je een Windows-pc hebt, is CSV-export voor sleutelbeelden de pragmatische route; reverse-engineering van het formaat is niet nodig voor kwalitatief werk.
  5. Optioneel: HIKMICRO biedt (volgens eigen website; niet geverifieerd) een SDK voor ontwikkelaars; navragen bij HIKMICRO NL als automatische batch-uitlezing nodig is.

**Aanbeveling**: voor kwalitatief rapportwerk volstaan gewone exports (PNG/JPG met schaal) + CSV voor een handvol sleutelbeelden. Volledige radiometrische batch-analyse is alleen nodig als je gaat kwantificeren (dat is buiten de huidige scope en past minder bij "schijnbare temperaturen").

### 2.6 Opdrachtblad (1 pagina per project, door Claude gemaakt vóór het veldwerk)

- Adreslijst in route-volgorde met volgnummer, bouwtype, bijzonderheden (poort, hond, bewoner thuis)
- Weer-go/no-go (zie 2.1) en gekozen tijdvenster
- Per adres: te maken gevels, extra aandachtspunten uit klantvraag
- Contact bewoners / toestemming
- Span/level en emissiviteit (te kiezen bij woning 1, dan vast)
- Terugkoppeling: wat Frank meldt als iets niet lukt

---

## 3. SHOTLISTS PER OPDRACHTTYPE

Algemeen bij elke woning: eerst `bord` (adresbord), dan gevels voor > links > achter > rechts. IR en visueel altijd als paar.

### 3.1 Woning buiten (± 25-40 min)

| # | Shot | Type | Opmerking |
|---|---|---|---|
| 1 | Adresbord/huisnummer | vis | Nr en straat leesbaar |
| 2 | Voorgevel totaal | vis + IR | Loodrecht; vaste afstand |
| 3 | Voorgevel details: kozijnen links/rechts, voordeur, aansluiting dakrand, hoeken | IR + vis | Per detail 1 paar |
| 4 | Linkergevel totaal + details | vis + IR | Let op wind (loef/lij) |
| 5 | Achtergevel totaal + details (balkon, uitbouw, dakkapel) | vis + IR | Gesloten poort? foto + notitie |
| 6 | Rechtergevel totaal + details | vis + IR | |
| 7 | Dak (schuin van een afstand; drone alleen als toegestaan) | IR + vis | Zon-reflecties pannen |
| 8 | Bijzonder: schoorsteen, ventilatie, dakdoorvoeren, kruipruimteroosters | IR + vis | |
| 9 | Afsluitend: adresbord | vis | Markeert einde |
| - | Spraaknotitie | | Orientatie, tijd, bijzonderheden |

### 3.2 Woning binnen (± 45-90 min; blowerdoor optioneel +2-3 uur)

| # | Shot | Opmerking |
|---|---|---|
| 1 | Voordeur/adresbord, daarna gang | |
| 2 | Per ruimte: overzicht visueel + IR van buitenwanden | Verwarmingsstatus noteren |
| 3 | Details: hoeken (wand/wand, wand/plafond, wand/vloer), kozijnaansluiting, onder vensterbank, stopcontacten op buitenmuur, rolluikkast, leidingdoorvoeren, dakkapel | |
| 4 | Zolder/schuine daken, knieschotten | |
| 5 | Radiatoren en leidingen (invloed op beeld) | Maak als referentie, niet als bevinding |
| 6 | Badkamer/keuken (afzuigkap, doorvoeren) | |
| 7 | **Optioneel blowerdoor** | Voorbereiding (ventilatie dicht, kap/afzuiging afgeplakt), onderdruk 50 Pa, **eerst** referentiebeelden zonder druk, **dan** met druk; luchtlekken zichtbaar als koude strepen/trekken; noteer druk en tijd per beeld. Vereist meetapparatuur en kennis (zie Stadswaardenlaan-methode). |
| 8 | Afsluiten met bord/voordeur | |

### 3.3 Kopgevels vóór/na spouwvulling

| # | Shot | Opmerking |
|---|---|---|
| 1 | Bord + woningnr | |
| 2 | Kopgevel totaal vis + IR | **Vast standpunt**: markeer met kruis op stoep/foto van standplaats, GPS-pin |
| 3 | Details: hoeken, onder dakrand, rond kozijnen, onder vensterbank | Dezelfde detailpunten bij nameting |
| 4 | Zelfde reeks op dezelfde manier bij "na" | Zelfde camera, lens, afstand, span/level, emissiviteit |
| 5 | Referentievlak (onverbonden gevel, onveranderd) in beeld | Voor onderlinge kalibratie |
| 6 | Weer in beide metingen identiek vastleggen | Delta T, wind, zon, tijdstip, dagen sinds regen |
| - | Wachttijd | Na injectie/vulling spouw laten uitharden/drogen: volgens installateur; voorbeeld uit bron: 4 maanden later was Delta T kleiner (zie bronnen) |

Regel: niet voldoende vergelijkbaar -> in rapport vermelden, geen "verbetering" claimen.

### 3.4 Projectreeks 20 woningen in één ochtend (buiten, alleen Frank)

Aannames: rijen met voor- en achterkant bereikbaar, vaste afstand, 2 gevels per woning, daglicht niet beperkend. Elke woning ca. **8-10 min**.

| Blok | Tijd (voorbeeld, zonsopkomst 08:00) | Wat |
|---|---|---|
| Voorbereiding | 05:45-06:15 | Weer-check, Trefl meten, emissiviteit, span/level instellen op woning 1, dronebatterijen |
| Woningen 1-10 | 06:30-08:00 (9 min/woning) | Bord, voorgevel vis+IR, 3-4 details, spraaknotitie |
| Koffie/accu | 08:00-08:10 | Accu wisselen, log bijwerken (afwijkingen) |
| Woningen 11-20 | 08:10-09:40 | Zelfde |
| Achtergevels | Apart schema: parallel in de rij of tweede ronde | Achterpaden vaak afgesloten: **van tevoren toegang regelen** |
| Afronden | 09:40-10:00 | Veldlog, back-up op locatie, kaart nog niet wissen |

Realistisch: voorkanten 20 x 8 min = ~2,7 u; achterkanten +2 u. Eén ochtend voor *alles* is krap voor één persoon; plan achterkanten als tweede blok of tweede ochtend, of overweeg een hulpkracht voor dat deel. In de winter is zonsopkomst laat (november ca. 07:45) en dat helpt: IR vóór zonsopkomst, adresbord en visueel met kunstlicht of tweede ronde. Plan buffer van 15% voor afwijkingen.

Tijd per woning (8-10 min): 1 min bord+memo, 2 min voorgevel vis+IR, 4 min details, 1 min wisselen/notitie.

### 3.5 VvE-complex 5 bouwlagen met drone

**Voorbereiding (M3T)**
- Regels: categorie/vergunning, opdracht, **toestemming eigenaar/VvE**, buurt informeren, privacy (ramen, balkons), NOTAM/luchtruim, veiligheidsafstand mensen, parkeerplaats afzetten indien nodig. Zie ook je Drone Solutions- en Acecore-kennis voor vergunningsstappen.
- Weer: wind drone-limiet en thermograaf-limiet (<= 3-5 m/s); droge gevel; bij voorkeur voor zonsopkomst of laat in de avond; bewolkt.
- Vluchtplanning (DJI Pilot 2 / eigen planning): niet gevonden in gelezen bronnen welke vaste parameters; wel dat de UTwente "Infrared drones in construction: designing a protocol" (zie bronnenlijst) en een KIT-studie hierover zijn; een Entrop/Vasenev-studie noemt 5-10 m afstand tot de gevel en ca. 1,5 m/s snelheid (snippet-informatie). **Neem als startwaarde: 5-10 m van de gevel, 1-2 m/s, camera loodrecht op de gevel, kleine hoekafwijking.** Test op 1 gevel en kies definitief.

**Vluchtplan**
| Vlucht | Wat | Parameters (startwaarden, aan te passen na proef) |
|---|---|---|
| 0 | Visuele verkenning + aanwezigheid obstakels, kabels, bomen, balkonafscheidingen | Visuele camera, hoog |
| 1 | **Dak** (nadir): raster met voldoende overlap voor stitching, of losse nadir-beelden | Hoogte afhankelijk van pixelgrootte-doel (bv. <= 5-8 cm/pixel); overlap 70/60% voor mozaiek of losse beelden bij kwalitatief werk; plat dak: let op reflecties van folie |
| 2 | **Gevels**: per gevel verticale banen per bouwlaag (B1-B5) | Camera loodrecht; vaste afstand; noteer hoogte per baan; overlap zijkant 30% |
| 3 | Details: dakrand, balkonplaten (koudebrug), hoeken, kozijnaansluitingen op moeilijke plekken | Dichterbij (minimaal veilig), 2-3 m |
| 4 | Afsluiting: terugkeerbeeld van ieder gevelvlak met bord/blokaanduiding | |

Nummering: gebruik **zones** (`N-B3-02` = noordgevel, bouwlaag 3, zone 2) in het vluchtlog en in de bestandsnaam: `20261112_complex-x_noord-b3_002.jpg`.

**Handopnamen (M60)**
- Parkeergarage: plafond onder woonlagen (koudebruggen, leidingdoorvoeren, kolommen), kopgevels op de begane grond, entreeportalen.
- Trappenhuizen/galerijen: kozijnen, gevelaansluiting.
- Dak vanaf dakluik indien toegestaan.

**Per bouwlaag-shotlist**
| Bouwlaag | Gevels | Details |
|---|---|---|
| Begane grond/plint | N, O, Z, W | Plint, kruipruimte-roosters, entreedeuren |
| 1-4 | N, O, Z, W | Balkonplaten, loggia's, kozijnaansluitingen, hoeken, dakkapellen |
| Dak (laag 5/dak) | N, O, Z, W + dakvlak | Dakrand, lichtkoepels, doorvoeren, liften |
| Garage | plafond, kolommen, hellingbaan | Handcamera |

---

## 4. OPLEVERING

### 4.1 Format

- **PDF per woning** (en 1 overzichts-PDF bij projecten), A4, tekst doorzoekbaar, PDF/A optioneel, max **10 MB per PDF** (mailgrens: >18 MB werd geweigerd; zet de grens op 10 MB zodat mail + bijlagen er altijd door komen). Beelden gecomprimeerd (JPG kwaliteit 80%, 1600 px lang) in het rapport; ruwe bestanden apart via link.
- Bestandsnaam: `Warmtescan_JJJJ-NNN_adres_JJJJMMDD_v1.pdf`, bv. `Warmtescan_2026-014_kerkstraat-12_20261112_v1.pdf`. Rapportnummer-sleutel = adreslijst in het overzichtsrapport.
- Ruwe + export-bestanden als zip per woning of per project; niet in de PDF.
- Taal: Nederlands, B1-niveau voor bewoner, vakjargon alleen in de technische bijlage.

### 4.2 Levertermijn-planning (de pijn: "rapporten weken te laat")

| Moment | Doel | Verantwoordelijke |
|---|---|---|
| Opdracht | Afspraak levertermijn **schriftelijk** (bv. 10 werkdagen na veldwerk, bij projecten >10 woningen 15 werkdagen); opnemen in offerte | Frank |
| Dag 0 (veldwerk) | Back-up + aanlevering aan Claude binnen 24 uur | Frank |
| Dag 1-2 | Claude: ontvangstcontrole (aantallen, gaten, nummering) + terugkoppeling | Claude |
| Dag 2-6 | Analyse + concept-rapporten | Claude |
| Dag 6-8 | Review en accordering door Frank (inhoud, zekerheidsklassen, formulering) | Frank |
| Dag 8-9 | Verzendchecklist (4.4), export, upload | Frank/Claude |
| Dag 10 | Verzending + ontvangstbevestiging gevraagd | Frank |

Bij vertraging: **bericht eerder**, niet op de deadline ("loopt 2 werkdagen uit door ..., nieuwe datum ..."). Zet de deadline in de agenda én in het opdrachtblad. Plan veldwerk niet in als er al 2 rapporten open staan.

### 4.3 Versturen

- **Mail**: rapport-PDF's onder 10 MB als bijlage waar mogelijk (of 1 PDF per mail); anders link.
- **SwissTransfer** (Infomaniak): gratis tot **50 GB** per transfer, zonder account. **Bewaartermijn** kiesbaar 1, 3, 7, 15 of 30 dagen; volgens Infomaniak-FAQ worden bestanden bij de 30-daagse optie na 15 dagen verwijderd tenzij je de verlenging bevestigt (mail op dag 12). Dit is precies de valkuil van "verlopen links". Download-limiet 250 (volgens derden; niet geverifieerd). Gebruik daarom: SwissTransfer **alleen** voor het ruwe/zware pakket; stel max termijn in, noteer vervaldatum in de leveringsmail en agenda, en **houd zelf een kopie**. Bronnen: zie lijst.
- **Aanbevolen als standaard** voor de definitieve rapporten: eigen opslag met vaste link (bv. NAS/Cloudflare R2/eigen server) met wachtwoord of onraadbare URL, minimaal 12 maanden bereikbaar, en een kopie van de PDF per mail. Dan is er geen link-verval. (Vergt een keuze van Frank: kost en privacy; zie GDPR-opmerking hieronder.)
- **Privacy/AVG**: rapporten bevatten adressen en soms foto's met personen of interieur. Gebruik geen openbare links zonder wachtwoord of onraadbare URL; bewaar klantdata niet langer dan nodig; verwijder bij verzoek.
- Leveringsmail (vast sjabloon): rapportnummer, adres, aantal bijlagen, vervaldatum link, vraag om bevestiging van ontvangst, contactgegevens.

### 4.4 Controlechecklist vóór verzending (verplicht, afvinken per rapport)

Print/afvinken, twee personen waar mogelijk (Frank + Claude als tweede lezer).

**Identiteit**
- [ ] Adres op voorblad = adres in opdracht = adres op adresbord-foto (#1)
- [ ] Postcode/plaats kloppen
- [ ] **Klantnaam** correct gespeld en juist voor dit rapport (niet uit vorig rapport)
- [ ] **Jaartal** (inspectiedatum, rapportdatum, rapportnummer) klopt; geen oud jaartal gekopieerd
- [ ] Rapportnummer uniek en in overzicht

**Beeld-bij-adres**
- [ ] Elk IR/visueel-paar hoort bij dit adres: bestandsnaam bevat het juiste adres
- [ ] Aantal beelden = aantal in fotolijst; geen dubbele of ontbrekende nummers
- [ ] Volgorde gevels voor/links/achter/rechts klopt met standpunt (links/rechts t.o.v. kijkrichting vanaf de straat)
- [ ] Elke gevel heeft beelden of de reden waarom niet (poort, hek, bewoner)
- [ ] Naast elk IR-beeld: schaal leesbaar; zelfde span binnen de reeks (of vermeld waarom anders)

**Inhoud**
- [ ] Gegevenstabel volledig (Delta T, wind, bewolking, neerslag 24 h, zon, camera, kalibratie, emissiviteit, Trefl, operator, analist met certificaat)
- [ ] Elke bevinding heeft zekerheid A/B/C, alternatieve verklaring bij B/C, advies, prioriteit
- [ ] Geen stellige taal bij B/C (zoek op: "is", "komt door", "geen gebreken", "defect")
- [ ] Conclusie komt overeen met bevindingen (geen A in conclusie die B is)
- [ ] Disclaimers en afbakening aanwezig; "niet opgenomen" zones genoemd
- [ ] Rolverdeling en AI-ondersteuning conform afspraak vermeld

**Techniek en taal**
- [ ] PDF onder 10 MB, doorzoekbaar, bestandsnaam volgens conventie
- [ ] Spellingcontrole (NL) + zoeken op "wij/ik", dubbele spaties, eenheden (gr C, K, m/s, Pa), decimalen met komma
- [ ] Alle links werken; vervaldatum link genoteerd
- [ ] Gesloten PDF openen op een ander apparaat (telefoon) en 3 willekeurige pagina's bekijken

**Verzending**
- [ ] Juiste ontvanger, juiste bijlage (open de bijlage nog eens in de mail)
- [ ] Alleen de eigen klant ontvangt dit rapport; bij projecten juiste woning bij juiste bewoner
- [ ] Verzonden bericht genoteerd (datum, ontvanger, link-vervaldatum); bevestiging gevraagd

---

## 5. Openstaand / te verifiëren (voor Frank)

1. Norm-drempels (Delta T, wind, tijd na zon) controleren tegen ISO 6781-1:2023 en je cursusmateriaal; eventueel norm aanschaffen.
2. Formele rol: wie is "analist met certificaat" en mag Level 1 rapporteren? Past het "Claude = Level 2" in de offertevoorwaarden en bij de certificerende instantie?
3. HIKMICRO Analyzer: Windows-toegang regelen en een CSV-export testen; ExifTool-test op een M60-bestand.
4. M3T: IFOV en exacte camera-specificaties bij DJI; Docker-test met `thermal_parser`/Thermal-Tools.
5. Vaste, niet-verlopende opslag voor klantlinks kiezen.
6. Een eigen testwoning laten dienen om het hele proces (veld > export > rapport > checklist) 1x droog te draaien en dit document bij te werken.

## Bronnen

Gelezen (inhoud gebruikt):
- Kiwa BDA infoblad Infrarood opname (2022): https://careers.kiwa.com/globalassets/netherlands/kiwa-bda/pdf/infobladen/infrarood-opname.pdf
- Ing.bureau Van der Kleij, Thermografisch onderzoek met blowerdoortest Stadswaardenlaan Arnhem: https://duurzaamstadseiland.nl/pdf/rapport%20Stadswaardenlaan.pdf
- Duurzaam Bouwloket / gemeente Alkmaar, Quickscan energiebesparing Huiswaard: https://res.cloudinary.com/duurzaambouwloket/image/upload/v1675779166/1._Quickscan_energiebesparing_Alkmaar_Huiswaard.pdf
- HIKMICRO M60 datasheet: https://cdn.shopify.com/s/files/1/0755/9344/9805/files/HIKMICRO-M60-Datasheet.pdf
- HIKMICRO Analyzer 1.7.1 datasheet (via reseller): https://olil.lv/wp-content/uploads/2025/12/HIKMICRO_Analyzer_Datasheet_V1.7.1_en-US_20241022.pdf
- thermal_parser: https://github.com/SanNianYiSi/thermal_parser
- Thermal Tools macOS: https://github.com/Estratonauta/thermal-tools-macos/releases
- DJI Thermal SDK downloadpagina: https://www.dji.com/downloads/softwares/dji-thermal-sdk
- DJI SDK-forum ARM64: https://sdk-forum.dji.net/hc/en-us/community/posts/36681157070489-Does-DJI-THERMAL-SDK-Support-64-bit-ARM-AArch64-Architectures
- DJI Thermal SDK op PyPI: https://pypi.org/project/dji-thermal-sdk/ en npm: https://www.npmjs.com/package/dji-thermal-sdk
- SwissTransfer limieten (Infomaniak): https://www.infomaniak.com/en/support/faq/2929/understanding-swisstransfer-data-limits

Alleen titel/samenvatting gezien (nog zelf lezen):
- ISO 6781-3:2015 (personeel): https://www.iso.org/standard/61357.html ; preview: https://webstore.ansi.org/preview-pages/ISO/preview_ISO+6781-3-2015.pdf
- EN ISO 6781-1:2023: https://genorma.com/en/standards/en-iso-6781-1-2023 ; https://www.iso.org (catalogus)
- NEN-EN 13187 (ingetrokken/vervangen): https://shop.standards.ie/en-ie/standards/nen-en-13187-1998-797452_saig_nen_nen_1911849/
- Fluke, Optimale presentatie van de resultaten van een thermische inspectie: https://fluke.com/nl-nl/informatie/blog/warmtebeeldtechniek/optimale-presentatie-van-de-resultaten-van-een-thermische-inspectie
- Fluke, Thermische inspectierapporten verbeteren: https://www.fluke.com/nl-be/informatie/blog/warmtebeeldtechniek/thermische-inspectierapporten-verbeteren-met-softwarehulpmiddelen
- UGent Thermografie-Handboek: https://thermografie.ugent.be/content/uploads/2015/12/Thermografie-Handboek.pdf
- Renofase spouwvulling-rapport: https://www.renofase.be/wp-content/uploads/2017/10/D3-1_Spouwvulling-rapport.pdf
- Duurzaam MBO, Thermografie: https://duurzaammbo.nl/dzb-materialen/bouwfysica/thermografie
- UTwente, Infrared drones in the construction industry: designing a protocol: https://research.utwente.nl/en/publications/infrared-drones-in-the-construction-industry-designing-a-protocol/
- KIT, drone-instellingen thermische beeldkwaliteit: https://publikationen.bibliothek.kit.edu/1000154253
- Kiwa drone-inspecties dak/gevel: https://www.kiwa.com/be/nl-be/expertises/intelligente-inspecties/drone-inspecties-voor-dak--en-gevelconstructies/
- flirimageextractor (FLIR, ter vergelijking): https://pypi.org/project/flirimageextractor/
