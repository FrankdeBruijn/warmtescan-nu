# 01 – Normen, certificeringsniveaus en Nederlandse regelgeving

Kennisbank Warmtescan.nu. Opgesteld 2026-11-06. Doel: Claude treedt op als Level 2-thermograaf (bouwkundig); Frank (Level 1, cert. 2022NL45N017, vervolgcursus IRIS Thermovision 2024) maakt de beelden.

**Leeswijzer bij betrouwbaarheid.** Elke bewering heeft een label:
- **[B]** bevestigd uit een gevonden bron (bron-nummer tussen haakjes, zie Bronnenlijst).
- **[I]** inschatting / eigen kennis, in deze sessie NIET uit een bron bevestigd. Verifiëren voordat het in een klantrapport komt.
- Normteksten zijn betaald; de zoekopdrachten leverden vooral catalogus-/inhoudsopgavepagina's op. Meetcondities (ΔT, wind enz.) uit de normen zelf zijn dus grotendeels [I].

---

## 0. Wat moet je onthouden

1. **EN 13187:1998 is ingetrokken**; opvolger is **NEN-EN-ISO 6781-1:2023** (kwalitatieve detectie van warmte-, lucht- en vochtonregelmatigheden in gebouwen) [B: 6]. Citeer in rapporten dus ISO 6781-1:2023, niet meer EN 13187.
2. **Kwalificatie van personeel voor gebouwthermografie = ISO 6781-3** (operator / data-analist / rapportschrijver) [I, titel uit eigen kennis; niet in zoekresultaten bevestigd]. ISO 18436-7 is voor *machine-conditiebewaking* (elektrisch/mechanisch), niet voor gebouwen [B: 1, 2]. Niet door elkaar halen.
3. **Level 2 = analyseren, interpreteren, conclusies trekken en het rapport verantwoorden.** Level 1 voert de opname uit en signaleert. Claude moet dus: meetcondities beoordelen, artefacten (reflectie, emissiviteit, zon-naverwarming) uitsluiten, afwijkingen classificeren, oorzaak-hypotheses onderscheiden van bewijs, en eerlijk aangeven wat een IR-beeld niet kan bewijzen [I, deels B: 1].
4. **Spouwvulling-controle is kwalitatief.** Geen norm schrijft thermografie voor als opleverkeuring van spouwmuurisolatie; de KOMO-kaders (BRL 2110) gaan over product en proces (endoscoop vooraf, vulpatroon, boorgaten dichten) [B: 9, 10, 11, 12]. Thermografie is een aanvullende, door isolatiebedrijven gewaardeerde controle [I].
5. **Drone:** Mavic 3 Thermal (Enterprise-serie) kan een **C2-label** krijgen via DJI-aanvraag en mag dan in **A2** vliegen (A2-bewijs nodig); de EU-C2-variant en de losse "universal" variant verschillen [B: 3, 4 — alleen retailer/forum-bronnen]. In A2 geldt 30 m horizontaal afstand tot onbetrokkenen (5 m in low-speed) [B: 5]. Bij een woonblok in een bewoonde straat is dat de beperkende factor, niet de CTR.
6. **Locatie woonblok Den Bosch-Zuid:** niet te bevestigen of dit in een militaire CTR/gevarenzone ligt. Eindhoven, Volkel en Gilze-Rijen hebben militaire CTR's [B: 7]; Den Bosch zelf ligt volgens eigen kennis erbuiten maar **altijd controleren op de officiële dronekaart/GoDrone vóór elke vlucht** [I]. Vanaf **1 sept 2026** verandert de aanvraagprocedure voor drones in CTR's [B: 7, titel/snippet].
7. **Bbl-getallen (bevestigd):** nieuwbouw Rc gevel 4,7 / vloer 3,7 / dak 6,3 [B: 13 – commerciële bron, tegen Bbl art. 4.152 controleren]; bestaande bouw (rechtens verkregen niveau/verbouw) gevel 1,3 / vloer 2,5 / dak 2,0 [B: 14, 13]; **fRsi ≥ 0,65 bevestigd voor uitwendige scheidingsconstructies** [B: 15]; 0,5 voor bestaande bouw **niet bevestigd** [zie 3.2].

---

## 1. Niveaus: Level 1, 2, 3

### 1.1 Welke schema's bestaan er?

