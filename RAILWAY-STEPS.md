# Railway fix steps (Camp Mayagay)

## 1. Build failure ("Railpack failed to prepare the build")
- Railway service -> Settings -> Source -> Root Directory = `/camp-mayagay`
- Put `composer.json` (included) inside `camp-mayagay/` next to `index.php`
- Redeploy

## 2. Database
- In the Railway project: + New -> Database -> MySQL
- In the web service -> Variables, add references:
  MYSQLHOST=${{MySQL.MYSQLHOST}}
  MYSQLPORT=${{MySQL.MYSQLPORT}}
  MYSQLDATABASE=${{MySQL.MYSQLDATABASE}}
  MYSQLUSER=${{MySQL.MYSQLUSER}}
  MYSQLPASSWORD=${{MySQL.MYSQLPASSWORD}}
- Put `db.php` (included) in `camp-mayagay/php/`, and in each PHP file
  replace the old `new PDO(...)` block with:
  require __DIR__ . '/db.php';
- Import your SQL dump into the Railway MySQL (Railway MySQL -> Connect ->
  use the public URL with HeidiSQL / MySQL Workbench / DBeaver).

## 3. Uploads (receipts, accommodation photos)
- Web service -> Settings -> Volumes -> mount path: `/app/camp-mayagay/uploads`
  (adjust to your real uploads folder), otherwise files vanish on redeploy.

## 4. Check
- Deploy Logs -> try registering -> look for the `register.php:` line.
