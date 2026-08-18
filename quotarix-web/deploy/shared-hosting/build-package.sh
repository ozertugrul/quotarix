#!/usr/bin/env bash

# ==============================================================================
# Quotarix Web — Shared Hosting Packaging Script
# Generates quotarix-app.zip (Core) & public_html.zip (Public) for cPanel deploy
# ==============================================================================

set -e

PROJECT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd)"
DIST_DIR="${PROJECT_DIR}/dist"
STAGING_APP="${DIST_DIR}/staging_app"
STAGING_PUBLIC="${DIST_DIR}/staging_public"

echo "=========================================================="
echo "📦 Quotarix Web — Paketleme Başlıyor..."
echo "=========================================================="

cd "${PROJECT_DIR}"

# 1. Clear local cache so local absolute paths are not packaged
echo "🧹 1. Lokal önbellekler temizleniyor..."
php artisan optimize:clear || true

# 2. Prepare staging directories
echo "📁 2. Hazırlık klasörleri oluşturuluyor..."
rm -rf "${DIST_DIR}"
mkdir -p "${DIST_DIR}" "${STAGING_APP}" "${STAGING_PUBLIC}"

# 3. Copy Core App Files
echo "🚚 3. Çekirdek (Core) dosyalar kopyalanıyor..."
cp -R app config database resources routes vendor artisan composer.json composer.lock "${STAGING_APP}/"

# Copy bootstrap without compiled cache
mkdir -p "${STAGING_APP}/bootstrap/cache"
cp bootstrap/app.php "${STAGING_APP}/bootstrap/"
touch "${STAGING_APP}/bootstrap/cache/.gitignore"

# Copy clean storage folder structure
mkdir -p "${STAGING_APP}/storage/app/public" \
         "${STAGING_APP}/storage/framework/cache/data" \
         "${STAGING_APP}/storage/framework/sessions" \
         "${STAGING_APP}/storage/framework/views" \
         "${STAGING_APP}/storage/logs"
touch "${STAGING_APP}/storage/logs/laravel.log"

# 4. Copy Public HTML Files
echo "🌐 4. Public web dosyaları hazırlanıyor..."
if [ -d "public/assets" ]; then cp -R public/assets "${STAGING_PUBLIC}/"; fi
if [ -d "public/favicon" ]; then cp -R public/favicon "${STAGING_PUBLIC}/"; fi
if [ -f "public/robots.txt" ]; then cp public/robots.txt "${STAGING_PUBLIC}/"; fi
if [ -f "public/site.webmanifest" ]; then cp public/site.webmanifest "${STAGING_PUBLIC}/"; fi
if [ -f "public/favicon.ico" ]; then cp public/favicon.ico "${STAGING_PUBLIC}/"; fi

# Ensure uploads directory structure exists
mkdir -p "${STAGING_PUBLIC}/uploads/features" \
         "${STAGING_PUBLIC}/uploads/blog" \
         "${STAGING_PUBLIC}/uploads/testimonials" \
         "${STAGING_PUBLIC}/uploads/videos" \
         "${STAGING_PUBLIC}/uploads/pages" \
         "${STAGING_PUBLIC}/uploads/general"

# Copy hosting index.php and .htaccess
cp "${PROJECT_DIR}/deploy/shared-hosting/index.php" "${STAGING_PUBLIC}/index.php"
cp "${PROJECT_DIR}/deploy/shared-hosting/.htaccess" "${STAGING_PUBLIC}/.htaccess"

# 5. Export Database SQL
echo "🗄️  5. Veritabanı dökümü (SQL) alınıyor..."
php -r '
require "vendor/autoload.php";
$app = require_once "bootstrap/app.php";
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$db = DB::connection()->getDatabaseName();
$tables = DB::select("SHOW TABLES");
$keyName = "Tables_in_" . $db;

$sql = "-- Quotarix Web Production Database Dump\n";
$sql .= "-- Generated at: " . date("Y-m-d H:i:s") . "\n";
$sql .= "SET FOREIGN_KEY_CHECKS=0;\n\n";

foreach ($tables as $t) {
    $table = $t->$keyName;
    $create = DB::selectOne("SHOW CREATE TABLE `{$table}`");
    $sql .= "DROP TABLE IF EXISTS `{$table}`;\n";
    $sql .= $create->{"Create Table"} . ";\n\n";
    
    $rows = DB::table($table)->get();
    if ($rows->count() > 0) {
        foreach ($rows as $row) {
            $cols = array_keys((array)$row);
            $vals = array_map(function($v) {
                if (is_null($v)) return "NULL";
                return "\x27" . addslashes($v) . "\x27";
            }, (array)$row);
            $sql .= "INSERT INTO `{$table}` (`" . implode("`, `", $cols) . "`) VALUES (" . implode(", ", $vals) . ");\n";
        }
        $sql .= "\n";
    }
}
$sql .= "SET FOREIGN_KEY_CHECKS=1;\n";
file_put_contents("dist/quotarix_web_database.sql", $sql);
echo "SQL export tamamlandı: dist/quotarix_web_database.sql (" . strlen($sql) . " bytes)\n";
'

# 6. Compress ZIP Archives
echo "🗜️  6. ZIP arşivleri oluşturuluyor..."
cd "${STAGING_APP}"
zip -r -q "${DIST_DIR}/quotarix-app.zip" .

cd "${STAGING_PUBLIC}"
zip -r -q "${DIST_DIR}/public_html.zip" .

# 7. Clean up staging folders
rm -rf "${STAGING_APP}" "${STAGING_PUBLIC}"

echo "=========================================================="
echo "✅ Paketleme Başarıyla Tamamlandı!"
echo "Dosyalar 'quotarix-web/dist/' klasöründe hazır:"
echo "  1. dist/quotarix-app.zip       -> cPanel kök dizinine (~/quotarix-app)"
echo "  2. dist/public_html.zip        -> cPanel public_html klasörüne"
echo "  3. dist/quotarix_web_database.sql -> phpMyAdmin Import"
echo "=========================================================="