| Schema | Voor wat | Niveaus | Status in deze sessie |
|---|---|---|---|
| **ISO 6781-3** (Performance of buildings – detection of heat, air and moisture irregularities in buildings by infrared methods – Part 3: Qualification of equipment operators, data analysts and report writers) | Gebouwthermografie | Drie *rollen*: equipment operator, data analyst, report writer | Titel [I]; bestaan van deel 1:2023 [B: 6] |
| **ISO 18436-7** | Conditiebewaking machines/installaties | Category I, II, III | [B: 1, 2]; contents bevestigen 3 categorieën; omschrijving Cat I = bedienen/signaleren, II = interpreteren in context + actie aanbevelen, III = geavanceerd/toezicht komt uit secundaire bron (Australische aanbieder) |
| **EN ISO 9712** | NDT-personeel in het algemeen (methode TT = thermografisch onderzoek) | Level 1, 2, 3 | [I] |
| **ITC / FLIR / IRIS Thermovision** | Opleidings- en certificatielabel per aanbieder (Level 1, 2, 3) | Level 1, 2, 3 | [I]; Franks cert. 2022NL45N017 hoort bij Level 1 |

Aanbeveling [I]: vraag bij IRIS Thermovision / de certificerende instantie na op welk schema (ISO 18436-7 of ISO 6781-3/9712) Franks certificaat is gebaseerd. Dat bepaalt hoe je "Level 1" in offertes en rapporten mag noemen.

### 1.2 Wat een Level 2 doet dat Level 1 niet doet [I, richtinggevend; patroon consistent met B: 1]

| Taak | Level 1 (Frank) | Level 2 (Claude) |
|---|---|---|
| Camera bedienen, instellen (emissiviteit, gereflecteerde temp., afstand) | Ja | Beoordeelt of de instellingen en opname verantwoord zijn |
| Opnames maken volgens instructie/protocol | Ja | Stelt het protocol/meetplan op (wat, waar, wanneer, welke ΔT) |
| Meetcondities vastleggen | Registreert | Beoordeelt of de condities geldig zijn en dus of de opname bruikbaar is |
| Afwijkingen herkennen | Signaleert "opvallend" | Classificeert: koudebrug, ontbrekende/zakkende isolatie, luchtlek, vocht, verwarmingsleiding, artefact |
| Interpretatie in bouwkundige context | Nee | Ja: constructieopbouw, bouwjaar, verwachte Rc, warmtestroom |
| Conclusies en advies | Nee | Ja, met onzekerheidsmarge en aanbeveling voor vervolgonderzoek |
| Rapport tekenen / verantwoordelijkheid | Nee | Ja (analist/rapporteur) |
| Opdrachtgever/derde voorlichten, afwijzen van onbruikbare opnames | Nee | Ja |

### 1.3 Competenties die Claude moet beheersen (checklist)

1. Warmteoverdracht: geleiding, convectie, straling, stationair vs. dynamisch; thermische traagheid; naverwarming door zon.
2. IR-fysica: emissiviteit per materiaal (baksteen, pleisterwerk, glas, metaal, dakbedekking), gereflecteerde schijnbare temperatuur, atmosferische demping, afstand/hoek (hoek > ca. 60° geeft emissiviteitsverlies [I]), geometrische resolutie (IFOV), minimale detecteerbare afwijking.
3. Camera-parameters: bereik, NETD, resolutie, span/level, kleurenpalet, isotherm; de valkuil van autoschaal.
4. Meetcondities beoordelen en weigeren: ΔT, wind, zon, regen/vocht, voorgeschiedenis weer (24-48 u) – zie hoofdstuk 2.
5. Bouwkundige kennis: wandopbouw per bouwperiode (hoofdstuk 3), spouwmuur, houtskeletbouw, steenachtig, platte daken, kozijnaansluitingen, koudebruggen (geometrisch/constructief/convectief).
6. Vochtdetectie en de beperkingen ervan (verdampingskoeling, oppervlakte vs. diepte).
7. Foutmodellen: reflecties, schaduw, emissiviteit-contrasten, verwarmingsleidingen, vloerverwarming, technische installaties, naverwarming.
8. Kwantificering: wat wel (relatieve temperatuurverschillen, ΔT-ranges) en niet (U-/Rc-waarden zonder warmtestroommeting) uit een IR-beeld volgt.
9. Rapportage volgens ISO 6781-1/-3: transparant, reproduceerbaar, met beperkingen en disclaimers (hoofdstuk 6).
10. Regelgeving en juridische context (hoofdstuk 3 t/m 6).
11. Ethiek: nooit stellen wat niet uit de opname volgt; onzekerheid benoemen; doorverwijzen naar vervolgmeting (blowerdoor, warmtestroommeter, endoscoop, vochtmeter).

