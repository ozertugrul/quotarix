@echo off
REM ==============================================================================
REM Quotarix Web — Windows Shared Hosting Packaging Script (cPanel Deploy)
REM ==============================================================================

echo ==========================================================
echo Quotarix Web - Paketleme Basliyor...
echo ==========================================================

cd /d %~dp0\..\..

call php artisan optimize:clear

if not exist dist mkdir dist

powershell -Command "Write-Host 'Paket olusturuluyor...'; & deploy\shared-hosting\build-package.sh"

echo Paketleme tamamlandi.
pause
