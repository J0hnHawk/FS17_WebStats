# FS17 WebStats v1.4.0 (alpha)

### Statuswebseite für die Farming Simulator 17
Die Webseite generiert Übersichtsseiten von lokale Spielständen oder dedizierten Servern

#### Serverstatus
Anzeige der Spieler sowie Fahrzeuge auf der Karte. (nur dedizierter Server)

#### Lagerübersicht
Übersicht über alle Lagerbestände im Farmsilo, dem Palettenlager diverser Lager für Saatgut, Dünger usw.
Lagerbestände in Fahrzeugen und bei den Produktionsstätten werden mit einbezogen. Verschiedene Sortier- und Anzeigeeinstellungen möglich.  

#### Produktionsübersicht
Übersicht über alle Produktionsstätten. Fehlende Rohstoffe bzw. volle Lager werden farblich markiert. Alphabetische Sortierung oder nach Füllstand.

#### Viehzucht
Übersicht über Schafweide, Schweine- und Kuhstall (wie Ingameübersicht).

#### Fabrikdetails
Anzeige zusätzlicher Details der Produktionsanlagen. Neben Lagermengen und Kapazitäten werden auch der Verbrauch und die Produktion pro Stunde und Tag angezeigt.

#### Warendetails
Anzeige der Lagerorte/-mengen und dem Warenbedarf. Übersichtskarte mit eingezeichneteten Lager- und Produktionsstätten sowie der Paletten und Ballen.

## Instalation

Herunterladen und entpacken der Zipdatei auf einem PHP 5 fähigen Webserver. Der Webserver muss die PHP-Funktion fsockopen() unterstützen. Eine Datenbank wird nicht benötigt. Die benötigten Daten werden beim ersten Aufruf der Seite abgefragt. Beim ersten Aufruf der Seite werden die benötigten Daten abgefragt: 
- Bei dedizierten Server die IP-Adresse des Servers, der Port und Code.
- Bei lokalen Spielständen das Verzeichnis des Spielstands.