---

## 2. Normen voor bouwthermografie

> Eerlijkheid: tekst van de normen was niet beschikbaar. De "eisen" hieronder zijn [I] tenzij anders aangegeven. Controleer bij aanschaf van NEN-EN-ISO 6781-1:2023 in de NEN-webshop (of via NEN Connect).

| Norm | Doel | Status | Label |
|---|---|---|---|
| **EN 13187:1998** | Kwalitatieve detectie van thermische onregelmatigheden in gebouwschil, IR-methode | Ingetrokken; vervangen door EN ISO 6781-1:2023 | [B: 6] |
| **NEN-EN-ISO 6781-1:2023** | Algemene procedures voor IR-thermografie in woon-, utiliteits- en institutionele gebouwen: detectie van warmte-, lucht- en vochtonregelmatigheden | Geldend, opvolger van EN 13187 | [B: 6] |
| **ISO 6781-3** | Kwalificatie van operators, analisten en rapportschrijvers | Geldend (editie 2015 per opdrachtomschrijving) | [I] |
| **EN 16714-1 (-2, -3)** | Thermografisch onderzoek in NDT: algemene principes, apparatuur, termen. Gericht op materialen/componenten (scheuren, delaminatie), niet op gebouwen. Stelt zelf geen acceptatiecriteria | Geldend | [B: 8] |
| **ASTM C1060** | Standaardpraktijk IR-onderzoek van isolatie in houtskeletbouw-gebouwschillen | US-norm, ter vergelijking | [I] |
| **ASTM C1153** | Detectie van natte isolatie in platte daken met IR | US-norm | [I] |
| **ISO 9869-1** | In-situ meting van thermische weerstand/U-waarde met warmtestroommeter | Geldend; gebruikt om met IR gevonden afwijkingen te kwantificeren | [I] |
| **NEN 2778** | Vochtwering in gebouwen (waterdichtheid, wateropname, temperatuurfactor van de binnenoppervlakte) | Verwijzing in Bbl | [B: 15, 16] |
| **ISO 18436-7** | Personeelskwalificatie machine-thermografie | Niet bruikbaar voor gebouwen | [B: 1, 2] |

### 2.1 Meetcondities (richtwaarden) [I]

Deze komen uit eigen kennis van de gangbare normstellingen; zet ze pas in een rapport na controle tegen de norm.

| Parameter | Gangbare eis/richtlijn | Opmerking |
|---|---|---|
| ΔT binnen–buiten | Minimaal ca. 10 K (EN 13187: "bij voorkeur ≥ 10 K"); ASTM C1060 spreekt van minstens ca. 10 °C (18 °F) | Bij kleiner ΔT: alleen lekken/grote afwijkingen betrouwbaar |
| Stabiliteit | ΔT liefst 12-24 u voor opname redelijk constant, geen grote temperatuurschommelingen | |
| Zon | Geen directe zoninstraling op de te onderzoeken gevel gedurende ca. 12 u (buiten) vóór de opname; daarom opnames voor zonsopgang/na zonsondergang | Bij thermografie vroeg in de ochtend is dit meestal gunstig |
| Wind | Gevel: liefst < ca. 5 m/s; bij hogere wind koelt het oppervlak ongelijk af | Drone legt zelf extra windgrens op (zie hoofdstuk 5) |
| Neerslag | Geen regen/sneeuw tijdens en kort voor opname; nat oppervlak verstoort emissiviteit en verdampingskoeling | |
| Binnen | Verwarming constant, binnenzijde niet verstoord door gordijnen/meubels tegen de wand | |

### 2.2 Verplichte/gangbare rapportonderdelen [I, voor ISO 6781-1; controleer tegen de norm]

Opdrachtgever, locatie, datum/tijd; doel en afbakening; camera + serienummer/kalibratiedatum; instellingen (emissiviteit, gereflecteerde temp., afstand); meetcondities (buiten-/binnentemp., wind, bewolking, neerslag/voorgeschiedenis); gebruikte methode (buitenopname/binnenopname, drone/handcamera); IR- en daglichtbeelden per afwijking met locatie; interpretatie; beperkingen; naam en kwalificatie van operator en analist; disclaimer; handtekening.

