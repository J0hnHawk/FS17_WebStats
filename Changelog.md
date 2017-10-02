# Changelog

## [Version 1.3.0](https://github.com/J0hnHawk/FS17_WebStats/releases/tag/v1.3.0) (02.10.2017)

**Änderungen und Erweiterungen:**
- Projekt umbenannt in FS17 Webstats
- Umstellung der Templates auf Mehrsprachigkeit
- Tierübersicht ergänzt
- Kuh- und Schweinestall werden nun in der Produktionsübersicht mit angezeigt
- BGA und Fahrsilounterstützung
- FS17 Webstats ist nun für soweit vorbereitet, dass auch andere Karten unterstützt werden
- Unterstützung für Nordfriesische Marsch 3.0, Goldcrest Valley, Sosnovka und Mod Map Tanneberg 2.0 
- Prüfung, ob fsockopen() erlaubt ist bei der Installation
- Fehlerbehandung geändert; Logdatei statt Anzeige
- Bei der Installation muss ein Passwort festgelegt werden. Mit diesem kann man später die Einstellungen zurücksetzen
- Im Optionsdialog kann zwischen 3 und 4 Spalten in der Lagerübersicht gewechselt werden.
- Mehrsprachigkeit nun auch für Produktionsstätten, Lager und Waren
- Fahrzeuge können über extra Datei benannt werden
- Kartenkonfiguration zusammengefasst
- Unterstützung für unendliche Lagerkapazität (z.B. bei Kuh- und Schweinestall)

**Berichtigte Fehler:**
- Die Einstellung "nur Paletten" funktioniert jetzt in der Lagerübersicht korrekt 
- Pelletspaletten werden nun im Lager bei der Pelltesfabrik angezeigt (#8)
- Kombirohstoffe wurden nicht immer hinzugefügt
- Negative Lagerstände des Fabrikskrips werden ausgefiltert

## [Version 1.2.2](https://github.com/J0hnHawk/FS17_NF_Marsch_WebStats/releases/tag/v1.2.2) (10.09.2017)

**Berichtigte Fehler:**
- Nachfrage nach Zucker bei den Brennereien ergänzt
- Meldung bei nicht vorhandenen Waren (neue Spielstände) beseitigt (#7)

## [Version 1.2.1](https://github.com/J0hnHawk/FS17_NF_Marsch_WebStats/releases/tag/v1.2.1) (07.09.2017)

**Berichtigte Fehler:**
- Produktionsrate der Gewächshäuser berichtigt

## [Version 1.2.0](https://github.com/J0hnHawk/FS17_NF_Marsch_WebStats/releases/tag/v1.2.0) (07.09.2017)

**Änderungen und Erweiterungen:**
- Neue Fabrikübersicht mit Anzeige täglichen Produktionskapazität
- Umbenennung und Ergänzung von Menüpunkten
- Lagerübersicht nun in 4 Spalten wegen der Vielzahl an neuen Waren
- Befüllbare Tankstellen werden nun auf der Karte angezeigt
- Geldkassetten werden nicht mehr angezeigt

**Berichtigte Fehler:**
- Diverse Positionen von Lagern und Produktionsanlagen auf der Karte berichtigt
- Übersetzungen berichtigt oder ergänzt

## [Version 1.1.0](https://github.com/J0hnHawk/FS17_NF_Marsch_WebStats/releases/tag/v1.1.0) (05.09.2017)

**Änderungen und Erweiterungen:**
- Konfiguration für Nordfriesische Marsch Version 2.9
- Detailansicht von Waren mit Karte für Paletten, Ballen und Produktionsstätten
- Positionen der Produktionsanlagen auf der Karte
- Schafweide in Produktionsübersicht
- Anzeige von Mist, Gülle und Milch bei den Ställen mit in der Lagerübersicht
- Laden von lokalen Spielständen
- BGA Gärreste berücksichtigt
- Automatischer Reload bei 60 Sekunden Inaktivität
- Laden des Einstellungscookie in zentrale Datei ausgelagert
- Savegameanalyse in zentrale Datei ausgelagert

**Berichtigte Fehler:**
- Mehrere Übersetzungen berichtigt oder ergänzt
- Diesel wird nicht mehr angezeigt, wenn "nur Paletten" ausgewählt wurde

## [Version 1.0.2](https://github.com/J0hnHawk/FS17_NF_Marsch_WebStats/releases/tag/v1.0.2) (11.06.2017)

**Berichtigte Fehler:**
- Fehlende Anzeige von ungültigen Ballen/Palettenpositionen (wieder) ergänzt 

## [Version 1.0.1](https://github.com/J0hnHawk/FS17_NF_Marsch_WebStats/releases/tag/v1.0.1) (08.06.2017)

**Änderungen und Erweiterungen:**
- Lizenzinformationen ergänzt 

**Berichtigte Fehler:**
- Dünerproduktion zu Düngerproduktion berichtigt


## [Version 1.0.0](https://github.com/J0hnHawk/FS17_NF_Marsch_WebStats/releases/tag/v1.0.0) (08.06.2017)

**Änderungen und Erweiterungen:**
- Erweiterung und Anpassung des Giants Web Stats SDK für die Mod Map NF Marsch
- Konfiguration für Nordfriesische Marsch Version 2.6
- Anzeige der Karte mit Fahrzeugen, Geräten usw.
- Anzeige der Spieler
- Konfigurierbare Lagerübersicht (Palettenlager, Fahrzeuge, Ballen ...)
- Kongigurierbare Produktionsübersicht (Sortiermöglichkeiten, Ein-/Ausblenden) 