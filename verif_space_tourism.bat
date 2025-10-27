@echo off
setlocal
cd /d C:\laragon\www\space-tourism-partie03

(echo ===== ENV and VERSIONS =====)>VERIFICATION.txt
php -v >> VERIFICATION.txt 2>&1
composer -V >> VERIFICATION.txt 2>&1
node -v >> VERIFICATION.txt 2>&1
npm -v >> VERIFICATION.txt 2>&1

if not exist .env copy .env.example .env >nul
php artisan key:generate >> VERIFICATION.txt 2>&1

echo. >> VERIFICATION.txt
echo ===== ARTISAN ABOUT ===== >> VERIFICATION.txt
php artisan about >> VERIFICATION.txt 2>&1

echo. >> VERIFICATION.txt
echo ===== ROUTES ===== >> VERIFICATION.txt
php artisan route:list --compact >> VERIFICATION.txt 2>&1

echo. >> VERIFICATION.txt
echo ===== MIGRATIONS ===== >> VERIFICATION.txt
php artisan migrate:status >> VERIFICATION.txt 2>&1

echo. >> VERIFICATION.txt
echo ===== TESTS ===== >> VERIFICATION.txt
php artisan test >> VERIFICATION.txt 2>&1

echo. >> VERIFICATION.txt
echo ===== BUILD FRONT ===== >> VERIFICATION.txt
npm run build >> VERIFICATION.txt 2>&1

echo. >> VERIFICATION.txt
echo ===== CONSEILS ===== >> VERIFICATION.txt
echo Ouvre http://127.0.0.1:8000 apres: php artisan serve >> VERIFICATION.txt

echo.
echo Termine. Ouvre VERIFICATION.txt puis lance "php artisan serve".
pause