---

## 3. Nederlandse bouwregels voor interpretatie

### 3.1 Rc-eisen (Bbl)

| Onderdeel | Nieuwbouw (Rc, m²K/W) | Bestaande bouw / verbouw (Rc) | Label |
|---|---|---|---|
| Gevel | 4,7 | 1,3 (bron Stimular noemt 1,4) | nieuwbouw [B: 13]; bestaand [B: 14, 13] |
| Vloer | 3,7 | 2,5 (Stimular: 2,6) | idem |
| Dak | 6,3 | 2,0 (Stimular: 2,1) | idem |

- Bij **ingrijpende renovatie** gelden de nieuwbouwwaarden voor het gerenoveerde deel (Bbl art. 5.20 lid 4) [B: 17].
- Exacte getallen van commerciële sites tegen Bbl art. 4.152 / 5.20 controleren; Stimular-afwijking (1,4/2,6/2,1) is niet opgelost [onzeker].
- ISDE-subsidie vereist Rc ≥ 3,5 voor gevel/vloer [B: 13 – commerciële bron, niet geverifieerd bij RVO].

### 3.2 Temperatuurfactor fRsi

- **fRsi ≥ 0,65** voor uitwendige scheidingsconstructies, bepaald volgens NEN 2778 [B: 15]. TNO/SBR bevelen 0,73 aan [B: 15 – secundair].
- Voor **bestaande bouw 0,5**: *niet* bevestigd. Eén bron wijst op 0,65 ook in een verbouwcontext. Onderzoek vóór gebruik Bbl art. 3.64 en toelichting [onzeker].
- Gebruik in rapport: fRsi = (θsi − θe)/(θi − θe) uit IR-oppervlaktetemperatuur is een *indicatie*; schimmelrisico begint rond fRsi < ca. 0,7-0,75 bij normaal woonklimaat [I]. Altijd aangeven dat IR-oppervlaktetemperatuur geen NEN-2778-meting is.

### 3.3 Luchtdoorlatendheid, NTA 8800, energielabel

- Bbl-eis nieuwbouw: luchtvolumestroom per gebouw begrensd (qv;10 ≤ 0,2 m³/s [I] i.p.v. oude norm 0,2 m³/s per woning [I]) – exacte formulering controleren.
- NTA 8800 is de rekenmethode voor energieprestatie (BENG, energielabel) [I]; relevant voor adviezen en subsidie.
- Thermografie levert geen energielabel; wel onderbouwing van afwijkingen in de schil.

### 3.4 Verwachte Rc per bouwperiode (grove kentallen)

| Periode | Typische wandopbouw | Rc-gevel indicatie | Label |
|---|---|---|---|
| Voor ca. 1920-1930 | Massief gemetseld | ca. 0,3–0,5 | [I] |
| ca. 1920–1975 | Spouwmuur zonder isolatie | **ca. 0,4** (Consumentenbond) | [B: 18] |
| 1975–1992 | Spouwmuur, vaak deels isolatie | ca. 1,0–1,3 | [I]; bij "vanaf 1975 vaak al spouwisolatie" [B: 18] |
| Vanaf 1992 | Geïsoleerde spouw, schil Rc 2,5 | 2,5 | [B: 19] (Texel-brochure: Bouwbesluit 1992 → Rc 2,5; daken 1990-2011 ca. 2,5) |
| 2012–2015 | | 3,5-4,5 | [I] |
| Vanaf 2021 | | ≥ 4,7 | [B: 13] |

Houd er rekening mee: veel oudere woningen zijn al (gedeeltelijk) na-geïsoleerd; spouwmuren 1920–1976 komen vaak voor maar zijn vaak onvoldoende geïsoleerd [B: 18]. Een IR-beeld van een niet-gevulde spouw laat dus ook zichtbaar koudere wandvlakken zien (ongeïsoleerd), terwijl de bouwjaarkentallen aangeven wat je verwachten kan.

---

## 4. Na-isolatie in de praktijk

### 4.1 Kader

