"""Meetweer voor thermografie: welke ochtenden de komende week geschikt zijn.

Gebruik: python3 tools/meetweer.py [plaats ...]
Zonder plaats: Oss, Nijmegen, Helmond, Den Bosch, Elsloo.

Criteria (buitenscan, vóór zonsopgang, 05-07 uur):
- buitentemperatuur max 9 °C (bij 19-20 °C binnen: minstens 10 K verschil)
- geen neerslag in die uren en de 6 uur ervoor (natte gevels meten niet)
- wind max 19 km/u (Beaufort 3)
Bewolking telt niet mee als eis, maar wordt getoond: heldere nachten koelen
gevels extra af en geven kans op rijp of dauw.
Bron: Open-Meteo (gratis, geen sleutel).
"""
import json
import sys
import urllib.request
from collections import defaultdict

PLAATSEN = {
    "Oss": (51.765, 5.518),
    "Nijmegen": (51.84, 5.86),
    "Helmond": (51.48, 5.66),
    "Den Bosch": (51.69, 5.31),
    "Elsloo": (50.95, 5.78),
    "Maastricht": (50.85, 5.69),
    "Eindhoven": (51.44, 5.48),
    "Tilburg": (51.56, 5.09),
}
MAX_TEMP, MAX_WIND = 9.0, 19.0
DAGEN_NL = ["ma", "di", "wo", "do", "vr", "za", "zo"]


def verwachting(lat, lon):
    url = (f"https://api.open-meteo.com/v1/forecast?latitude={lat}&longitude={lon}"
           "&hourly=temperature_2m%2Cprecipitation%2Cwind_speed_10m%2Ccloud_cover"
           "&forecast_days=8&timezone=Europe%2FAmsterdam")
    with urllib.request.urlopen(url, timeout=20) as r:
        return json.load(r)["hourly"]


def beoordeel(h):
    """Per datum: (geschikt, min temp, max wind, neerslag, bewolking)."""
    uren = {t: i for i, t in enumerate(h["time"])}
    uit = {}
    for t, i in uren.items():
        if t[11:13] != "05":
            continue
        venster = range(i, i + 3)            # 05, 06, 07 uur
        ervoor = range(max(0, i - 6), i)     # de nacht ervoor
        temp = max(h["temperature_2m"][j] for j in venster)
        wind = max(h["wind_speed_10m"][j] for j in venster)
        regen = sum(h["precipitation"][j] for j in list(ervoor) + list(venster))
        wolk = sum(h["cloud_cover"][j] for j in venster) / 3
        ok = temp <= MAX_TEMP and wind <= MAX_WIND and regen == 0
        uit[t[:10]] = (ok, temp, wind, regen, wolk)
    return uit


def main():
    namen = sys.argv[1:] or ["Oss", "Nijmegen", "Helmond", "Den Bosch", "Elsloo"]
    import datetime as dt
    per_dag = defaultdict(list)
    for naam in namen:
        if naam not in PLAATSEN:
            print(f"Onbekende plaats: {naam}. Kies uit: {', '.join(PLAATSEN)}")
            continue
        for datum, r in beoordeel(verwachting(*PLAATSEN[naam])).items():
            per_dag[datum].append((naam, r))
    for datum in sorted(per_dag):
        d = dt.date.fromisoformat(datum)
        regels = per_dag[datum]
        goed = [n for n, r in regels if r[0]]
        teken = "✅" if len(goed) == len(regels) else ("🟡" if goed else "❌")
        print(f"{teken} {DAGEN_NL[d.weekday()]} {d:%d-%m}")
        for naam, (ok, temp, wind, regen, wolk) in regels:
            extra = "  helder: kans op rijp/dauw" if ok and wolk < 25 and temp <= 1 else ""
            print(f"     {'ok ' if ok else 'nee'} {naam:<10} {temp:5.1f} °C  wind {wind:4.1f} km/u"
                  f"  neerslag {regen:.1f} mm  bewolking {wolk:3.0f}%{extra}")


if __name__ == "__main__":
    main()
