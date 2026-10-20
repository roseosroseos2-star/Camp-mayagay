# Camp Mayagay – setup with standalone MySQL (no XAMPP)

## 1. Install
- **MySQL Server 8.x** (+ MySQL Workbench) – https://dev.mysql.com/downloads/installer/
- **PHP 8.x** CLI – https://windows.php.net/download (unzip to e.g. `C:\php`, add to PATH).
  In `C:\php\php.ini` (copy `php.ini-development`) uncomment:
  `extension=pdo_mysql`, `extension=mbstring`, `extension=openssl`, `extension=curl`, `extension=fileinfo`

## 2. Create the fresh database
Workbench: File > Open SQL Script > `database/mysql_fresh_setup.sql` > run (lightning bolt).
Or terminal: `mysql -u root -p < database/mysql_fresh_setup.sql`

This drops/creates `camp_mayagay_db`, all tables (old migrations already merged in),
seed accommodations, system settings/permissions, and the DB user `camp_user`.

Default logins: **admin / Admin@123**, **staff / Staff@123** (change after first login).

## 3. Run the site
Double-click `start-server.bat` (or `./start-server.sh`), then open
http://localhost:8000/Login.html

## Config
`php/db.php` – host 127.0.0.1, port 3306, db `camp_mayagay_db`, user `camp_user`.
Override with env vars DB_HOST, DB_PORT, DB_NAME, DB_USER, DB_PASS.
Java reports service: PHP base URL is now `http://localhost:8000`.

## Troubleshooting
- "Database connection failed": MySQL service not running, wrong port, or `pdo_mysql` not enabled.
- Old data/uploads: guests' old accounts are NOT migrated (fresh DB). Files in `assets/uploads` remain but are unlinked.