- Beoordelingsrichtlijn voor na-isolatie van bestaande spouwmuren is **BRL 2110** ("thermisch isoleren van bestaande …", KOMO-attest + KOMO-procescertificaat) [B: 9, 10, 11, 12]. **"BRL 2101" is in geen enkele gevonden bron bevestigd** – gebruik BRL 2110 [onzeker].
- Uitvoerders: erkende na-isolatiespecialisten met KOMO-procescertificaat [B: 9]; vooraf endoscoopcontrole van de spouw [B: 9, 12]; boorgaten worden na het vullen met metselspecie gedicht [B: 12].
- Attesten worden minimaal elke 5 jaar herbeoordeeld; geldigheid controleren op skgikob.nl [B: 9, 10].
- Scheuren in het buitenspouwblad moeten eerst worden onderzocht en hersteld [B: 9].

### 4.2 Materialen

| Materiaal | Opmerking | Bron |
|---|---|---|
| EPS-parels (bijv. Neopixels HR++) | Eisen aan parelvorm, diameter, volumieke massa, wateropname; attest controleert *niet* productie of verwerking | [B: 10] |
| Glaswol / mineraalwol (Insulsafe Plus) | Verwerking volgens BRL-2110-28.102; eisen aan vulapparatuur, vulopeningspatroon | [B: 11] |
| Steenwol-inblaaswol (Rockfit Fulfill) | Endoscoop vooraf; boorgaten dicht met metselspecie | [B: 12] |
| PUR-schuim (in situ) | Celstructuur, schijnbare volumieke massa, wateropname | [B: 9] |

### 4.3 Thermografie bij oplevering van spouwvulling

- **Niet bevestigd** dat thermografie onderdeel is van BRL 2110 of attesten; de bronnen noemen endoscoop en vulpatroon, geen IR [B: 9-12]. Behandel IR-controle als aanvullend.
- Praktijk [I]: IR-opname van de gevel (buiten, of binnen aan koude dagen) toont niet-gevulde plekken (koude vlekken, boven ramen/onder kozijnen, bij vulgaten, achter leidingen), zakken van wol, koudebruggen door vulopeningen. Voor een geldige vergelijking is ΔT ≥ 10 K en geen zon nodig; bij ongeïsoleerde referentiegevel is het contrast groot.
- Wat isolatiebedrijven verwachten [I]: snelle, duidelijke foto's met lokalisatie (gevel + gevelvak), conclusie "gevuld / niet gevuld / twijfel", advies voor nulsmeting of bijvullen, aangevuld met daglichtfoto's en meetcondities. Een rapport dat strijdig is met hun KOMO-kader moet men op procesniveau (endoscoop) kunnen onderbouwen.
- Aansprakelijkheid: formuleer als "waarneming consistent met…", niet als "isolatie ontbreekt" zonder bevestiging door endoscopie of boorgat.

---

## 5. Drone-regelgeving Nederland voor thermografie

### 5.1 Open categorie en klassen [B: 5, tenzij anders]

| Subcategorie | Drone | Afstand tot onbetrokkenen |
|---|---|---|
| A1 | C0/C1 (< 900 g) | Mag over mensen niet in groepen vliegen; niet over samenkomsten [I] |
| **A2** | **C2** (tot 4 kg) | **≥ 30 m horizontaal; ≥ 5 m in low-speed mode (3 m/s)**; 1:1-regel altijd; nooit boven samenkomsten [B: 5] |
| A3 | C3/C4 | ≥ 150 m van woon-, handels-, industrie- en recreatiegebieden [I] |

- Voor A2 is naast het A1/A3-bewijs het **A2-certificaat (aanvullend)** nodig [B: 5]. Exploitantregistratie en verzekering: uit deze zoekopdracht niet NL-specifiek bevestigd. Exploitantnummer (ILT) is verplicht voor drones met camera in de open categorie [I]; WA-verzekering is in NL voor luchtvaartuigen verplicht via Verordening 785/2004 en Wet luchtvaart [I]. **Beide controleren bij ILT.**
- Hoogte max. 120 m, zichtlijn (VLOS), geen vlucht over samenkomsten [I].
- Nachtvlucht: open categorie staat dit toe met groen knipperend licht (geo-awareness/"night flight" vereist) [I]; schemer is meestal "dag" volgens zonsopkomst/ondergang-tabel. Controleer bij ILT en voor DJI-toestellen.
- **Direct Remote ID:** C-klasse drones moeten dit uitzenden [I].

### 5.2 DJI Mavic 3 Thermal

- Bevestigd: C2-label beschikbaar voor Mavic 3 Enterprise/Thermal/Multispectral; aanvraag via DJI-app/DJI-support, gestuurd sticker [B: 3, 4]. Variant-verwarring: er bestaat een EU-C1 versie van de Thermal Advanced (899 g, C1) en een universal versie zonder C-klasse [B: 4 – heliguy]. **Controleer het serienummer/de sticker op Franks toestel** [onzeker].
- UK erkent EASA-klassen niet automatisch – niet relevant voor NL [B: 4].

