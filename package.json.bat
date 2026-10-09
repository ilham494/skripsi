@echo off
cd /d "%~dp0"

start "Laravel Server" cmd /k "php artisan serve"
start "Vite" cmd /k "npm run dev"
