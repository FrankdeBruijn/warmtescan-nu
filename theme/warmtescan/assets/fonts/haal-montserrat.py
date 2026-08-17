#!/usr/bin/env python3
"""Haalt Montserrat op bij Google en zet het lokaal neer.

Zelf hosten in plaats van naar Google linken: dan doet de bezoeker geen verzoek
aan een server van Google en is er geen cookiebanner of privacyverhaal nodig.

Alleen de latijnse subset wordt opgehaald; de cyrillische en Vietnamese varianten
heeft deze site niet nodig en die zouden alleen maar bytes kosten.
"""

import os
import re
import urllib.request

UA = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 Chrome/120 Safari/537.36"
BRON = "https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap"
HIER = os.path.dirname(os.path.abspath(__file__))

# De latijnse subset is te herkennen aan dit bereik in de unicode-range.
LATIJN = "U+0000-00FF"


def haal(url: str) -> str:
    req = urllib.request.Request(url, headers={"User-Agent": UA})
    with urllib.request.urlopen(req) as r:
        return r.read().decode()


def main() -> None:
    css = haal(BRON)
    blokken = re.findall(r"@font-face\s*\{[^}]+\}", css)
    regels = []

    for blok in blokken:
        if LATIJN not in blok:
            continue
        gewicht = re.search(r"font-weight:\s*(\d+)", blok).group(1)
        url = re.search(r"url\((https://[^)]+\.woff2)\)", blok).group(1)
        naam = f"montserrat-{gewicht}.woff2"

        req = urllib.request.Request(url, headers={"User-Agent": UA})
        with urllib.request.urlopen(req) as r:
            data = r.read()
        with open(os.path.join(HIER, naam), "wb") as f:
            f.write(data)

        regels.append(
            "@font-face {\n"
            "\tfont-family: 'Montserrat';\n"
            "\tfont-style: normal;\n"
            f"\tfont-weight: {gewicht};\n"
            "\tfont-display: swap;\n"
            f"\tsrc: url('{naam}') format('woff2');\n"
            "}\n"
        )
        print(f"{naam}: {len(data) // 1024} kB")

    with open(os.path.join(HIER, "montserrat.css"), "w") as f:
        f.write("/* Zelf gehost, opgehaald met haal-montserrat.py */\n\n")
        f.write("\n".join(regels))


if __name__ == "__main__":
    main()
