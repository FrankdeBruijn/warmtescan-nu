# Kennisbank bouwkundige thermografie

Opgezet op 06-11-2026. Dit is de vakkennis waarmee Claude bij Warmtescan.nu werkt op het niveau van een Level 2-thermograaf: opnameplan, analyse, herkennen van problemen en rapportage. Frank de Bruijn (Level 1, cert. 2022NL45N017) maakt de opnames in het veld en tekent de rapporten.

| Bestand | Inhoud |
|---|---|
| [01-normen-niveaus-regelgeving.md](01-normen-niveaus-regelgeving.md) | Level 1, 2 en 3; ISO 6781-1:2023 (vervangt EN 13187), ISO 6781-3; Bbl-eisen (Rc, fRsi 0,65); spouwvulling (BRL 2110); droneregels (A2/C2, CTR's); disclaimers |
| [02-fysica-meetmethode-apparatuur.md](02-fysica-meetmethode-apparatuur.md) | Emissiviteit en reflectie; meetcondities; temperatuurfactor en dauwpunt; resolutie en afstanden; HIKMICRO M60 en DJI Mavic 3 Thermal; platte daken met drone; parkeergaragedek |
| [03-atlas-thermische-patronen.md](03-atlas-thermische-patronen.md) | Beslisboom "wat zie ik?"; patronen per onderdeel (spouw, koudebruggen, lucht, vocht, daken, installaties); valkuilen; kopgevels vóór en na; VvE-complexen |
| [04-rapportage-en-veldprotocol.md](04-rapportage-en-veldprotocol.md) | Rapportsjablonen (particulier, projectreeks, VvE met drone); veldprotocol en shotlists; aanleveren van radiometrische data; checklist vóór verzending |

## Status en betrouwbaarheid

- Elke bewering is gelabeld: **[B]/[V]** staat in een bron, **[S]** komt alleen uit zoekresultaten, **[I]/[K]** is een inschatting of vakkennis, **[N]** is een niet-gelezen bron.
- **De normteksten zijn niet gelezen.** Ze zijn betaald. De drempels voor ΔT, wind en zon zijn richtwaarden uit fabrikant- en praktijkbronnen. Aanschaf van NEN-EN-ISO 6781-1:2023 wordt aanbevolen.
- **Nog op het eigen toestel na te gaan (M60):** het radiometrische bestandsformaat, isothermen, het emissiviteitsmenu en de beeldfrequentie.
- **Mavic 3 Thermal:** controleer bij elke huur of het toestel een C2-label heeft.
- **Radiometrische data uitlezen:**
  - **M3T R-JPEG:** `thermal_parser` (Python), of de DJI Thermal SDK (alleen x86).
  - **M60:** alleen HIKMICRO Analyzer (Windows), dat een CSV-matrix exporteert.

Klantgegevens en offertes staan hier bewust **niet**. Die staan in de privérepo `warmtescan-offertes`.
