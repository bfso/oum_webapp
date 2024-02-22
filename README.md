# OUM WEBAPP setup
Um die OUM WEBAPP lokal auf deinem Rechner einzurichten, folge bitte diesen Schritten:

## Projekt klonen

Zuerst musst du das Projekt von Git klonen </br>
<https://github.com/bfso/oum_webapp.git>

## PHP-Terminal

```bash
cd oum_webapp
```

```bash
composer install
cp .env.example .env
php artisan key:generate
```

## VITE-Terminal

```bash
cd oum_webapp
```

```bash
npm install
npm run build
```

## XAMPP starten
Starte XAMPP und starte Apache und MySQL.

## Datenbank konfigurieren
Öffne die `.env-Datei` im Laravel-Projekt und ändere diese Zeilen:


```bash
DB_CONNECTION=mysql
DB_HOST=database-3.c7u0mqk069db.eu-north-1.rds.amazonaws.com
DB_PORT=3306
DB_DATABASE=database_main
DB_USERNAME=*****
DB_PASSWORD=**********
```







## Datenbank migrieren
Führe den folgenden Befehl im Terminal (PHP) aus, um die Datenbankmigration durchzuführen:

```bash
php artisan migrate
```

## PHP-Server starten
Starte den PHP-Server mit dem folgenden Befehl:

```bash
php artisan serve
```

Öffne die Webseite mit dem Link, den `php artisan serve` bereitstellt.

## Vue-Entwicklungsserver starten
Öffne ein weiteres Terminal und führe den Befehl aus:
```bash
npm run dev
```


### Nun läuft alles und die Seite ist live und wird live aktualisiert, sobald du etwas im Code änderst.