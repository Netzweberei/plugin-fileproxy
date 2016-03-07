# Herbie Fileproxy Plugin

`Fileproxy` ist ein [Herbie](http://github.com/getherbie/herbie) Plugin, das die Veröffentlichung von (Bild-)Dateien 
direkt aus dem Seitenbaum heraus ermöglicht.

## Installation

Das Plugin installierst du, in dem Du es in den Plugin-Ordner kopierst.

Danach aktivierst Du das Plugin in der Konfigurationsdatei.

    plugins:
        enable:
            - fileproxy


## Konfiguration

Das Plugin kann (sollte) konfiguriert werden. Die Einstellungen unter `plugins/fileproxy/blueprint.yml` müssen manuell 
in die Konfigurationsdatei eingetragen werden. Füge diese unter `plugins.config.fileproxy` ein:

    plugins:
        config:
            fileproxy:
                publish: [jpg, gif, png, pdf]
