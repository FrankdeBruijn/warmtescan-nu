# 02 - Fysica, meetmethode, meetcondities en apparatuur

Kennisbank Warmtescan.nu. Bouwkundige thermografie in Nederland. Opgesteld 2026-11-06.

Markering: **[B]** = bevestigd in een geraadpleegde bron (zie bronnenlijst). **[K]** = algemeen vakkennis/standaardwaarde, niet in deze sessie aan een bron getoetst. **[I]** = inschatting of eigen voorstel; in het veld valideren. Waar twee bronnen afwijken staat dat erbij.

---

## Wat moet je onthouden (15 punten)

1. Een thermische camera meet **stralingsintensiteit**, geen temperatuur. Temperatuur volgt pas na correctie voor emissiviteit (ε), gereflecteerde temperatuur en afstand/atmosfeer. Een verkeerde ε of reflectie geeft in een winterse situatie al snel 2-5 K fout.
2. Bouwmaterialen (baksteen, beton, bitumen, EPDM, pannen, hout, verf, pleister) hebben ε ≈ 0,90-0,95: dat is goed. Blank metaal (gepolijst alu, zink, RVS) heeft ε ≈ 0,03-0,3: daar zie je vooral de **spiegeling van de omgeving**. Glas is ondoorzichtig voor LWIR (8-14 µm) en spiegelt sterk.
3. Meet altijd de **gereflecteerde schijnbare temperatuur** (verfrommelde aluminiumfolie, ε = 1, afstand 0) en zet die in de camera of in de nabewerking.
4. Kijkhoek: liefst **< 45° t.o.v. de normaal**, maximaal ~60° voor matte bouwmaterialen; voor glas/metaal/natte oppervlakken < 30°. Vanaf de grond bij een hoog gebouw betekent dat: ver genoeg wegstaan.
5. Buitenmeting: **ΔT binnen-buiten ≥ 10 K** (FLIR [B]; Testo 10-15 K gedurende ≥ 12 u [B]). Binnen minimaal 5 K gedurende de 24 u ervoor [B, FLIR]. In NL = november-februari, binnen 20 °C en buiten ≤ 5-8 °C.
6. **Zon**: geen directe instraling op de gevel in de uren voor de meting (Testo: ook zon van de voorgaande uren vervalst het beeld [B]). Beste tijdstip: 1-2 uur vóór zonsopkomst of 3+ uur na zonsondergang [I]. Zuid- en westgevels hebben het langst last.
7. **Wind**: Testo < 5 m/s [B], FLIR < 10 m/s [B]. Voor ons: **streefwaarde ≤ 3 m/s (Bft 2), harde stop > 5 m/s (Bft 3-4)** [I]. Wind koelt het buitenoppervlak en verdoezelt lekken.
8. **Geen neerslag** tijdens of net vóór de meting [B, FLIR]. Natte gevel = verdampingskoeling, valse anomalieën. Mist, sneeuw en rijp vervalsen ε en straling.
9. **Hemelstraling**: bij heldere nachtlucht koelen daken en gevels tot onder de luchttemperatuur (daken 2-5 K) [K]. Bewolkt weer is voor een buitenmeting juist gunstig en stabiel.
10. **Temperatuurfactor f = fRsi = (Tsi − Te) / (Ti − Te)**. Grens **0,65** voor schimmelrisico (NL-praktijk; exacte norm-/regelverwijzing nog verifiëren, zie onzekerheden). Bij f < 0,65 is de kans op oppervlakte-RV > 80 % reëel.
11. **U-waarde uit één buitenbeeld is onbetrouwbaar**: de buitenwarmteovergangscoëfficiënt varieert met de wind van ~10 tot ~35 W/m²K (factor > 3). Voor U-waarden: warmtestroommeter volgens ISO 9869-1 (≥ 72 u). Thermografie levert wél relatieve verschillen, patronen en binnen-fRsi.
12. **Ruimtelijke resolutie**: IFOV M60 = 1,13 mrad [B], M3T ≈ 1,3 mrad [I, afgeleid]. Meetbaar object = **≥ 3×3 pixels**: M60 ≈ 15 m afstand voor een 5 cm-detail, M3T ≈ 13 m. Detecteren (niet meten) kan tot ~2× verder.
13. **Focus is niet achteraf te herstellen.** Scherpstellen op het object, controleren op zoom, en bij twijfel opnieuw. Handmatig span/level voor analyse; auto alleen voor oriëntatie.
14. **Altijd radiometrische bestanden bewaren** (M60: radiometrische JPEG; M3T: R-JPEG 16-bit [B]) en per sessie noteren: Ti, Te, wind, bewolking, zon, RV, ε, Trefl, afstand, tijd.
15. Bij daken met drone: nat isolatiemateriaal vind je **in de avond na een zonnige dag** (warme, natte plekken blijven langer warm); warmteverlies vind je **vóór zonsopkomst in de winter**. Grind, ballast, PV en glimmend EPDM/bitumen verstoren het beeld; een afwijking is een **indicatie, geen bewijs** (bevestigen met kernboring/vochtmeter).

---

## 1. Apparatuur

### 1.1 HIKMICRO M60 (handcamera)

