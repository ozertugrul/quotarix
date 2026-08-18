# Quotarix Web — cPanel Paylaşımlı Hosting Canlıya Alma Rehberi (QX-WEB-007)

Bu rehber, **quotarix.com** tanıtım sitesinin SSH erişimi gerektirmeyen standart cPanel paylaşımlı hosting ortamında canlıya alınması için adım adım hazırlanmıştır.

---

## 📦 1. Dağıtım Paketleri (`dist/`)

Paketleme betiği (`build-package.sh` veya `build-package.bat`) çalıştırıldığında `dist/` klasöründe 3 adet dosya oluşur:

| Dosya | Boyut | Açıklama | Hedef Konum |
|---|---|---|---|
| `quotarix-app.zip` | ~34 MB | Laravel Core (app, vendor, config, routes, storage) | cPanel Kök Dizini (`~/quotarix-app`) |
| `public_html.zip` | ~1.1 MB | Public Varlıklar (assets, favicon, index.php, .htaccess) | cPanel Web Dizini (`public_html/`) |
| `quotarix_web_database.sql` | ~85 KB | Veritabanı Şeması + 11 Tablo + Başlangıç Verileri | phpMyAdmin Import |

---

## 🚀 2. cPanel Kurulum Adımları

### Adım 1: PHP Sürümü ve Eklentileri Kontrol Edin
1. cPanel &rarr; **MultiPHP Manager** (veya **Select PHP Version**).
2. Domain için PHP sürümünü **PHP 8.2** veya **PHP 8.3** olarak ayarlayın.
3. PHP Eklentileri kontrolü: `mbstring`, `pdo_mysql`, `intl`, `gd`, `curl`, `zip`, `xml`, `fileinfo` eklentilerinin aktif olduğundan emin olun.

---

### Adım 2: Veritabanını Oluşturun ve İçe Aktarın
1. cPanel &rarr; **MySQL® Database Wizard** (veya **MySQL Databases**).
2. Veritabanı oluşturun: örn. `cpuser_quotarix_web`.
3. Kullanıcı oluşturun: örn. `cpuser_quotarix_usr` ve güçlü bir parola belirleyin.
4. Kullanıcıya veritabanı üzerinde **ALL PRIVILEGES (Tüm Yetkiler)** verin.
5. cPanel &rarr; **phpMyAdmin** açın.
6. Sol taraftan oluşturduğunuz veritabanını seçin ve **İçe Aktar (Import)** sekmesine tıklayın.
7. `dist/quotarix_web_database.sql` dosyasını seçip **Git (Go)** butonuna basarak aktarımı tamamlayın.

---

### Adım 3: Dosyaları Yükleyin ve Çıkartın

#### A. Çekirdek (Core) Dosyaların Yüklenmesi:
1. cPanel &rarr; **File Manager (Dosya Yöneticisi)** açın.
2. Kullanıcı kök dizininde (`/home/cpuser/`) yeni bir klasör oluşturun: `quotarix-app`.
3. `quotarix-app` klasörüne girin ve `dist/quotarix-app.zip` dosyasını **Yükle (Upload)** ile yükleyin.
4. Dosyaya sağ tıklayıp **Extract (Çıkart)** yapın.

#### B. Public Web Dosyalarının Yüklenmesi:
1. Eski one-page dosyaları varsa `public_html` içindeki eski dosyaları `public_html_eski` klasörüne taşıyarak yedekleyin.
2. `public_html` içine girin ve `dist/public_html.zip` dosyasını yükleyin.
3. Dosyayı `public_html` içine **Extract** edin.
4. **Gizli Dosyaları Göster** seçeneğinin açık olduğundan ve `.htaccess` dosyasının `public_html` içinde bulunduğundan emin olun.

---

### Adım 4: `.env` Dosyasını Oluşturun
1. `~/quotarix-app` dizininde yeni bir dosya oluşturun: `.env`
2. `deploy/shared-hosting/.env.production.example` içeriğini kopyalayıp yapıştırın.
3. Bilgileri canlı ortama göre güncelleyin:
   ```env
   APP_NAME=Quotarix
   APP_ENV=production
   APP_KEY=base64:755Z6y7412e/rL+9Hh1W08r2KqT8N31kP9rS0U4Vw5k=
   APP_DEBUG=false
   APP_URL=https://quotarix.com

   DB_CONNECTION=mysql
   DB_HOST=localhost
   DB_PORT=3306
   DB_DATABASE=cpuser_quotarix_web
   DB_USERNAME=cpuser_quotarix_usr
   DB_PASSWORD=VERİTABANI_ŞİFRENİZ

   MAIL_MAILER=smtp
   MAIL_HOST=mail.quotarix.com
   MAIL_PORT=465
   MAIL_USERNAME=no-reply@quotarix.com
   MAIL_PASSWORD=EPOSTA_ŞİFRENİZ
   MAIL_ENCRYPTION=ssl
   MAIL_FROM_ADDRESS="no-reply@quotarix.com"
   MAIL_FROM_NAME="Quotarix"
   ```

---

### Adım 5: Klasör İzinleri & Uploads Kontrolü
1. `~/quotarix-app/storage` klasör izni &rarr; **755** (veya 775)
2. `~/quotarix-app/bootstrap/cache` klasör izni &rarr; **755** (veya 775)
3. `public_html/uploads` klasör izni &rarr; **755**

---

### Adım 6: SSL/TLS ve HTTPS Sertifikası
1. cPanel &rarr; **SSL/TLS Status** bölümüne gidin.
2. `quotarix.com` ve `www.quotarix.com` için **Run AutoSSL** butonuna tıklayın.
3. `.htaccess` dosyamız HTTP isteklerini otomatik olarak HTTPS'e 301 yönlendirecektir.

---

### Adım 7: Admin Paneli Girişi ve Şifre Belirleme
* **Admin Paneli:** `https://quotarix.com/admin`
* **Varsayılan Kullanıcı:** `fatih@pekvera.com`
* **Varsayılan Şifre:** `Pekvera2026!`
* *Şifre değiştirmek isterseniz:* Lokal terminalde `php -r "echo password_hash('YeniSifreniz', PASSWORD_BCRYPT);"` çalıştırıp phpMyAdmin'de `admins` tablosundaki `password` alanına yapıştırabilirsiniz.

---

## 🔍 3. Yayın Sonrası Kontrol Listesi (Checklist)

- [ ] `https://quotarix.com` açılıyor ve yeşil kilit (SSL) görünüyor.
- [ ] `http://quotarix.com` ve `http://www.quotarix.com` &rarr; `https://quotarix.com` adresine 301 yönleniyor.
- [ ] Eski 7 yasal HTML linki (`/kvkk.html` vb.) otomatik olarak yeni temiz URL'lere 301 ile yönleniyor.
- [ ] `https://quotarix.com/sitemap.xml` hatasız XML basıyor ve Google Search Console'a eklendi.
- [ ] `https://quotarix.com/robots.txt` erişilebilir (`Disallow: /admin`).
- [ ] Demo ve iletişim formları doldurulduğunda DB'ye `leads` kaydı düşüyor.
- [ ] KVKK çerez onayında **Reddet** seçildiğinde GA4 yüklenmiyor; **Kabul Et** seçildiğinde GA4 yükleniyor.
- [ ] `https://app.quotarix.com` Giriş butonu doğru yönleniyor.
