#!/usr/bin/env python3
"""Meetinstellingen uit HIKMICRO M60-beelden lezen, zonder HIKMICRO Analyzer.

De M60 bewaart in elke jpeg een JSON-blok (APP3, "SDMP") met de instellingen
waarmee het beeld is gemaakt. Getallen staan als vaste komma: d3 = /8192.
De ruwe pixelmatrix (640x480, 16 bit) zit er ook in, maar dat zijn sensorwaarden,
geen temperaturen. Voor temperaturen: CSV-export uit HIKMICRO Analyzer.

Gebruik:  python3 tools/m60_info.py <map of bestanden...>
"""
import json
import re
import struct
import sys
from pathlib import Path


def segmenten(data):
    """Geef per SDMP-index de samengevoegde inhoud terug."""
    segs = {}
    i = 2
    while i + 4 <= len(data) and data[i] == 0xFF:
        marker = data[i + 1]
        if marker == 0xDA:
            break
        lengte = struct.unpack(">H", data[i + 2:i + 4])[0]
        body = data[i + 4:i + 2 + lengte]
        if marker == 0xE3 and body[:4] == b"SDMP":
            idx = struct.unpack("<H", body[6:8])[0]
            segs[idx] = segs.get(idx, b"") + body[16:]
        i += 2 + lengte
    return segs


def d3(veld):
    return veld["d3"] / 8192


def lees(pad):
    segs = segmenten(Path(pad).read_bytes())
    if 1 not in segs:
        return None
    tekst = segs[1].decode("latin-1")
    rad = json.loads(re.search(r"\{.*\}", tekst, re.S).group(0))["Radiometric"]
    ta = rad["TA"]
    regel = ta["Rules"][0]["Rule_ExpertParameters"]
    isp = rad["IA"]["ISP"]
    lo, hi = isp["LevelSpanRange"]["Range_d3"]
    return {
        "bestand": Path(pad).name,
        "emissiviteit": round(d3(regel["Emissivity"]), 2),
        "reflectie_C": round(d3(regel["ReflectedTemperature"]), 1),
        "afstand_m": round(d3(regel["Distance"]), 1),
        "lucht_C": round(d3(ta["EnvironmentalParameters"]["AtmosphericTemperature"]), 1),
        "RV_%": ta["EnvironmentalParameters"]["Humidity"],
        "schaal": isp["LevelSpanMode"],
        "span_C": f"{lo / 8192:.1f}..{hi / 8192:.1f}",
        "palet": rad["IA"]["PseudoColor"]["PseudoColorType"],
    }


def main(args):
    paden = []
    for a in args:
        p = Path(a)
        paden += sorted(q for q in p.iterdir() if q.suffix.lower() in (".jpg", ".jpeg")) if p.is_dir() else [p]
    rijen = [r for r in map(lees, paden) if r]
    if not rijen:
        print("Geen M60-beelden gevonden.")
        return
    kol = list(rijen[0])
    breed = {k: max(len(k), *(len(str(r[k])) for r in rijen)) for k in kol}
    print("  ".join(k.ljust(breed[k]) for k in kol))
    for r in rijen:
        print("  ".join(str(r[k]).ljust(breed[k]) for k in kol))

    # Controle: wisselende instellingen binnen één reeks zijn een rapportrisico
    for k in ("emissiviteit", "reflectie_C", "schaal", "span_C", "palet"):
        waarden = {r[k] for r in rijen}
        if len(waarden) > 1:
            print(f"Let op: {k} wisselt binnen deze reeks: {sorted(map(str, waarden))}")


if __name__ == "__main__":
    main(sys.argv[1:] or ["."])