| Eigenschap | Waarde | Status |
|---|---|---|
| Detector (IR-resolutie) | 640 × 480 (307.200 pixels) | [B] |
| SuperIR | opschaling naar 1280 × 960 (interpolatie, geen echte resolutie) | [B] |
| NETD (thermische gevoeligheid) | < 35 mK (25 °C, F#=1,0) | [B] |
| Lens | 15 mm, F1,0, FOV 41,9° × 33,3°, handmatige focus, min. focusafstand 0,3 m | [B] |
| IFOV (ruimtelijk) | 1,13 mrad | [B] (reseller-datasheet; klopt met 41,9°/640 px) |
| Beeldfrequentie | 25 Hz (sommige verkopers noemen 30 Hz: afhankelijk van SKU) | [B], bronnen verschillen |
| Meetbereik | −20 tot 650 °C | [B] |
| Nauwkeurigheid | ±2 °C of ±2 % van de waarde | [B] |
| Zichtbaar-licht camera | 8 MP (3264 × 2448); modi thermisch / optisch / fusion / PiP | [B] |
| Meetfuncties | centrum, heet, koud; 10 punten, 1 lijn, 5 rechthoeken, 5 cirkels | [B] |
| Annotatie | spraaknotitie ≤ 60 s, tekstnotitie ≤ 200 tekens | [B] |
| Opslag | microSD 64 GB, ~35.000 beelden | [B] |
| Software | HIKMICRO Analyzer (pc: punten, lijnen, vlakken, polygonen, rapport), HIKMICRO Viewer (app, Wi-Fi) | [B] |
| Lasers/licht, IP | laserpointer + LED; IP54, valhoogte 2 m | [B] |
| Isotherm | niet bevestigd in de datasheetbronnen; in het toestel nagaan | onbekend |
| Emissiviteit/RTC/afstand instelbaar | niet in bron vermeld; standaard in dit toesteltype, in menu controleren | [I] |
| Radiometrisch JPEG-formaat | niet expliciet in de bron; HIKMICRO slaat radiometrische data in de JPEG op, dit nagaan met Analyzer | [I] |
| Wisselbare lenzen | niet gevonden; ga uit van vaste 15 mm-lens | [I] |

Opmerking: rapporteer altijd de **native 640 × 480**; SuperIR is bruikbaar voor presentatie, niet voor het aantonen van detail.

### 1.2 DJI Mavic 3 Thermal (M3T, gehuurd)

| Eigenschap | Waarde | Status |
|---|---|---|
| Sensor | ongekoelde VOx-microbolometer, 12 µm pixelpitch, 8-14 µm | [B] (DJI) |
| Resolutie | 640 × 512, 30 Hz | [B] |
| Lens | DFOV 61° (equiv. 40 mm), f/1,0, focus 5 m tot ∞ | [B] |
| Afgeleide FOV | ≈ 49° × 40° (horizontaal × verticaal) | [I, berekend] |
| Afgeleide IFOV | ≈ 1,3 mrad (reële brandpunt ≈ 9 mm) | [I, berekend uit 61° / 820 diagonale px] |
| NETD | ≤ 50 mK bij F1,0 (één bron noemt F1,1: DJI-pagina zegt F1,0) | [B] |
| Meetbereik | High gain −20 tot 150 °C; Low gain 0 tot 500 °C | [B] |
| Nauwkeurigheid | High gain ±2 °C of ±2 %; Low gain ±5 °C of ±3 % (grootste geldt) | [B] |
| Meetfuncties | spotmeter en gebiedsmeting | [B] |
| Fotoformaten | JPEG (8 bit) en **R-JPEG (16 bit radiometrisch)** | [B] |
| Fotomodi | single, timer, interval 2-60 s | [B] |
| Paletten | White Hot, Black Hot, Tint, Iron Red, Hot Iron, Arctic, Medical, Fulgurite, Rainbow 1, Rainbow 2 | [B] |
| Digitale zoom | 28× (zinloos voor analyse: geen extra detail) | [B] |
| Isotherm | in DJI Pilot 2 aanwezig volgens eerdere ervaring; niet bevestigd in DJI-specpagina | [I] |
| Emissiviteit, RTC, afstand, RV | in **DJI Thermal Analysis Tool (DTAT)** achteraf per R-JPEG aanpasbaar (ε, afstand, RV, Trefl); in de vlucht staan vaste standaardwaarden. Afstandsbereik in DTAT ~1-25 m | [I], nagaan in de tool |

Praktisch voor gebouwen: **altijd High gain** (−20 tot 150 °C is ruim voldoende, betere nauwkeurigheid en gevoeligheid). Low gain alleen bij PV-hotspots of hete installaties.

Beperking M3T: 640 × 512 met 1,3 mrad is grover dan de M60 en de afstand tot het object is vaak groter. Gebruik de drone voor **daken, overzicht en moeilijk bereikbare gevelpartijen**, de M60 voor detail van gevels en binnen.

### 1.3 Vergelijking in één oogopslag

| | M60 | M3T |
|---|---|---|
| Pixels | 640 × 480 | 640 × 512 |
| IFOV | 1,13 mrad | ≈ 1,3 mrad |
| NETD | < 35 mK | ≤ 50 mK |
| Pixel op 10 m | 1,13 cm | ≈ 1,3 cm |
| Pixel op 30 m | 3,4 cm | ≈ 3,9 cm |
| Nauwkeurigheid | ±2 °C / 2 % | ±2 °C / 2 % (high gain) |
| Beste inzet | gevel-detail, binnen, garage | daken, attiek, overzicht |

---

## 2. Basis: emissiviteit, reflectie, atmosfeer, kijkhoek

### 2.1 Stralingsvergelijking
Wat de camera ontvangt: `W_tot = ε·τ·W_obj + (1−ε)·τ·W_refl + (1−τ)·W_atm`.
Een ondoorzichtig object met lage ε weerkaatst dus vooral de omgeving. Voor opaque oppervlak: ε + ρ = 1.

### 2.2 Emissiviteit van bouwmaterialen (8-14 µm, typisch, [K])
Waarden zijn bandbreedtes uit gangbare tabellen (o.a. FLIR/Testo-type tabellen); werkelijke ε hangt af van ruwheid, vuil, vocht, kijkhoek. Bij kwantitatief werk: eigen ε bepalen (zie 2.4).

| Materiaal | ε (typisch) | Opmerking |
|---|---|---|
| Baksteen (gevel, ruw) | 0,90-0,95 | gebruik 0,93-0,95 |
| Beton (ruw) | 0,92-0,95 | gebruik 0,94 |
| Pleister, stucwerk | 0,90-0,93 | |
| Verf (mat, alle kleuren) | 0,90-0,96 | kleur doet er in LWIR nauwelijks toe |
| Glas (ruit) | ~0,85-0,92 | LWIR-ondoorzichtig, spiegelt sterk, **geen temperatuur van binnen zichtbaar** |
| Aluminium gepolijst | 0,03-0,10 | spiegel: niet meetbaar, alleen reflectie |
| Aluminium geoxideerd/mat | 0,2-0,3 | onbetrouwbaar |
| Aluminium geanodiseerd | ~0,7-0,8 | afhankelijk van laag; kozijnen: controleren |
| Zink (blank/nieuw) | 0,04-0,10 | spiegel |
| Zink (verweerd/geoxideerd) | 0,2-0,3 (tot 0,5 bij sterk verweerd) | onbetrouwbaar |
| Bitumen/dakleer | 0,92-0,96 | goed meetbaar |
| EPDM | 0,90-0,95 (glimmend nieuw: lager, spiegelt hemel) | |
| Keramische dakpan | 0,90-0,95 | geglazuurd iets lager |
| Kunststof kozijn (PVC) | 0,90-0,94 | |
| Hout (onbehandeld/geverfd) | 0,90-0,95 | |
| Water, nat oppervlak | 0,95-0,98 | natte gevel: verdamping, ε hoger maar temperatuur vervalst |
| Gras, sneeuw | 0,95-0,98 | sneeuw verbergt het dak |

Regel: **ε < 0,6 = niet kwantitatief meten**. Kozijnen, goten, daktrim, loodslabben: alleen kwalitatief, of beplakken met mat tape (ε 0,95, zie 2.4).

### 2.3 Gereflecteerde schijnbare temperatuur (RTC), verfrommelde-folie-methode [K]
1. Verfrommel een vel aluminiumfolie, vouw het weer open (diffuse spiegel), leg of houd het op/bij het meetoppervlak, onder dezelfde hoek.
2. Zet in de camera **ε = 1,0** en **afstand = 0 m** (of zo kort mogelijk).
3. Richt op de folie en lees de **gemiddelde** temperatuur (bijv. rechthoek) af. Dat is RTC.
4. Zet ε terug op de waarde voor het object en vul RTC in als "reflected temperature". Bij de M3T doe je dit in DTAT per beeld.
5. Herhaal als de omgeving verandert (andere gevelkant, zon achter wolk, nabij warme bron).

Typische waarden buiten: helder nachtelijk hemelvlak −30 tot −50 °C (zichtbaar in de camera als zeer koud); bewolkt: ≈ luchttemperatuur −2 tot −5 K; naburig gebouw/muur ≈ lucht. Binnen: RTC ≈ kamertemperatuur, tenzij warme bronnen of ramen in de reflectiehoek staan.

Rekenvoorbeeld foutgrootte [I]: baksteenwand 5 °C, ε werkelijk 0,93, tegenover een heldere hemel (Trefl ≈ −30 °C). Zet je RTC op 5 °C in plaats van −30 °C, dan is de fout ≈ (1−ε) × ΔT = 0,07 × 35 ≈ **2,5 K te hoog**. Bij ε 0,6 (bijv. verweerd zink) wordt dat > 10 K.

Praktisch: voorkom reflectie door **schuin te kijken niet te extreem**, door niet naar de hemel te richten op glimmende vlakken, en door te meten bij bewolking of op gevels die niets spiegelen.

### 2.4 Emissiviteit bepalen (indien nodig) [K]
- Contactmethode: plak mat tape (ε ≈ 0,95) naast het onderdeel, laat in evenwicht komen, lees tape af, stel ε van het onderdeel zó in dat de temperatuur gelijk is.
- Alleen zinvol bij ΔT > ~10 K tussen object en omgeving.

### 2.5 Atmosferische transmissie en afstand
In 8-14 µm is de lucht op bouwafstanden (< 30 m) vrijwel transparant: τ ≈ 0,95-0,99 [K]. Effect op een gevelmeting op 30 m is meestal < 1 K. Neemt toe bij hoge RV en afstand > 50 m (relevant voor drone > 50 m hoogte). Mist, regen en dichte sneeuw absorberen/verstrooien: niet meten. Camera/DTAT vraagt om afstand, RV en luchttemperatuur; invullen met werkelijke waarden uit de sessienotitie.

### 2.6 Kijkhoek (hoek t.o.v. de loodlijn)
Dielectrische bouwmaterialen houden ε tot ~45-60°; daarboven daalt ε snel (bij 70° ≈ 0,8, bij 80° < 0,5) [K].

| Hoek | Advies |
|---|---|
| 0-30° | ideaal; glas, metaal, nat: max. 30° |
| 30-45° | goed voor matte bouwmaterialen |
| 45-60° | alleen voor oriëntatie/kwalitatief |
| > 60° | afkeuren voor beoordeling |

Gevolg: voor hoge gevels veel afstand nemen of de drone gebruiken. Voorbeeld: ooghoogte 1,6 m, bovenkant gevel op 15 m hoogte, je staat op 12 m afstand → hoek ≈ atan(13,4/12) ≈ 48° naar boven (nog net acceptabel); op 25 m afstand ≈ 28° (goed).

### 2.7 Luchtvochtigheid
Beperkt effect op de meting zelf (zie 2.5), maar RV is cruciaal voor **binnen**: dauwpunt en schimmelrisico (zie 4). Bij RV > ~85 % buiten of mist: meting uitstellen.

---

## 3. Meetcondities

### 3.1 Samenvatting buiten

| Parameter | Eis (bronnen) | Onze regel [I] |
|---|---|---|
| ΔT binnen-buiten | FLIR: > 10 K over de schil en > 5 K gedurende 24 u ervoor [B]; Testo: 10-15 K gedurende ≥ 12 u [B] | **≥ 15 K gewenst, 10 K absoluut minimum**; binnen verwarmd 24 u |
| Stabiele buitentemp | FLIR: binnen ±3 °C tijdens meting en het uur ervoor [B] | ±2 K, geen snelle trend |
| Wind | Testo < 5 m/s; FLIR < 10 m/s [B] | ≤ 3 m/s doel; > 5 m/s niet meten |
| Zon | Testo: ook zon in voorgaande uren vervalst [B]; vroeg in de ochtend vóór zonsopkomst [B] | zie 3.2 |
| Neerslag | geen vlak ervoor of tijdens [B, FLIR] | gevel ≥ 24 u droog; geen natte gevel |
| Bewolking | niet vermeld | bij voorkeur bewolkt (hemelstraling minimaal) |
| Tijdstip | Testo: koude seizoen, ochtend vóór zonsopkomst [B] | 04:00-07:00 in de winter, of 3+ u na zonsondergang |

NB: ISO 6781-1:2023 is de actuele norm voor de algemene procedure en de eisen aan apparatuur/rapportage; ISO 6781-3:2015 voor competenties (3 klassen) [B]. De exacte drempelwaarden uit de norm zijn niet uit de zoekresultaten gehaald; aan de volledige tekst toetsen voordat ze als "norm" in een rapport worden geciteerd.

### 3.2 Zon en oriëntatie [I]
De zon verwarmt de gevel; die warmte (vooral massief metselwerk/beton) werkt uren door.

| Gevel | Zonbelasting | Minimale wachttijd zonder instraling (richtlijn) |
|---|---|---|
| Noord | laag (alleen zomer vroeg/laat) | 1-2 u |
| Oost | ochtend | meten bij voorkeur 's avonds/nacht, of vóór zonsopkomst |
| Zuid | hoog, de hele dag | ≥ 4-6 u na zonsondergang, anders vóór zonsopkomst |
| West | middag/avond | ≥ 4-6 u na zonsondergang |
| Licht/dun (houtskelet, plaatmateriaal) | snel in evenwicht | 1-2 u |

Een bewolkte dag (diffuus licht) is veel milder; een zonnige winterdag met laagstaande zon op een zuidgevel kan nog 6+ u nawerken. Wacht liever tot het signaal gewoon weg is: controleer met een **referentievlak** (ongestoord gevelvlak) dat de gevel egaal is.

### 3.3 Wind, regen, hemelstraling, mist, sneeuw
- **Wind**: verhoogt de convectieve afkoeling aan buiten, verlaagt het contrast van lekken en isolatiefouten, en kan luchtlek-patronen vervormen. Bij 5 m/s wordt het buitenoppervlak van een goed geïsoleerde wand egaal koud. Noteer windsnelheid (en richting t.o.v. gevel) per sessie.
- **Neerslag/natte gevel**: verdamping koelt tot 1-3 K. Alles verandert: bakstenen met vocht lijken kouder. Niet meten tot gevel droog is (≥ 24 u droog voor baksteen).
- **Hemelstraling**: heldere nachtlucht ~ −30 tot −50 °C effectief; daken (horizontaal) koelen 2-5 K onder luchttemperatuur, gevels minder, grote overstekken en bomen schermen af [K]. Gevolg: daken kunnen onder het dauwpunt komen (condensatie/rijp) zonder dat er een isolatiefout is. Een heldere nacht geeft goede contrasten bij daken maar vervalste absolute waarden. Bewolking werkt als deken.
- **Mist**: absorbeert/verstrooit LWIR en maakt oppervlakken nat: niet meten.
- **Sneeuw/rijp op daken**: sneeuw isoleert en verbergt het dak. Rijp wijzigt ε. Alleen meten op droge, sneeuwvrije daken.

### 3.4 Binnenmetingen
- Verwarming minimaal **24 u** stabiel aan; binnen-buiten ΔT ≥ 10 K (liefst 15 K).
- Meubels 0,5-1 m van de buitenmuur af indien mogelijk; gordijnen open.
- Geen zon op de binnenzijde (zonwering sluiten bij zuid/west).
- Ramen/deuren dicht. Ventilatie in standaardstand noteren.
- Vloerverwarming op muurlocatie: patroon zichtbaar, niet als fout aanmerken.
- Binnenmeting is gevoeliger voor **luchtlekken en koudebruggen**; de oppervlaktetemperatuur Tsi is daar het kwantitatieve getal (zie 4).

### 3.5 Drukverschil en luchtlekdetectie (blowerdoor)
- Blowerdoor-test volgens EN ISO 9972: onderdruk van **50 Pa** (meetpunt). Met een onderdruk wordt koude buitenlucht door spleten naar binnen gezogen en ontstaan koude strepen/waaiers in het binnenbeeld bij naden, kozijnaansluitingen, kruipluik, stopcontacten, doorvoeren [K].
- Methode: **vergelijkend**: eerst een reeks binnenbeelden bij normale druk (referentie), daarna dezelfde posities met 50 Pa onderdruk (na ~5-10 min stabilisatie) [I]. Alleen wat verandert is luchtlek.
- ΔT ≥ 10 K gewenst; bij kleinere ΔT worden lekken niet zichtbaar.
- Overdruk is mogelijk: de lekken tonen dan warme uitstroming aan de buitenkant (alleen bij kleine wind).
- Combineren met een rookpen of anemometer om lekken te bevestigen.

---

## 4. Kwantitatief: temperatuurfactor, dauwpunt, U-waarde

### 4.1 Temperatuurfactor fRsi
`f = (Tsi − Te) / (Ti − Te)`; Tsi = binnenoppervlaktetemperatuur (uit thermisch beeld, met juiste ε en RTC), Ti = binnenluchttemperatuur (naast de plek, niet bij een radiator), Te = buitenluchttemperatuur (gemiddelde over de afgelopen uren).

Bereken uit een binnenbeeld:
1. Meet Ti met een geijkte thermometer of in de kamer op ~1 m van de muur; Te met een buitensensor in de schaduw.
2. Bepaal in de beeldsoftware (Analyzer/DTAT) de **minimum Tsi** in het kritieke punt (hoek, kozijnaansluiting) met een rechthoek of puntmeting.
3. Reken f uit.

Rekenvoorbeeld: Ti = 20,0 °C, Te = 2,0 °C, Tsi (hoek) = 14,5 °C → f = (14,5−2,0)/(20,0−2,0) = 12,5/18 = **0,69** (boven 0,65).
Om f = 0,65 te halen bij deze Ti/Te moet Tsi ≥ 2,0 + 0,65 × 18 = **13,7 °C**.

Normalisatie naar ontwerpcondities: f is (bij stationair gedrag) onafhankelijk van Te. Meet je bij Te = 2 °C en vind je f = 0,60, dan kun je Tsi bij Te = −10 °C voorspellen: −10 + 0,60 × 30 = **8,0 °C** [K].

Voorwaarden voor betrouwbare f: ΔT ≥ 10 K, stationair (24 u), geen zon, geen vloer/radiator vlakbij, Ti gemeten op dezelfde hoogte, ε en RTC goed. Onzekerheid camera ±2 K betekent bij ΔT 18 K een f-onzekerheid van ±0,11. Dit is **indicatief**: lees het als "waarschijnlijk > of < grens", niet als certificaat. Een tweede onafhankelijke contactmeting (oppervlaktesensor) op de kritieke plek verkleint de onzekerheid sterk.

Grens **0,65** [I/K]: in NL de gangbare minimumwaarde voor schimmelrisico (NPR 2652/EN ISO 13788-systematiek; exacte status voor bestaande bouw nog verifiëren, zie onzekerheden).

### 4.2 Dauwpunt en condensatie
Dauwpunt Td uit Ti en RV (Magnus). Voorbeelden bij Ti = 20 °C [K]:

| RV binnen | Dauwpunt |
|---|---|
| 40 % | 6,0 °C |
| 50 % | 9,3 °C |
| 60 % | 12,0 °C |
| 70 % | 14,4 °C |

- **Condensatie** treedt op als Tsi ≤ Td.
- **Schimmelrisico** begint eerder: bij oppervlakte-RV ≥ 80 % over meerdere dagen. Bij 20 °C/50 % betekent dat Tsi ≥ **≈ 12,5 °C**; bij 20 °C/60 % Tsi ≥ **≈ 15,5 °C** [K, berekend].
- Gevolg voor f: bij Ti 20 °C/50 % RV en Te = 0 °C is f_min = 12,5/20 = 0,63; bij Te = −10 °C is f_min = 22,5/30 = 0,75. De "universele" 0,65 hoort bij een bepaalde ontwerp-Te en RV; noteer altijd de gebruikte RV.
- Meet RV met een geijkte hygrometer in de ruimte (niet alleen camera-instelling); noteer.

### 4.3 Waarom U-waarden uit één buitenbeeld onbetrouwbaar zijn
Buitenoppervlak: `q = U·(Ti−Te)` en `q = h_e·(Tse−Te)`, dus `Tse−Te = U·(Ti−Te)/h_e`.
- h_e hangt sterk af van wind: ~10 W/m²K (windstil) tot ~25-35 W/m²K (4-8 m/s) [K]. De norm-rekenwaarde R_se = 0,04 m²K/W ≈ 25 W/m²K.
- Voorbeeld: wand met U = 1,5 W/m²K, Ti−Te = 18 K → q = 27 W/m². Bij h_e = 10: Tse−Te = 2,7 K; bij h_e = 25: 1,1 K. Zelfde wand, factor 2,5 verschil in oppervlakte-ΔT.
- Daarbij komen: straling naar de hemel, zonnewarmte-opslag, vocht, lage ε, tijdsafhankelijke (niet stationaire) toestand.
- Conclusie: **geen U-waarde uit thermografie rapporteren.**
- Wél correct: **ISO 9869-1** (warmtestroommeter, minimaal 72 u meting [K], stabiele ΔT ≥ 10 K), of een inspectiegebaseerde Rc-schatting uit constructie. Gebruik thermografie om representatieve meetplekken te kiezen.

### 4.4 Wat kun je wel kwantitatief zeggen?
- **Relatieve verschillen** tussen vlakken van hetzelfde materiaal op dezelfde gevel, in hetzelfde beeld (ΔT_oppervlak t.o.v. referentievlak).
- **Binnen: Tsi en fRsi** (4.1), mits ΔT goed is en ε/RTC kloppen.
- **Luchtlek** als verandering bij 50 Pa onderdruk.
- **Classificatie** (eigen voorstel, [I]); schaal ΔT_afwijking = verschil met referentievlak bij ΔT_binnen-buiten ≥ 15 K, relatief op het referentieverschil:

| Afwijking t.o.v. referentie (buiten/binnen) | Klasse | Interpretatie |
|---|---|---|
| < 1 K | 0 | geen afwijking |
| 1-2 K | 1 | lichte afwijking; vermelden |
| 2-4 K | 2 | duidelijke afwijking; nader onderzoek |
| > 4 K | 3 | ernstig; actie vereist |

Geef bij elke klasse het contrast en de hoek van het onderdeel aan, en de aanname dat het geen reflectie is.

---

## 5. Ruimtelijke resolutie

### 5.1 Formules
- Pixelgrootte op het object: `s = IFOV × d` (kleine-hoekbenadering).
- **Meetbaar object**: ≥ 3×3 pixels volledig binnen het object (voorkomt randeffect). Detectie van een lijn/voeg kan met 1-2 pixels breed (als het object een duidelijk contrast heeft en niet door omringend materiaal wordt uitgemiddeld).
- Dekking bij afstand d: breedte `W = 2·d·tan(HFOV/2)`, hoogte `H = 2·d·tan(VFOV/2)`.

### 5.2 Maximale afstand voor een object van 5 cm (lateif/voeg)

| | M60 (1,13 mrad) | M3T (≈ 1,3 mrad) |
|---|---|---|
| Max. afstand voor 3×3 px op 5 cm (pixel ≤ 1,67 cm) | **14,7 m** | **12,8 m** |
| Max. afstand voor 1 px op 5 cm (detectie, niet meten) | 44 m | 38 m |
| Pragmatisch voor detectie 2 px | 22 m | 19 m |

Voeg van 5 cm in baksteen: gevolg ~2 px breed op 20 m (M60). Het contrast (ΔT tussen voeg en steen) hangt van de luchtlek en de ε af; kleine ΔT's verdwijnen sneller dan 3 px.

### 5.3 Rekenvoorbeeld gevel van 5 bouwlagen (± 15 m hoog) met de M60 vanaf de grond
- VFOV 33,3° → H = 0,598·d; HFOV 41,9° → W = 0,766·d.
- Hele gevelhoogte in één beeld: d = 15/0,598 ≈ **25 m**. Pixelgrootte = 1,13 mrad × 25 = **2,8 cm**. Een lateihoogte van 5 cm = 1,8 px: detecteren gemengd, niet kwantificeren.
- Beter in **2 hoogtezones**: d = 12 m geeft H = 7,2 m, W = 9,2 m, pixel 1,36 cm (5 cm = 3,7 px). Maar kijkhoek omhoog: bovenste lijn ≈ 48° → net acceptabel voor de onderste helft, voor de bovenste helft bij 12 m is de hoek te scherp (> 60°). Dus: **bovenste lagen met drone**, onderste 2-3 lagen met M60 op 10-15 m.
- Gebruik overlap en gelijkblijvende afstand; noteer het aantal beelden per gevel (bijv. 3 breedte × 2 hoogte).

### 5.4 Rekenvoorbeeld M3T op hoogte h
- Pixelgrootte (nadir) ≈ 1,3 mrad × h; dekking W ≈ 0,92·h, H ≈ 0,74·h.

| Hoogte h | Pixel (cm) | Dekking B × H (m) | 5 cm = n px |
|---|---|---|---|
| 10 m | 1,3 | 9,2 × 7,4 | 3,8 |
| 13 m | 1,7 | 12 × 9,6 | 3,0 |
| 20 m | 2,6 | 18 × 15 | 1,9 |
| 30 m | 3,9 | 28 × 22 | 1,3 |
| 50 m | 6,5 | 46 × 37 | 0,8 (niet detecteerbaar) |

Voor een gevel: drone op ~10-13 m afstand loodrecht voor de gevel levert 3 px op 5 cm, bij dekking ~9-12 m breed. Een vliegpatroon in rijen van onder naar boven past bij 5 lagen.

---

## 6. Instellingen in de praktijk

- **Span/level**: *Auto* alleen voor oriëntatie (AGC rekt contrast naar de uitersten, waardoor warme/koude punten de schaal bepalen en het beeld "valse" anomalieën toont). Voor analyse: **handmatig**; span ≈ 6-10 K rond de gevel-gemiddelde temperatuur voor leksporen (kleiner span = meer contrast, maar meer ruis), breder span (15-20 K) voor het overzicht. Noteer min/max en gebruik per serie dezelfde schaal, zodat beelden vergelijkbaar zijn.
- **Palet**: *Iron/Hot Iron* is de standaard voor leken en rapportage; *Rainbow* voor subtiele ΔT's in een smal span (kleurovergangen zijn zichtbaar, maar misleidend over grootte); *Grijs (White Hot)* om focus en vorm te beoordelen en voor het uitsnijden van randen; *Arctic/Tint* alleen voor presentatie. Gebruik in een rapport één palet en één schaal.
- **Isothermen/alarmkleur**: markeer alles onder een drempel, bijv. onder de temperatuur waarbij f = 0,65 of onder het dauwpunt. Zeer handig om schimmelrisico-plekken te laten oplichten. Bestaan van de functie op de M60 is niet bevestigd (zie 1.1); op M3T via Pilot 2/DTAT nagaan.
- **Focus**: kritisch. Een onscherp beeld geeft een te laag piekwaarde (lagere T-max) en maakt kleine details onleesbaar. M60: handmatig, minimaal 0,3 m. Controleer de focus op de display met digitale zoom; nooit achteraf te corrigeren (SuperIR niet als remedie).
- **Beeldsamenstelling**: per element: (1) overzichtsfoto van de gevel/woonkamer met zichtbare oriëntatie; (2) thermisch beeld in groothoek; (3) detail met ≥ 3×3 px; (4) visueel referentiebeeld (zichtbaar licht, zelfde hoek). Eén stukje gevel met het referentievlak in beeld. Plaats het beeld loodrecht ("frontal").
- **Opslag**: altijd radiometrische bestanden (M60: radiometrische JPEG; M3T: R-JPEG), niet alleen screenshot. Maak eerst een back-up op laptop/schijf en rapporteer alleen via de analysesoftware.
- **Sessie-notitie** (verplicht, voor elk object): datum, tijd, adres, gevel, Ti, Te, RV, wind (m/s en richting), bewolking, zon/regen van de voorgaande 24 u, ε per materiaal, RTC, afstand, camera + lensconfig, palet/span/level, bijzonderheden (reflecties, warme bronnen).
- **Kalibratie en gewoonte**: bevestig de camera na buiten opstarten in het veld (opwarmen 5-10 min); doe NUC/shutter niet in de middenopname. Camerakalibratie jaarlijks door fabrikant [K].

---

## 7. Drone-thermografie van daken en gevels

### 7.1 Natte isolatie in platte daken (principe ASTM C1153) [B/K]
Principe [B]: overdag neemt het dak zonnewarmte op; na zonsondergang geven droge isolatiegebieden die warmte sneller af, natte gebieden (grotere warmtecapaciteit) blijven langer warm en verschijnen als warme anomalieën. Anomalieën blijven zichtbaar tot het dak enkele uren na zonsondergang in evenwicht komt.

Praktijk:
- Dag voorafgaand **zonnig**, dak droog (geen plassen, sneeuw, ijs, afval) [B].
- Vliegen vanaf ~1 uur na zonsondergang tot ~3 uur erna [B voor "1 u na zonsondergang", rest I]. Windstil tot lichte wind (≤ 5 m/s [I]).
- Droge periode ≥ 24-48 u.
- Verifieer elke warme plek met vochtmeter/kernboring [B: sample openings vereist].
- ASTM C1153 regelt apparatuur, weeromstandigheden, daktypen, werkwijze en invasieve controle; **de exacte drempels (min. ΔT, wind) zijn niet uit de zoekresultaten gehaald**: ASTM-tekst raadplegen voor rapportage naar die standaard [B].
- Beperking [B]: betonnen deklaag/ballast boven isolatie verbergt natte isolatie; grind/ballast geeft patronen die op natte plekken lijken.

### 7.2 Vlieginstellingen (M3T) [I]

| Parameter | Waarde | Reden |
|---|---|---|
| Hoogte | 20-30 m | 2,6-3,9 cm pixel; plaatsing van 1 m²-anomalieën goed, grotere dekking |
| Camerahoek | nadir (−90°) voor kaart; −70 tot −80° voor reflectieproblemen | |
| Overlap | 70 % in rijrichting, 60 % zijwaarts (voor ortho); bij losse beeldanalyse 30-40 % | thermische beelden hebben weinig textuur; stitching vaak slecht |
| Interval | 2 s (minimum) | [B] DJI |
| Snelheid | ≤ 3 m/s (bij 70 % overlap op 30 m: 22 m × 0,3 / 2 s = 3,3 m/s) | beeldscherpte en overlap |
| Gain | High gain | beste gevoeligheid |
| Meting | R-JPEG, ε dakbedekking, RTC | |

Orthomosaic-stitching van thermische beelden (WebODM/Pix4D/DJI Terra) is mogelijk, maar vergt geometrisch goede overlap en wisselende lichtverlopen kunnen naden geven. Eerst als losse beelden beoordelen.

### 7.3 Warmteverlies van daken en gevels met drone
- Tijdstip: **vóór zonsopkomst** in de winter, ΔT ≥ 10-15 K, droog dak, geen rijp of sneeuw [I]. Warmteverlies ziet men als warmere gebieden op een koud dak (isolatiegaten, koudebruggen, naden, doorvoeren).
- Verschillend tijdstip voor vochtdetectie (avond na zonnige dag) en warmteverlies (voor zonsopkomst). Combineer niet in één vlucht.
- Hemelstraling: heldere nacht koelt het dak, het contrast wordt scherper, maar de absolute T is vervalst. Een dak onder het dauwpunt gaat rijp vormen.
- Gevels vanaf de drone: kijk zo loodrecht mogelijk (camera horizontaal), 10-13 m afstand, rijen van onder naar boven.

### 7.4 Beperkingen
- **Hemelreflectie** op glimmend bitumen, nieuw EPDM, gladde PVC-/TPO-banen en nat dak: de koude hemel verschijnt als koude vlek. Remedie: bewolkte avond, andere hoek, ε tuning (ε ~0,9-0,95), controle met folie-RTC op het dak. [K]
- **Grind/ballast**: warmteverlies en vochtpatroon niet te onderscheiden; ook grind koelt snel af. Ballastdaken: alleen geschikt voor warmteverliesanalyse in sterk contrast, niet voor natte isolatie.
- **PV-panelen**: hoge reflectie van de hemel; ε glas ~0,9, maar zonnecellen warmen op en veroorzaken eigen patronen; ballast onder panelen verbergt dak. Afstand houden van de PV bij isolatiemeting.
- **Plassen**: spiegel en verdamping, patroon niet bruikbaar.
- **Bladeren/vuil**: warme plekken.
- Metalen dakranden, goten, lood: ε te laag, onbruikbaar kwantitatief.
- **Emissiviteit dakbedekking**: bitumen 0,92-0,96, EPDM 0,90-0,95, grind 0,90-0,95, golfplaat staal gelakt 0,85-0,95 (blank/gegalvaniseerd 0,1-0,3 → niet meten). Zet ε op de gangbare waarde (0,93-0,95) en noteer.
- Luchtvaartregels: vliegen na zonsondergang valt onder specifieke-categorieregels (UAS-operatiemanual); zie bestaande vliegdocumentatie.

### 7.5 Dakranden en attiek
- De dakrand (attiek) is een klassieke koudebrug: de gevelisolatie en dakisolatie sluiten daar vaak slecht aan.
- Buitenbeeld: onder een hoek van 30-45° naar de dakrand kijken; zie warmere lijnen langs de attiek en de bovenste rand van de gevel. Dak recht van bovenaf toont alleen de bovenzijde van de attiek.
- Binnenbeeld (bovenste verdieping): koude plafondrand en lage fRsi bij de hoek wand/dak.
- Goede combinatie: M3T-beelden onder 45° en binnen-beeld van de bovenste kamer.

---

## 8. Parkeergarageplafond / onderzijde vloer

Situatie: een woning of kantoor boven een niet-verwarmde parkeergarage; isolatie (platen, gespoten) onder de betonvloer.

### 8.1 Meetopzet
- Meten **vanuit de garage** naar het plafond (onderzijde van de vloer).
- Condities: woning boven de garage verwarmd en ≥ 24 u stabiel op 20 °C; garage temperatuur stabiel, bijv. 3-8 °C → **ΔT woning-garage ≥ 10-15 K** [I]. Een geïsoleerde garage die 10+ °C is, geeft te weinig contrast: dan is de buitenlucht-ΔT onbruikbaar en moet de woning juist verwarmd worden.
- Garagedeuren dicht ≥ 12 u (geen tocht); geen auto's die net hebben gestaan met warme motor; geen zon op de hellingbaan.
- Kijkhoek: plafond is een rechte vlak, op 2-3 m afstand van beneden. Ga recht omhoog of onder ≤ 45°. Afstand voor 3×3 px op 5 cm: 15 m (M60) is zelden nodig; hier meestal 3-5 m.
- ε: beton 0,93-0,95; isolatieplaten met folie- of aluminiumkasjering hebben lage ε (pas op), houtwolcement (Troldtekt) 0,90-0,95, geschilderde platen 0,92-0,96. Controleer plaat met mat tape.
- RTC: verlichting, buizen/leidingen en andere warme bronnen in de reflectiehoek; folie-methode toepassen.
- Verwarmingsleidingen (vloerverwarming, CV) tonen eigen patronen: ken de situatie.

### 8.2 Wat zie je
| Beeld | Interpretatie |
|---|---|
| Egale koude plafondvlakken (dichtbij garagetemperatuur) | isolatie intact, aansluitend |
| Warmere vlakken (richting woningtemperatuur) | **ontbrekende** of dunnere isolatie, afgeknepen delen, of losgeraakte platen met warme luchtstroming |
| Warme lijnen/stroken langs naden en randen | koudebrug / naadlek (open naden) |
| Gebogen of "wolkige" patronen met geleidelijke overgang | losgeraakte platen met ingesloten lucht (convectie achter de plaat) |
| Warme stroken langs kolommen en wanden | koudebruggen bij kolom-/wandaansluitingen (constructief, nodig om te noteren) |
| Zeer warme punten | leidingdoorvoeren, CV-leidingen, afvoeren |

Losgeraakte plaat: vaak een plaatsgebonden afwijking van 1-3 K met een scherpe rand; de plaat zelf is koud aan de ene zijde en warm waar de lucht binnenkomt. Controle: tikken (hol geluid) of loskomende plaat visueel.
Referentie: een intact plafondvak als nulpunt (ΔT-afwijking relatief).

---

## 9. Onzekerheden en vervolgacties
1. **ISO 6781-1:2023 en ISO 9869-1**: drempelwaarden (ΔT, wind, zon, tijd) niet uit de norm zelf gehaald. Norm aanschaffen/inzien; tot dan staan de FLIR-/Testo-waarden als [B] en onze streefwaarden als [I].
2. **fRsi 0,65**: exacte bron voor bestaande bouw (NPR 2652, Bouwbesluit, NEN-EN-ISO 13788, NEN 2778) verifiëren; de relatie met Te/RV is hierboven wel doorgerekend.
3. **M3T IFOV (≈ 1,3 mrad), FOV H×V, isotherm in Pilot 2, DTAT-parameterbereik (ε, afstand)**: afgeleid/uit geheugen; in Pilot 2 en DTAT controleren.
4. **M60**: IFOV komt van een reseller; officiële datasheet-PDF was niet leesbaar. Vaste lens, isotherm, radiometrisch bestandsformaat en ε/RTC-menu nog in het toestel/Analyzer controleren. Beeldfrequentie 25 of 30 Hz per SKU.
5. **ASTM C1153**: exacte drempelwaarden niet gevonden; ASTM-tekst raadplegen als in rapportage naar de norm wordt verwezen.
6. **Emissiviteitswaarden**: typische tabelwaarden; niet per product gevalideerd. Eigen metingen met tape toevoegen aan kennisbank.
7. **Wachttijden na zon, snelheden/overlap, klasse-indeling ΔT**: eigen voorstellen [I], aan de hand van de eerste echte metingen aanpassen.
8. Uitkomst thermografie is **indicatie**: bevestiging via contactmeting, vochtmeter, kernboring, blowerdoor/rookpen.

---

## Bronnenlijst

Geraadpleegd in deze sessie (2026-11-06):
- DJI Enterprise, Mavic 3 Enterprise specs (M3T en M3TA thermisch): https://enterprise.dji.com/mavic-3-enterprise/specs
- Batronix, HIKMICRO M60 productpagina (NETD, lens, FOV, 25 Hz, ±2 °C/2 %, software, opslag): https://www.batronix.com/shop/thermal-cameras/hikmicro/hikmicro-M60.html
- ICS Schneider, HIKMICRO M60 (IFOV 1,13 mrad, 15 mm, 41,9° × 33,3°): https://www.ics-schneider.de/produkte/m-serie-m60-handgehaltene-waermebildkamera/?lang=en
- HIKMICRO M60 datasheet (PDF, niet leesbaar uitgelezen): https://cdn.shopify.com/s/files/1/0755/9344/9805/files/HIKMICRO-M60-Datasheet.pdf
- Testo, Thermal imager practical guide building registration (wind < 5 m/s, ΔT 10-15 K gedurende 12 u, zon): https://www.testo.com/en-US/downloads/thermal-imager-practical-guide-building-registration
- FLIR InfraCAM manual, introduction to building thermography (ΔT > 10 K, 5 K/24 u, ±3 °C, wind < 10 m/s, geen neerslag): https://www.manualslib.com/manual/1021728/Flir-Infracam.html?page=126
- ISO 6781-1:2023 (catalogusvermelding): https://www.boutique.afnor.org/en-gb/standard/iso-678112023/performance-of-buildings-detection-of-heat-air-and-moisture-irregularities-/xs137895/349263
- ISO 6781-3:2015 (competenties, 3 klassen): https://www.boutique.afnor.org/en-gb/standard/iso-678132015/performance-of-buildings-detection-of-heat-air-and-moisture-irregularities-/xs125259/121802
- IIBEC, sUAS thermal imaging for building enclosure (avondprincipe, ballast, beperkingen): https://iibec.org/wp-content/uploads/Using-Thermal-Imaging-to-Assess-Building-Performance.pdf
- SGH, Topic Brief sUAS Thermal Imaging: https://www.sgh.com/wp-content/uploads/2023/03/Topic-Brief_sUAS-Thermal-Imaging.pdf
- Roofing Contractor, thermal drone flat roof inspection (1 u na zonsondergang): https://www.roofingcontractor.com/articles/96973-advances-in-thermal-imaging-drone-technology-greatly-improve-commercial-flat-roof-inspection-efficiency
- FLIR DELTA Solutions, commercial flat roof inspection: https://flir.asia/suas/delta/delta-solution-series-part-5-commercial-flat-roof-inspection

Niet online geraadpleegd (algemene vakkennis, [K]): FLIR/Testo emissiviteitstabellen, ISO 9869-1, EN ISO 9972, EN ISO 13788, ASTM C1153, NPR 2652. Nog te raadplegen NL-bronnen: IRIS Thermovision, TNO, ISSO-publicaties, Milieu Centraal.