### 5.3 Voorbeeld: woonblok in Den Bosch-Zuid

| Onderwerp | Bevinding | Label |
|---|---|---|
| CTR's in de regio | Militaire CTR's: De Kooy, De Peel, Deelen, Eindhoven, Gilze-Rijen, Leeuwarden, Volkel, Woensdrecht | [B: 7] |
| Ligt het adres in een CTR? | Niet bevestigd. Eigen kennis: Den Bosch ligt tussen Eindhoven/Volkel/Gilze-Rijen op > ca. 20 km van elke luchthaven, dus waarschijnlijk buiten CTR | [I] |
| Gevarenzone counter-UAS | Rond Gilze-Rijen is een gevarenzone met straal 2 NM ingesteld per 28-11-2025; Den Bosch ligt ver daarbuiten | [B: 20] |
| Aanvraagprocedure CTR | Vanaf 1 september 2026 nieuwe procedure voor drones in CTR's; aanvragen via GoDrone; Defensie/FDNO | [B: 7 – snippet; LVNL-pagina gaf 403, tekst niet gelezen] |
| Overig | Mogelijk beperkingen door ziekenhuishelipad (Jeroen Bosch Ziekenhuis), gevangenis (PI Vught) of NOTAMs; alleen dronekaart bevestigt | [I] |

**Praktisch:** woonblok in bewoonde straat betekent dat A2 met 30 m afstand tot onbetrokken omwonenden vaak niet haalbaar is. Mogelijkheden [I]: (a) bewoners/eigenaar schriftelijk informeren en briefen zodat ze "betrokken" zijn; (b) low-speed A2 (5 m); (c) vroeg in de ochtend als straat leeg is; (d) specifieke categorie/STS (STS-01 vereist C5-label, dus niet de M3T) of operationele autorisatie; (e) alternatief handcamera vanaf de grond. Wijs er in het rapport op dat privacy (AVG) en toestemming eigenaar/VvE gelden.

### 5.4 Vluchtvoorbereiding (checklist) [I, standaard goed gebruik]

1. Doel en perceel; toestemming eigenaar/VvE; omwonenden informeren.
2. Dronekaart/GoDrone: CTR, NOTAM, tijdelijke beperkingen, natuurgebied, helikopterroutes.
3. Weer: wind < toestelgrens (en < 5 m/s voor thermografie), geen neerslag/mist, temperatuur batterij, ΔT (hoofdstuk 2).
4. Toestel: label, firmware, batterijen, propellers, geo-awareness, Remote ID aan, thermische instellingen (palet, emissiviteit), geheugenkaart.
5. Piloot: bewijs (A1/A3 + A2), exploitantnummer, verzekering, geldigheid.
6. Ter plaatse: afzetting/take-off-plek, visuele waarnemer indien nodig, noodprocedure (RTH-hoogte), noodlanding.
7. Tijdslot: schemer (zonsopkomst/ondergang), groen knipperlicht indien 's nachts.
8. Logboek: tijden, accu's, afwijkingen.
9. Privacy: geen opnames van binnenruimtes/personen; opnames beperken tot opdracht.

---

## 6. Aansprakelijkheid en disclaimers

Gangbare formuleringen in NL-thermografierapporten [I, eigen kennis; geen bronnen]. Laat een jurist beoordelen voordat dit standaard wordt.

