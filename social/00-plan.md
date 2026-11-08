# Social-mediaplan Warmtescan.nu

Opgesteld 08-11-2026. Uitgangspunt: Warmtescan is een **bijzaak naast de vaste baan bij
Acecore**. Het plan moet dus weinig tijd kosten en mag nooit meer aanvragen opleveren dan Frank
kan wegwerken.

## Hoeveel is normaal?

Voor een kleine lokale dienstverlener:
- Facebook en Instagram: 1 à 2 berichten per week.
- LinkedIn: 2 à 4 per maand.

Vaker posten levert weinig extra op. **Regelmaat telt zwaarder dan aantal:** een pagina die
maanden stilligt, oogt alsof het bedrijf gestopt is.

**Ons ritme:**

| Periode | Facebook + Instagram | LinkedIn |
|---|---|---|
| Stookseizoen (okt–mrt) | 1 per week, plus meetweer-posts | 2 per maand |
| Rest van het jaar (apr–sep) | 2 per maand | 1 per maand |

**Tijd voor Frank:** ongeveer 30 minuten per maand.
- Claude schrijft aan het begin van de maand alle posts voor die maand in `social/JJJJ-MM-posts.md`.
- Frank kiest de foto's en plant alles in één keer in: Facebook en Instagram via Meta Business
  Suite (in één keer naar beide), LinkedIn via de bedrijfspagina (ook daar kun je inplannen).

## Vier soorten posts (afwisselen)

1. **Meetweer:** "deze week ideaal weer voor een warmtescan". Gekoppeld aan het weer, zie hieronder.
2. **Uitleg en tips:** wat zie je op een warmtebeeld, waarom meten we vroeg, de brievenbus,
   kieren bij kozijnen, de spouw.
3. **Uit de praktijk:** een geanonimiseerd warmtebeeld met korte uitleg. Alleen met toestemming
   van de klant. Nooit een huisnummer, straatnaambord, kenteken of gezicht.
4. **Zakelijk (vooral LinkedIn):** nulmeting en nameting bij na-isolatie, VvE's en
   corporaties, dakinspectie met de drone, zonnepanelen.

## Inspelen op het weer

**Ja, en dat werkt goed:** mensen denken pas aan isolatie als het koud is.

- `python3 tools/meetweer.py` laat per ochtend zien of het meetweer is: max 9 °C (dan is het
  verschil met binnen minstens 10 graden), droog en weinig wind. Bekijk dat elke zondag of
  maandag, of vraag het aan Claude.
- **Komt er een koude, droge periode aan?** Plaats dan meteen de klaarstaande meetweer-post. Er
  liggen altijd een of twee kant-en-klare varianten in het maandbestand.
- **Is het zacht en nat?** Dan een uitlegpost. Geen meetweer beloven als het niet klopt.
- **Eerste vorst of eerste sneeuw** is het beste moment van het jaar voor een post: dan ziet
  iedereen het dak waar de sneeuw het snelst smelt.

## Jaarkalender

| Maand | Thema |
|---|---|
| sep | "Plan je warmtescan voor deze winter", agenda's raken vol |
| okt | Start stookseizoen; isolatie laten doen? Eerst een nulmeting |
| nov | Eerste koude ochtenden: meetweer; tocht en brievenbus |
| dec | Feestdagen en kou; kerstvakantie is een goed moment voor een binnenscan |
| jan | Koudste maand; energierekening; resultaat na-isolatie meten |
| feb | Laatste kans van het seizoen |
| mrt | Einde seizoen: "verbouwplannen voor de zomer? Meet nu nog het startpunt" |
| apr–jun | Drone: zonnepanelen inspecteren; **reekalfjes opsporen voor het maaien** (mei–juni, sterke post) |
| jul–aug | Rustig: 1 à 2 posts, bijvoorbeeld een terugblik of drone-beelden |

## Nooit doen

- Klantadressen of herkenbare woningen zonder toestemming.
- Beloven wat niet kan in de beschikbare tijd: liever "planning in overleg" dan "morgen al".
- Stockfoto's of beelden van andere bedrijven als eigen werk tonen.
- Volgers kopen.

## Nog regelen

- [ ] Bevestigen dat [LinkedIn](https://www.linkedin.com/company/warmtescan-nu/) en
      [Facebook](https://www.facebook.com/warmtescan.nu) de juiste pagina's zijn.
- [ ] Instagram-account voor Warmtescan: bestaat dat al? Zo ja, welke naam? Zo nee, aanmaken en
      koppelen aan de Facebook-pagina (nodig voor Meta Business Suite).
- [ ] Link in de Instagram-bio naar warmtescan.nu/quickscanaanvraag.
