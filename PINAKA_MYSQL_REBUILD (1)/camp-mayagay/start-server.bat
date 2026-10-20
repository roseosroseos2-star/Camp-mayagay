@echo off
REM Starts the PHP web server (no XAMPP/Apache needed). MySQL Server must be running.
cd /d "%~dp0"
echo Camp Mayagay running at http://localhost:8000/Login.html
php -S localhost:8000