- **Aard van het onderzoek:** "Dit onderzoek is een kwalitatieve thermografische inspectie volgens NEN-EN-ISO 6781-1:2023. Er is niet-destructief onderzoek verricht aan de zichtbare oppervlakken; verborgen gebreken kunnen niet worden uitgesloten."
- **Beperking van de methode:** "Thermografie toont oppervlaktetemperaturen. Afwijkingen zijn indicaties; de oorzaak is niet vastgesteld zonder aanvullend onderzoek (o.a. endoscoop, vochtmeting, warmtestroommeting, rookproef/blowerdoortest)."
- **Weersomstandigheden:** "De uitkomsten gelden voor de omstandigheden op het moment van de opname (zie meetomstandigheden). Andere omstandigheden kunnen andere resultaten opleveren."
- **Geen garantie:** "De bevindingen zijn naar beste weten en kunnen opgesteld; er wordt geen garantie gegeven op volledigheid of juistheid."
- **Aansprakelijkheid:** "Aansprakelijkheid is beperkt tot het factuurbedrag dan wel het bedrag dat onder de beroepsaansprakelijkheidsverzekering wordt uitgekeerd; niet aansprakelijk voor gevolgschade." (Algemene voorwaarden: bij voorkeur verwijzen naar eigen AV.)
- **Gebruik:** "Dit rapport is uitsluitend bestemd voor de opdrachtgever en voor het in de opdracht vermelde doel. Derden kunnen er geen rechten aan ontlenen."
- **Geen bouwkundig/constructief advies:** "Het rapport vervangt geen bouwkundig, constructief of juridisch advies."
- **Privacy/AVG:** beelden worden opgeslagen volgens verwerkersafspraken.
- **Frank/Claude-rolverdeling:** opnames door Level 1-thermograaf (naam, cert. 2022NL45N017), analyse/rapportage door "Level 2-analist" – let op dat zichtbaar blijft wie welke kwalificatie heeft. **Juridisch aandachtspunt:** vermeld nooit een Level 2-certificaat dat er niet is; zolang de analyse door Claude wordt gedaan en Frank tekent, hoort de rapporteur-kwalificatie van Frank vermeld te worden. Dit is een [onzeker] punt dat afstemming met de certificerende instantie vraagt.

---

## 7. Open punten (te verifiëren)

1. Op welke norm (ISO 18436-7 of ISO 6781-3/9712) is Franks Level-1-certificaat gebaseerd; mag een vervolgcursus gelden als stap richting Level 2?
2. NEN-EN-ISO 6781-1:2023 aanschaffen (NEN-webshop) voor de exacte ΔT-, wind- en zon-eisen en de verplichte rapportonderdelen.
3. ISO 6781-3: exacte titel, editie en eisen aan opleiding/ervaring.
4. fRsi 0,5 bij bestaande bouw: Bbl art. 3.64 + toelichting.
5. Exacte Rc-getallen bestaande bouw (1,3/2,5/2,0 vs. 1,4/2,6/2,1) in Bbl.
6. BRL 2101 vs. BRL 2110: alleen 2110 gevonden.
7. Exploitantregistratie, verzekering, nachtregels bij ILT/EU 2019/947.
8. Ligt  in een CTR, gevarenzone of andere beperking; LVNL-pagina 1-9-2026 volledig lezen.
9. Welke M3T-variant (C2-label of niet) Frank bezit.

---

## Bronnenlijst

1. ISO 18436-7 (thermalscanners.com.au, secundaire omschrijving): https://thermalscanners.com.au/?p=2906 en https://thermalscanners.com.au/guide-to-electrical-thermography-standards/
2. ISO 18436-7 voorbeeld (inhoud): https://cdn.standards.iteh.ai/samples/61417/1848af00998d4afdbe5f7c8a12ae4388/ISO-18436-7-2014.pdf ; AS ISO 18436-7: https://store.standards.org.au/product/as-iso-18436-7-2014
3. C2 voor Mavic 3 Enterprise/Thermal: https://drone-parts-center.com/en/blog/how-can-you-obtain-c2-europe-certification-for-your-dji-mavic-3-enterprise-thermal-and-multispectral-drone/ ; DJI forum: https://forum.dji.com/thread-282538-1-1.html
4. Heliguy over varianten Thermal Advanced: https://www.heliguy.com/blogs/knowledge-base/how-many-versions-of-the-dji-mavic-3-thermal-advanced-are-there ; verkoper Global Geosystems: https://global-geosystems.com/en/product/dji-mavic-3-thermal-advanced-eu-c2-sp/
5. A2-afstanden (Noorse tabel, Italiaanse ENAC, EU 2019/947): https://www.luftfartstilsynet.no/globalassets/dokumenter/dronedokumenter/nytt-eu-regelverk/tabell-apen-kategori-norsk.pdf ; https://www.enac.gov.it/sicurezza-aerea/droni/categoria-aperta-open-category/sottocategorie-a1-a2-a3/
6. EN ISO 6781-1:2023 vervangt EN 13187:1998: https://standards.iteh.ai/catalog/standards/cen/22492a43-9c5a-4ddc-ba20-df0226b4148d/en-13187-1998 ; https://genorma.com/en/standards/en-iso-6781-1-2023 ; https://www.boutique.afnor.org/en-gb/standard/iso-678112023/performance-of-buildings-detection-of-heat-air-and-moisture-irregularities-/xs137895/349263
7. LVNL drones en CTR's: https://en.lvnl.nl/services/drones-from-1-september-2026 en https://en.lvnl.nl/services/drone-requests-in-ctrs-from-1-september-2026 (gaf 403 bij fetch; alleen zoeksnippet gelezen)
8. EN 16714-1:2016: https://standards.iteh.ai/catalog/standards/cen/c57182bc-5ce9-40a1-8f9b-8d8ffd9c5380/en-16714-1-2016 ; https://www.evs.ee/en/evs-en-16714-1-2016
9. BRL 2110 / KOMO-kader en endoscoop (Pluimers PUR-attest): https://pluimers.nl/wp-content/uploads/2024/07/Isolatiebedrijf-Pluimers-SKGIKOB-009205.04.NL-compleet-P.L.pdf ; KOMO-BRL: https://beheer.komo.nl/brl/getfile/1788 en https://beheer.komo.nl/brl/getfile/1414
10. EPS-parels attest: https://www.pluimers.nl/wp-content/uploads/2021/07/Isolatiebedrijf-Pluimers-SKGIKOB.012903.01.NL-d.d.-06-02-2023-compleet.pdf
11. Insulsafe Plus attest: https://www.isover.nl/Download%20documenten/certificaat-labels/komo-attest-k91522.pdf
12. Rockfit Fulfill: https://www.rockwool.com/siteassets/rw-bnl/downloads-vl/downloads/technische-fiches/inblaaswol/technisch-productblad-rockfit-fulfill-vl.pdf ; KOMO-certificaat: https://editserver.rockwool.com/siteassets/rw-bnl/downloads-nl/downloads/certificaten/ctgkomo/certificaat-komo-skgikob-012684-01-nl-rockwool-rockfit-fulfill-nl.pdf ; KNB-infoblad 50: https://www.knb-keramiek.nl/media/268413/knb-infoblad-50-na-isolatie-van-de-spouwmuur-bij-nieuwbouw-2020-07-27.pdf
13. Rc nieuwbouw (commercieel, tegen Bbl controleren): https://rekenmachinepro.nl/bouw/rc-waarde-berekenen/ ; Stimular: https://stimular.nl/maatregelen/grootschalige-isolatiemaatregelen ; IPLO nieuwbouw: https://iplo.nl/regelgeving/regels-voor-activiteiten/technische-bouwactiviteit/rijksregels-bouwactiviteit/energiezuinigheid-nieuwbouw/
14. Rc bestaande bouw (Rijksoverheid, via zoekresultaat): https://iplo.nl/regelgeving/regels-voor-activiteiten/technische-bouwactiviteit/verbouw/energiezuinigheid/
15. Temperatuurfactor 0,65 / NEN 2778: https://iplo.nl/regelgeving/regels-voor-activiteiten/in-stand-houden-bestaand-bouwwerk/rijksregels/wering-vocht/ ; https://www.rivm.nl/sites/default/files/2018-11/Informatie%20over%20het%20bestrijden%20van%20schimmels%20en%20vochtproblemen.pdf
16. NEN 2778 samenvatting: https://standards.globalspec.com/std/10366937/nen-2778
17. IPLO verbouw (ingrijpende renovatie): zie 14
18. Consumentenbond spouwmuurisolatie: https://www.consumentenbond.nl/isolatie/spouwmuurisolatie ; Solvari: https://www.solvari.be/nl/documents-download/gratis-brochure-spouwmuurisolatie
19. Texel stappenplan jaren 90: https://res.cloudinary.com/duurzaambouwloket/image/upload/v1646650516/Brochure_stappenplan_jaren_90_00_gemeente_Texel.pdf ; KNB 8e bijeenkomst: https://www.knb-keramiek.nl/media/146826/uitkomsten_8e_bijeenkomst_spouwmuren_met_hoge_isolatiewaarden.pdf
20. Gevarenzone counter-UAS Gilze-Rijen: https://der78rjp0cfsg.cloudfront.net/uploads/files/tgb-gevarenzone-counter-uas-vanaf-28-november-2025/D2025-005755-Beschikking-instelling-TGB-Gevarenzones-counter-UAS-2.0-1.pdf ; Staatscourant: https://zoek.officielebekendmakingen.nl/stcrt-2025-42600.pdf
