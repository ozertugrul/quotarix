-- Quotarix Web Production Database Dump
-- Generated at: 2026-08-18 19:49:49
SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('1', 'Fatih PEK', 'fatih@pekvera.com', '$2y$12$J41sdOdu9evtLlSbvq9EA.7LgDEX74Ev6v6J8dCLPtauAh0eaarQm', 'JpdALT6A5P8VGseOn2sXd7WChusSJHApTQ8otad6Spd0PorY1vQS2mi0kmES', '2026-08-18 10:29:01', '2026-08-18 10:29:01');

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `faqs` (`id`, `question`, `answer`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('1', 'Quotarix sadece forwarder firmalar için mi?', 'Evet, Quotarix özellikle freight forwarder, lojistik ve nakliyat firmalarının satış süreçlerine özel tasarlanmıştır. FCL/LCL teklif şablonları, çoklu döviz desteği ve sektöre özel raporlama gibi özellikler genel CRM\'lerde bulunmaz.', '1', '1', '2026-08-18 10:29:01', '2026-08-18 18:23:22');
INSERT INTO `faqs` (`id`, `question`, `answer`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('2', 'Mevcut müşteri verilerimi aktarabilir miyim?', 'Evet. Excel dosyanızdaki müşteri listesini kolayca içe aktarabilirsiniz. Kurulum ekibimiz size yardımcı olur.', '2', '1', '2026-08-18 10:29:01', '2026-08-18 18:23:22');
INSERT INTO `faqs` (`id`, `question`, `answer`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('3', 'Mobil uygulama hangi telefonlarda çalışır?', 'iOS (iPhone) ve Android telefonlarda çalışır. App Store ve Google Play\'den ücretsiz indirilebilir.', '3', '1', '2026-08-18 10:29:01', '2026-08-18 18:23:22');
INSERT INTO `faqs` (`id`, `question`, `answer`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('4', 'Verilerim güvende mi?', 'Tüm verileriniz şifreli bulut sunucularda saklanır. Günlük otomatik yedekleme yapılır. KVKK uyumlu altyapı kullanıyoruz.', '4', '1', '2026-08-18 10:29:01', '2026-08-18 18:23:22');
INSERT INTO `faqs` (`id`, `question`, `answer`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('5', 'Kurulum ne kadar sürer?', '5 dakikada hesabınızı oluşturun, ekibinizi davet edin ve kullanmaya başlayın. Eğitim desteği ücretsizdir.', '5', '1', '2026-08-18 10:29:01', '2026-08-18 18:23:22');
INSERT INTO `faqs` (`id`, `question`, `answer`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('6', 'Sözleşme zorunluluğu var mı?', 'Hayır. Aylık abonelik modelimiz var, istediğiniz zaman iptal edebilirsiniz. Yıllık ödeme tercih ederseniz 2 ay ücretsiz kazanırsınız.', '6', '1', '2026-08-18 10:29:01', '2026-08-18 18:23:22');

DROP TABLE IF EXISTS `features`;
CREATE TABLE `features` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `badge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `features_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `features` (`id`, `slug`, `icon`, `title`, `summary`, `body`, `image`, `meta_title`, `meta_description`, `badge`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('1', 'hizli-teklif-yonetimi', 'bi-file-earmark-text', 'Hızlı Teklif Yönetimi', 'FCL, LCL, hava yolu ve kara yolu şablonlarıyla saniyeler içinde çoklu dövizli profesyonel teklifler hazırlayın ve otomatik takip hatırlatmaları kurun.', '<h3>Forwarder İşinize Özel Teklif Motoru</h3><p>Excel tablolarında kaybolmadan, saniyeler içinde sektöre uygun navlun, THC, demurrage kalemlerini seçerek profesyonel teklifler oluşturun. PDF olarak tek tıkla müşterinize iletin.</p><ul><li>FCL, LCL, hava yolu ve kara yolu hazır şablonları</li><li>Çoklu döviz desteği (USD, EUR, TRY, GBP)</li><li>Teklif durum takibi: Gönderildi → İnceleniyor → Onaylandı</li><li>Otomatik takip hatırlatmaları ile unutulan tekliflere son</li><li>Teklif klonlama ile saniyeler içinde revize teklif</li></ul>', NULL, 'Hızlı Teklif Yönetimi | Quotarix Forwarder CRM', 'FCL, LCL, hava yolu ve kara yolu şablonlarıyla saniyeler içinde çoklu dövizli profesyonel teklifler hazırlayın ve otomatik takip hatırlatmaları kurun.', NULL, '1', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `features` (`id`, `slug`, `icon`, `title`, `summary`, `body`, `image`, `meta_title`, `meta_description`, `badge`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('2', 'akilli-crm', 'bi-people', 'Akıllı CRM & Müşteri Hafızası', 'Müşteri görüşmeleri, rota geçmişi, notlar ve teklifler tek kartta. Satışçı ayrılsa bile müşteri ilişkisi şirketinizde kalır.', '<h3>Satışçınız Ayrılsa Bile Müşteri Şirkette Kalır</h3><p>Satış ekibinizin sahadaki tüm telefon görüşmeleri, ziyaret notları ve müşteri bazlı rota tercihleri tek bir akıllı müşteri kartında toplanır.</p><ul><li>Tüm müşteri teklif geçmişi ve teklif dönüşüm oranları</li><li>Görüşme notları, rota tercihleri ve dosya ekleri</li><li>Müşteri segmentasyonu: Aktif, VIP, Potansiyel, Pasif</li><li>Personel devrinde anında yeni temsilciye eksiksiz devir</li></ul>', NULL, 'Akıllı CRM & Müşteri Hafızası | Quotarix Forwarder CRM', 'Müşteri görüşmeleri, rota geçmişi, notlar ve teklifler tek kartta. Satışçı ayrılsa bile müşteri ilişkisi şirketinizde kalır.', NULL, '2', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `features` (`id`, `slug`, `icon`, `title`, `summary`, `body`, `image`, `meta_title`, `meta_description`, `badge`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('3', 'yonetici-dashboard', 'bi-graph-up-arrow', 'Yönetici Dashboard & Raporlama', 'Tüm ekibin tekliflerini, dönüşüm oranlarını, gelir tahminlerini ve sahadaki aktivitelerini anlık olarak cebinizden izleyin.', '<h3>Sahadan Anlık Bilgi Alın, Gelirinizi Öngörün</h3><p>Hangi satışçı bu ay kaç teklif verdi, kaçı kapandı, hangi müşterilere takip yapılmadı? Yönetici paneli tüm ekibin performansını gerçek zamanlı gösterir.</p><ul><li>Temsilci bazlı performans ve teklif dönüşüm karşılaştırması</li><li>Aylık beklenen ciro ve gelir tahminleme (pipeline)</li><li>1 haftadır takip edilmeyen teklifler için akıllı uyarı sistemi</li><li>Mobil uyumlu yönetici ekranları</li></ul>', NULL, 'Yönetici Dashboard & Raporlama | Quotarix Forwarder CRM', 'Tüm ekibin tekliflerini, dönüşüm oranlarını, gelir tahminlerini ve sahadaki aktivitelerini anlık olarak cebinizden izleyin.', NULL, '3', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `features` (`id`, `slug`, `icon`, `title`, `summary`, `body`, `image`, `meta_title`, `meta_description`, `badge`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('4', 'kartvizit-tarama', 'bi-person-vcard', 'Yapay Zeka Kartvizit Tarama (OCR)', 'Fuarlardan toplanan yüzlerce kartviziti tek tek girmeye son. Fotoğrafını çekin, yapay zeka saniyeler içinde müşteri kartına dönüştürsün.', '<h3>Fuardan 300 Kartvizit — Saniyeler İçinde Sisteme Aktarın</h3><p>Lojistik fuarlarından toplanan yüzlerce kartviziti elle Excel\'e girmek saatler alır, çoğu hiç girilmeden çekmecede kaybolur. Quotarix mobil uygulaması ile kartvizitin fotoğrafını çekin; AI isim, unvan, firma, telefon ve e-posta bilgilerini anında müşteri kartına kaydeder.</p>', NULL, 'Yapay Zeka Kartvizit Tarama (OCR) | Quotarix Forwarder CRM', 'Fuarlardan toplanan yüzlerce kartviziti tek tek girmeye son. Fotoğrafını çekin, yapay zeka saniyeler içinde müşteri kartına dönüştürsün.', NULL, '4', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `features` (`id`, `slug`, `icon`, `title`, `summary`, `body`, `image`, `meta_title`, `meta_description`, `badge`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('5', 'whatsapptan-teklif', 'bi-whatsapp', 'WhatsApp\'tan Teklif Oluşturma', 'Müşteriden gelen mesajı kopyalayıp yapıştırın, AI metinden yük ve rota bilgilerini çıkararak teklif taslağını 30 saniyede doldursun.', '<h3>WhatsApp Mesajından Anında Teklife</h3><p>Müşterinizin WhatsApp üzerinden ilettiği taşıma talebini kopyalayın; Quotarix AI çıkış limanı, varış noktası, konteyner tipi ve yük detaylarını otomatik ayrıştırarak teklif formunu doldursun.</p>', NULL, 'WhatsApp\'tan Teklif Oluşturma | Quotarix Forwarder CRM', 'Müşteriden gelen mesajı kopyalayıp yapıştırın, AI metinden yük ve rota bilgilerini çıkararak teklif taslağını 30 saniyede doldursun.', 'yakinda', '5', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `features` (`id`, `slug`, `icon`, `title`, `summary`, `body`, `image`, `meta_title`, `meta_description`, `badge`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('6', 'akilli-teklif-skoru', 'bi-robot', 'Akıllı Teklif Skoru & Kapanma Tahmini', 'Geçmiş teklif ve piyasa verilerinize dayanarak yapay zeka \"bu teklif kapanır mı\" skorlaması yapsın ve fiyat önerisi sunsun.', '<h3>Yapay Zeka Destekli Kazanma Olasılığı</h3><p>Müşterinin geçmiş onaylama alışkanlıkları, navlun seviyeleri ve rota yoğunluğuna göre her teklife bir kazanma skoru atanır; ekibiniz öncelikli fırsatlara odaklanır.</p>', NULL, 'Akıllı Teklif Skoru & Kapanma Tahmini | Quotarix Forwarder CRM', 'Geçmiş teklif ve piyasa verilerinize dayanarak yapay zeka \"bu teklif kapanır mı\" skorlaması yapsın ve fiyat önerisi sunsun.', 'yakinda', '6', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `leads`;
CREATE TABLE `leads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `source` enum('demo','contact','newsletter') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'demo',
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `leads` (`id`, `name`, `company`, `email`, `phone`, `message`, `source`, `ip`, `read_at`, `created_at`, `updated_at`) VALUES ('1', 'Muhammet Ertuğrul Özer', 'abc', 'muhammedozer32@gmail.com', '+905421823395', 'bilgi alabilir miyim bilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyimbilgi alabilir miyim', 'contact', '127.0.0.1', '2026-08-18 18:32:56', '2026-08-18 18:32:38', '2026-08-18 18:32:56');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('1', '0001_01_01_000000_create_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('2', '0001_01_01_000001_create_cache_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('3', '0001_01_01_000002_create_jobs_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('4', '2026_08_18_000001_create_quotarix_tables', '1');

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `og_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`),
  UNIQUE KEY `pages_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pages` (`id`, `key`, `slug`, `title`, `meta_title`, `meta_description`, `og_image`, `body`, `is_active`, `created_at`, `updated_at`) VALUES ('1', 'kvkk', 'kvkk', 'KVKK Aydınlatma Metni', 'KVKK Aydınlatma Metni | Quotarix', 'Pekvera Yazılım Teknoloji A.Ş. 6698 sayılı Kişisel Verilerin Korunması Kanunu uyarınca aydınlatma metni.', NULL, '<div class=\"seller-box\">
            <strong>SATICI BİLGİLERİ</strong><br>
            Ünvan: Pekvera Yazılım Teknoloji A.Ş.<br>
            Adres: İTOB Mah. 10032 Sk. No:2 İçkapı No:Z13 Menderes / İzmir — İzmir Bilimpark Teknokent<br>
            Vergi Dairesi / No: Menderes V.D. – 7280891746<br>
            Telefon: 0546 971 52 49<br>
            E-posta: info@quotarix.com<br>
            Web: quotarix.com
        </div>

<h2>KVKK AYDINLATMA METNİ</h2>
<p>6698 sayılı Kişisel Verilerin Korunması Kanunu (\"KVKK\") uyarınca, veri sorumlusu sıfatıyla Pekvera Yazılım Teknoloji A.Ş. tarafından kişisel verilerinizin işlenmesine ilişkin aşağıdaki bilgilendirme yapılmaktadır.</p>
<h3>1. İŞLENEN VERİLER</h3>
<p>Ad-soyad, e-posta, telefon, firma/fatura bilgileri, kullanım kayıtları ve hizmetin sunumu için gerekli teknik veriler (IP, cihaz bilgileri) işlenmektedir.</p>
<h3>2. İŞLEME AMAÇLARI</h3>
<p>Hizmetin sunulması, abonelik ve ödeme süreçlerinin yürütülmesi, müşteri desteği, yasal yükümlülüklerin yerine getirilmesi ve hizmet kalitesinin iyileştirilmesi.</p>
<h3>3. AKTARIM</h3>
<p>Veriler; ödeme işlemleri için ödeme kuruluşu (PayTR), barındırma ve bildirim hizmetleri için altyapı sağlayıcıları ile yalnızca hizmetin gereği ve yasal sınırlar dahilinde paylaşılır.</p>
<h3>4. HUKUKİ SEBEP</h3>
<p>Sözleşmenin kurulması/ifası, hukuki yükümlülük ve meşru menfaat (KVKK md. 5).</p>
<h3>5. HAKLARINIZ</h3>
<p>KVKK md. 11 kapsamında; verilerinize erişme, düzeltme, silinmesini isteme ve işlemeye itiraz etme haklarına sahipsiniz. Başvurularınızı info@quotarix.com adresine iletebilirsiniz.</p><div class=\"cookie-policy-box mt-4 p-4\" style=\"background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0; margin-top: 24px;\"><h3 style=\"color: #0a1628; font-size: 18px; font-weight: 700; margin-bottom: 12px;\">Çerez (Cookie) Politikası ve Kullanılan Çerezler</h3><p style=\"margin-bottom: 12px;\">Platformumuzda hizmetlerimizin güvenli, hızlı ve kullanıcı dostu sunulabilmesi amacıyla aşağıdaki çerezler kullanılmaktadır:</p><ul style=\"margin-bottom: 0; padding-left: 20px; line-height: 1.7;\"><li><strong>laravel_session:</strong> Zorunlu oturum çerezi. Kullanıcı oturumunun güvenliğini ve sürekliliğini sağlar.</li><li><strong>XSRF-TOKEN:</strong> Zorunlu güvenlik çerezi. Siteler arası istek sahteciliği (CSRF) saldırılarına karşı koruma sağlar.</li><li><strong>qx_consent:</strong> Tercih çerezi. Ziyaretçinin çerez onay/ret tercihini tarayıcıda saklar.</li><li><strong>_ga, _ga_*:</strong> İsteğe bağlı analitik çerezleri (Google Analytics 4). Yalnızca ziyaretçi açık onay verdiğinde, IP anonimleştirme aktif olarak çalıştırılır.</li></ul></div>', '1', '2026-08-18 10:29:01', '2026-08-18 10:40:47');
INSERT INTO `pages` (`id`, `key`, `slug`, `title`, `meta_title`, `meta_description`, `og_image`, `body`, `is_active`, `created_at`, `updated_at`) VALUES ('2', 'privacy', 'gizlilik-politikasi', 'Gizlilik Politikası / Privacy Policy', 'Gizlilik Politikası / Privacy Policy | Quotarix', 'Quotarix mobil ve web platformu kişisel veri işleme, cihaz izinleri ve gizlilik politikası.', NULL, '<!-- ============================ TÜRKÇE ============================ -->
<h1>Gizlilik Politikası</h1>
<p class=\"meta\">Son güncelleme: <span class=\"ph\">02.06.2026</span> &nbsp;|&nbsp; Yürürlük tarihi: <span class=\"ph\">02.06.2026</span></p>

<p>Bu Gizlilik Politikası, <strong>Quotarix</strong> mobil uygulamasının (“Uygulama”) kişisel verilerinizi nasıl topladığını, kullandığını ve koruduğunu açıklar. Veri sorumlusu <strong>Pekvera Yazılım Teknoloji A.Ş.</strong> (“Pekvera”, “biz”) — <span class=\"ph\">İtob mah. 10032 sk. no:2 d:z13 İzmir Bilimpark Teknokent  Menderes / İZMİR</span>, İzmir, Türkiye — şirketidir.</p>

<p><strong>Quotarix bir kurumsal (B2B) uygulamadır.</strong> Kullanıcı hesapları son kullanıcı tarafından oluşturulmaz; müşteri firmanın (işverenin) yöneticisi tarafından oluşturulur ve yönetilir. Bu kapsamda, çalışan tarafından girilen müşteri/satış verileri için ilgili <strong>işveren firma veri sorumlusudur</strong>; Pekvera bu veriler için veri işleyen olarak hareket eder.</p>

<h2>1. Topladığımız Veriler</h2>
<table>
  <tr><th>Veri kategorisi</th><th>Örnekler</th><th>Amaç</th></tr>
  <tr><td>Kimlik & iletişim</td><td>Ad-soyad, e-posta, telefon, profil fotoğrafı, rol/bölge</td><td>Hesap girişi, profil, iletişim</td></tr>
  <tr><td>Konum (hassas)</td><td>GPS koordinatları ve bu koordinattan elde edilen adres</td><td>Müşteri/ziyaret konumunu kaydetme</td></tr>
  <tr><td>Kamera & fotoğraflar</td><td>Kartvizit görselleri, profil fotoğrafı</td><td>Kartvizit tarama, profil görseli</td></tr>
  <tr><td>Mikrofon & ses</td><td>Sesli not kaydı (konuşmadan metne)</td><td>Notları sesle yazma</td></tr>
  <tr><td>Bildirim verisi</td><td>Cihaz push (FCM) jetonu</td><td>Anlık bildirim gönderme</td></tr>
  <tr><td>İş/CRM verisi</td><td>Müşteriler, fırsatlar, teklifler, ziyaretler</td><td>Uygulamanın temel işlevi (işverene ait veri)</td></tr>
  <tr><td>Teknik veri</td><td>Cihaz tanımlayıcıları, uygulama sürümü, oturum jetonu</td><td>Güvenlik, hata ayıklama, oturum yönetimi</td></tr>
</table>

<h2>2. Cihaz İzinleri</h2>
<ul>
  <li><strong>Kamera:</strong> kartvizit taramak ve profil fotoğrafı çekmek için.</li>
  <li><strong>Fotoğraf galerisi:</strong> kartvizit/profil görseli seçmek için.</li>
  <li><strong>Konum:</strong> yalnızca uygulama açıkken; müşteri/ziyaret konumu için.</li>
  <li><strong>Mikrofon & konuşma tanıma:</strong> sesli notları metne dönüştürmek için.</li>
  <li><strong>Bildirimler:</strong> görev/ziyaret hatırlatmaları için.</li>
</ul>
<p>İzinleri cihaz ayarlarınızdan dilediğiniz zaman geri alabilirsiniz.</p>

<h2>3. Verilerin Kullanım Amaçları</h2>
<p>Verileriniz; hizmeti sunmak, hesabınızı yönetmek, güvenliği sağlamak, yasal yükümlülükleri yerine getirmek ve hizmeti iyileştirmek için işlenir.</p>

<h2>4. Verilerin Paylaşımı ve Üçüncü Taraflar</h2>
<p>Kişisel verilerinizi satmıyoruz. Verileri yalnızca aşağıdaki hizmet sağlayıcılarla (veri işleyenlerle) ve yasal zorunluluk halinde resmi makamlarla paylaşırız:</p>
<ul>
  <li><strong>Google Firebase (Cloud Messaging):</strong> anlık bildirim altyapısı.</li>
  <li><strong>Apple Konuşma Tanıma (iOS):</strong> sesli not özelliğinde, ses verisi metne dönüştürülürken Apple tarafından işlenebilir.</li>
  <li><strong>Barındırma/sunucu sağlayıcımız:</strong> verilerin güvenli şekilde saklanması.</li>
  <li><strong>OpenAI:</strong> Kartvizit tarama ve fırsat/müşteri analizi özelliklerinde, ilgili kartvizit görselleri ve müşteri/fırsat metin verileri OpenAI\'nin yapay zekâ servisi tarafından işlenir. Bu paylaşım, özelliği ilk kez kullanımınızda alınan açık onayınız üzerine gerçekleştirilir; onay vermezseniz bu özellikler kullanılmaz.</li>
</ul>

<h2>5. Yurt Dışına Aktarım</h2>
<p>Yukarıdaki sağlayıcıların sunucuları yurt dışında bulunabilir; bu durumda veriler KVKK ve (uygulanabilirse) GDPR’nin öngördüğü güvenceler çerçevesinde aktarılır.</p>

<h2>6. Saklama Süresi</h2>
<p>Verileri, hizmetin sunulması için gerekli olduğu ve yasal saklama süreleri boyunca tutarız; süre sonunda sileriz veya anonimleştiririz.</p>

<h2>7. Güvenlik</h2>
<p>Veriler aktarımda SSL/TLS ile şifrelenir; oturum jetonu cihazda güvenli depolama alanında tutulur. Erişim, yetkili kişilerle sınırlandırılmıştır.</p>

<h2>8. Haklarınız (KVKK / GDPR)</h2>
<p>KVKK md. 11 ve (uygulanabilirse) GDPR kapsamında; verilerinize erişme, düzeltme, silme, işlemeye itiraz ve veri taşınabilirliği haklarına sahipsiniz. Hesabınız işveren firma tarafından yönetildiğinden, hesap silme dahil talepleriniz için <strong>önce işveren firmanızın yöneticisine</strong>, ya da doğrudan bize <span class=\"ph\">support@quotarix.com</span> adresinden başvurabilirsiniz.</p>

<h2>9. Çocukların Gizliliği</h2>
<p>Uygulama çocuklara yönelik değildir ve yalnızca 18 yaş ve üzeri profesyonel kullanıcılara yöneliktir. Bilerek çocuk verisi toplamayız.</p>

<h2>10. Değişiklikler</h2>
<p>Bu politikayı zaman zaman güncelleyebiliriz. Güncel sürüm her zaman bu sayfada yayımlanır.</p>

<h2>11. İletişim</h2>
<p>Pekvera Yazılım Teknoloji A.Ş. — <span class=\"ph\">İtob mah. 10032 sk. no:2 d:z13 İzmir Bilimpark Teknokent  Menderes / İZMİR</span>, İzmir, Türkiye<br>
E-posta: <span class=\"ph\">support@quotarix.com</span></p>

<hr class=\"lang-divider\">

<!-- ============================ ENGLISH ============================ -->
<h1>Privacy Policy</h1>
<p class=\"meta\">Last updated: <span class=\"ph\">02.06.2026</span> &nbsp;|&nbsp; Effective date: <span class=\"ph\">02.06.2026</span></p>

<p>This Privacy Policy explains how the <strong>Quotarix</strong> mobile application (the “App”) collects, uses and protects your personal data. The data controller is <strong>Pekvera Yazılım Teknoloji A.Ş.</strong> (“Pekvera”, “we”) — <span class=\"ph\">İtob mah. 10032 sk. no:2 d:z13 İzmir Bilimpark Teknokent  Menderes / İZMİR</span>, İzmir, Türkiye.</p>

<p><strong>Quotarix is a business (B2B) application.</strong> User accounts are not created by end users; they are created and managed by the administrator of the customer company (the employer). For customer/sales data entered by an employee, the <strong>employer company is the data controller</strong> and Pekvera acts as a data processor.</p>

<h2>1. Data We Collect</h2>
<table>
  <tr><th>Category</th><th>Examples</th><th>Purpose</th></tr>
  <tr><td>Identity & contact</td><td>Name, email, phone, profile photo, role/region</td><td>Sign-in, profile, contact</td></tr>
  <tr><td>Location (precise)</td><td>GPS coordinates and the address derived from them</td><td>Recording customer/visit location</td></tr>
  <tr><td>Camera & photos</td><td>Business card images, profile photo</td><td>Business card scanning, profile image</td></tr>
  <tr><td>Microphone & audio</td><td>Voice note recording (speech-to-text)</td><td>Dictating notes</td></tr>
  <tr><td>Notification data</td><td>Device push (FCM) token</td><td>Sending push notifications</td></tr>
  <tr><td>Business/CRM data</td><td>Customers, opportunities, quotes, visits</td><td>Core app functionality (owned by employer)</td></tr>
  <tr><td>Technical data</td><td>Device identifiers, app version, session token</td><td>Security, debugging, session management</td></tr>
</table>

<h2>2. Device Permissions</h2>
<ul>
  <li><strong>Camera:</strong> to scan business cards and take a profile photo.</li>
  <li><strong>Photo library:</strong> to select a business card / profile image.</li>
  <li><strong>Location:</strong> while the app is in use only; for customer/visit location.</li>
  <li><strong>Microphone & speech recognition:</strong> to convert voice notes to text.</li>
  <li><strong>Notifications:</strong> for task/visit reminders.</li>
</ul>
<p>You can revoke any permission at any time in your device settings.</p>

<h2>3. How We Use Data</h2>
<p>Your data is processed to provide the service, manage your account, ensure security, meet legal obligations and improve the service.</p>

<h2>4. Data Sharing and Third Parties</h2>
<p>We do not sell your personal data. We share data only with the following service providers (processors) and, where legally required, with authorities:</p>
<ul>
  <li><strong>Google Firebase (Cloud Messaging):</strong> push notification infrastructure.</li>
  <li><strong>Apple Speech Recognition (iOS):</strong> for the voice-note feature, audio may be processed by Apple to produce text.</li>
  <li><strong>Our hosting/server provider:</strong> secure storage of data.</li>
  <li><strong>OpenAI:</strong> For the business-card scanning and opportunity/customer analysis features, the relevant business-card images and customer/opportunity text data are processed by the OpenAI AI service. This sharing occurs only after your explicit consent obtained on first use of the feature; if you do not consent, these features are not used.</li>
</ul>

<h2>5. International Transfers</h2>
<p>The providers above may store data outside Türkiye; in that case data is transferred with the safeguards required by KVKK and (where applicable) GDPR.</p>

<h2>6. Retention</h2>
<p>We keep data for as long as needed to provide the service and for statutory retention periods, then delete or anonymise it.</p>

<h2>7. Security</h2>
<p>Data is encrypted in transit with SSL/TLS; the session token is held in secure device storage. Access is restricted to authorised personnel.</p>

<h2>8. Your Rights (KVKK / GDPR)</h2>
<p>Under KVKK art. 11 and (where applicable) GDPR you have rights to access, rectify, erase, object to processing and data portability. As your account is managed by the employer company, for requests including account deletion please contact <strong>your employer’s administrator first</strong>, or contact us directly at <span class=\"ph\">support@quotarix.com</span>.</p>

<h2>9. Children’s Privacy</h2>
<p>The App is not directed at children and is intended only for professional users aged 18 and over. We do not knowingly collect data from children.</p>

<h2>10. Changes</h2>
<p>We may update this policy from time to time. The current version is always published on this page.</p>

<h2>11. Contact</h2>
<p>Pekvera Yazılım Teknoloji A.Ş. — <span class=\"ph\">İtob mah. 10032 sk. no:2 d:z13 İzmir Bilimpark Teknokent  Menderes / İZMİR</span>, İzmir, Türkiye<br>
Email: <span class=\"ph\">support@quotarix.com</span></p>

<p class=\"meta\" style=\"margin-top:40px;border-top:1px solid #eee;padding-top:12px;\">Bu belge bir şablondur ve hukuki danışmanlık yerine geçmez; yayımlamadan önce bir hukukçuya gözden geçirtmeniz önerilir. / This document is a template and not legal advice; have it reviewed by a lawyer before publishing.</p><div class=\"cookie-policy-box mt-4 p-4\" style=\"background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0; margin-top: 24px;\"><h3 style=\"color: #0a1628; font-size: 18px; font-weight: 700; margin-bottom: 12px;\">Çerez (Cookie) Politikası ve Kullanılan Çerezler</h3><p style=\"margin-bottom: 12px;\">Platformumuzda hizmetlerimizin güvenli, hızlı ve kullanıcı dostu sunulabilmesi amacıyla aşağıdaki çerezler kullanılmaktadır:</p><ul style=\"margin-bottom: 0; padding-left: 20px; line-height: 1.7;\"><li><strong>laravel_session:</strong> Zorunlu oturum çerezi. Kullanıcı oturumunun güvenliğini ve sürekliliğini sağlar.</li><li><strong>XSRF-TOKEN:</strong> Zorunlu güvenlik çerezi. Siteler arası istek sahteciliği (CSRF) saldırılarına karşı koruma sağlar.</li><li><strong>qx_consent:</strong> Tercih çerezi. Ziyaretçinin çerez onay/ret tercihini tarayıcıda saklar.</li><li><strong>_ga, _ga_*:</strong> İsteğe bağlı analitik çerezleri (Google Analytics 4). Yalnızca ziyaretçi açık onay verdiğinde, IP anonimleştirme aktif olarak çalıştırılır.</li></ul></div>', '1', '2026-08-18 10:29:01', '2026-08-18 10:40:47');
INSERT INTO `pages` (`id`, `key`, `slug`, `title`, `meta_title`, `meta_description`, `og_image`, `body`, `is_active`, `created_at`, `updated_at`) VALUES ('3', 'terms', 'kullanim-kosullari', 'Kullanım Koşulları / Terms of Service', 'Kullanım Koşulları / Terms of Service | Quotarix', 'Quotarix B2B CRM ve teklif yönetim platformu kullanım koşulları ve lisans şartları.', NULL, '<!-- ============================ TÜRKÇE ============================ -->
<h1>Kullanım Şartları</h1>
<p class=\"meta\">Son güncelleme: <span class=\"ph\">02.06.2026</span></p>

<p>Bu Kullanım Şartları, <strong>Pekvera Yazılım Teknoloji A.Ş.</strong> (“Pekvera”) tarafından sunulan <strong>Quotarix</strong> mobil uygulamasının (“Hizmet”) kullanımını düzenler. Hizmeti kullanarak bu şartları kabul etmiş sayılırsınız.</p>

<h2>1. Hizmetin Niteliği</h2>
<p>Quotarix, lojistik/nakliye sektörüne yönelik bir kurumsal (B2B) müşteri ilişkileri ve teklif yönetimi uygulamasıdır. Hizmet, müşteri firmalara ve onların yetkilendirdiği satış temsilcilerine sunulur.</p>

<h2>2. Hesaplar</h2>
<p>Kullanıcı hesapları, müşteri firmanın yöneticisi tarafından oluşturulur ve yönetilir. Giriş bilgilerinizin gizliliğinden siz sorumlusunuz. Hesabınız üzerinden yapılan işlemlerden hesap sahibi sorumludur.</p>

<h2>3. Kabul Edilebilir Kullanım</h2>
<p>Hizmeti yalnızca yasalara uygun ve yetkilendirildiğiniz amaçlarla kullanırsınız. Hizmete zarar vermek, izinsiz erişim sağlamak veya üçüncü kişilerin haklarını ihlal etmek yasaktır.</p>

<h2>4. Veriler ve Gizlilik</h2>
<p>Kişisel verilerin işlenmesi, ayrı yayımlanan <a href=\"privacy-policy.html\">Gizlilik Politikası</a> kapsamında yürütülür. Uygulamaya girilen iş/CRM verilerinin sahibi ilgili müşteri firmadır.</p>

<h2>5. Fikri Mülkiyet</h2>
<p>Hizmete ilişkin tüm fikri mülkiyet hakları Pekvera’ya aittir. Size yalnızca Hizmeti kullanma yönünde sınırlı, devredilemez bir lisans verilir.</p>

<h2>6. Hizmetin Sürekliliği</h2>
<p>Hizmeti geliştirebilir, değiştirebilir veya geçici olarak askıya alabiliriz. Kesintisiz veya hatasız çalışacağına dair garanti verilmez.</p>

<h2>7. Sorumluluğun Sınırlandırılması</h2>
<p>Yürürlükteki hukukun izin verdiği azami ölçüde, Hizmetin kullanımından doğan dolaylı zararlardan Pekvera sorumlu tutulamaz.</p>

<h2>8. Değişiklikler</h2>
<p>Bu şartları güncelleyebiliriz. Güncel sürüm bu sayfada yayımlanır; Hizmeti kullanmaya devam etmeniz güncel şartları kabul ettiğiniz anlamına gelir.</p>

<h2>9. Uygulanacak Hukuk</h2>
<p>Bu şartlar Türkiye Cumhuriyeti hukukuna tabidir. Uyuşmazlıklarda <span class=\"ph\">İZMİR</span> mahkemeleri ve icra daireleri yetkilidir.</p>

<h2>10. İletişim</h2>
<p>Pekvera Yazılım Teknoloji A.Ş. — E-posta: <span class=\"ph\">support@quotarix.com</span></p>

<hr class=\"lang-divider\">

<!-- ============================ ENGLISH ============================ -->
<h1>Terms of Service</h1>
<p class=\"meta\">Last updated: <span class=\"ph\">02.06.2026</span></p>

<p>These Terms of Service govern your use of the <strong>Quotarix</strong> mobile application (the “Service”) provided by <strong>Pekvera Yazılım Teknoloji A.Ş.</strong> (“Pekvera”). By using the Service you agree to these terms.</p>

<h2>1. Nature of the Service</h2>
<p>Quotarix is a business (B2B) customer-relationship and quote-management application for the logistics/freight industry. The Service is provided to customer companies and the sales representatives they authorise.</p>

<h2>2. Accounts</h2>
<p>User accounts are created and managed by the customer company’s administrator. You are responsible for keeping your credentials confidential. The account holder is responsible for activity performed through the account.</p>

<h2>3. Acceptable Use</h2>
<p>You will use the Service only for lawful purposes for which you are authorised. Harming the Service, gaining unauthorised access, or infringing third-party rights is prohibited.</p>

<h2>4. Data and Privacy</h2>
<p>Processing of personal data is governed by our separately published <a href=\"privacy-policy.html\">Privacy Policy</a>. Business/CRM data entered into the app is owned by the relevant customer company.</p>

<h2>5. Intellectual Property</h2>
<p>All intellectual property rights in the Service belong to Pekvera. You are granted only a limited, non-transferable licence to use the Service.</p>

<h2>6. Service Availability</h2>
<p>We may improve, change or temporarily suspend the Service. We do not warrant that it will operate uninterrupted or error-free.</p>

<h2>7. Limitation of Liability</h2>
<p>To the maximum extent permitted by applicable law, Pekvera shall not be liable for indirect damages arising from use of the Service.</p>

<h2>8. Changes</h2>
<p>We may update these terms. The current version is published on this page; continued use means you accept the current terms.</p>

<h2>9. Governing Law</h2>
<p>These terms are governed by the laws of the Republic of Türkiye. The courts of <span class=\"ph\">İzmir</span> shall have jurisdiction over disputes.</p>

<h2>10. Contact</h2>
<p>Pekvera Yazılım Teknoloji A.Ş. — Email: <span class=\"ph\">support@quotarix.com</span></p>

<p class=\"meta\" style=\"margin-top:40px;border-top:1px solid #eee;padding-top:12px;\">Bu belge bir şablondur ve hukuki danışmanlık yerine geçmez. / This document is a template and not legal advice.</p>', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `pages` (`id`, `key`, `slug`, `title`, `meta_title`, `meta_description`, `og_image`, `body`, `is_active`, `created_at`, `updated_at`) VALUES ('4', 'distance_sales', 'mesafeli-satis-sozlesmesi', 'Mesafeli Satış Sözleşmesi', 'Mesafeli Satış Sözleşmesi | Quotarix', 'app.quotarix.com SaaS abonelik hizmeti mesafeli satış sözleşmesi ve hükümleri.', NULL, '<div class=\"seller-box\">
            <strong>SATICI BİLGİLERİ</strong><br>
            Ünvan: Pekvera Yazılım Teknoloji A.Ş.<br>
            Adres: İTOB Mah. 10032 Sk. No:2 İçkapı No:Z13 Menderes / İzmir — İzmir Bilimpark Teknokent<br>
            Vergi Dairesi / No: Menderes V.D. – 7280891746<br>
            Telefon: 0546 971 52 49<br>
            E-posta: info@quotarix.com<br>
            Web: quotarix.com
        </div>

<h2>MESAFELİ SATIŞ SÖZLEŞMESİ</h2>
<h3>1. TARAFLAR</h3>
<p><strong>SATICI:</strong> Yukarıda bilgileri yer alan Pekvera Yazılım Teknoloji A.Ş.<br>
<strong>ALICI:</strong> app.quotarix.com üzerinden abonelik oluşturan gerçek/tüzel kişi (\"Abone\").</p>
<h3>2. KONU</h3>
<p>İşbu sözleşme, ALICI\'nın SATICI\'ya ait <strong>Quotarix</strong> (saha satış CRM ve teklif yönetimi yazılımı) hizmetine, app.quotarix.com üzerinden abonelik yoluyla erişimine ilişkin 6502 sayılı Tüketicinin Korunması Hakkında Kanun ve Mesafeli Sözleşmeler Yönetmeliği uyarınca tarafların hak ve yükümlülüklerini düzenler.</p>
<h3>3. HİZMETİN NİTELİĞİ VE BEDELİ</h3>
<p>Quotarix bulut tabanlı (SaaS) bir yazılım hizmetidir; fiziksel ürün teslimi içermez. Hizmet, kullanıcı başına aylık abonelik bedeli üzerinden ücretlendirilir. Güncel fiyat ödeme adımında açıkça gösterilir. Ödemeler PayTR altyapısı ile güvenli şekilde tahsil edilir.</p>
<h3>4. ABONELİK VE SÜRE</h3>
<p>Abonelik, ödeme onayı ile başlar ve seçilen periyot (aylık) boyunca geçerlidir. İptal edilmediği sürece her dönem sonunda yenilenebilir. ALICI dilediği zaman iptal edebilir; iptal halinde ödenmiş mevcut dönem sonuna kadar hizmet devam eder.</p>
<h3>5. CAYMA HAKKI</h3>
<p>ALICI, sözleşmenin kurulduğu tarihten itibaren <strong>14 (on dört) gün</strong> içinde gerekçe göstermeksizin cayma hakkına sahiptir. ALICI\'nın açık onayı ile cayma süresi dolmadan hizmetin ifasına başlanması halinde, Yönetmelik md. 15 uyarınca ifası tamamlanan hizmet bakımından cayma hakkı kullanılamaz. Cayma talepleri info@quotarix.com adresine iletilir.</p>
<h3>6. YÜKÜMLÜLÜKLER</h3>
<p>SATICI, hizmetin sözleşmeye uygun ve kesintisiz sunulması için makul çabayı gösterir. ALICI, hesap bilgilerinin gizliliğinden ve hizmeti hukuka uygun kullanmaktan sorumludur.</p>
<h3>7. UYUŞMAZLIK</h3>
<p>Uyuşmazlıklarda, mevzuatta belirlenen parasal sınırlar dahilinde Tüketici Hakem Heyetleri ve Tüketici Mahkemeleri yetkilidir.</p>
<h3>8. YÜRÜRLÜK</h3>
<p>ALICI, ödeme adımında bu sözleşmeyi onayladığında sözleşme yürürlüğe girer.</p>', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `pages` (`id`, `key`, `slug`, `title`, `meta_title`, `meta_description`, `og_image`, `body`, `is_active`, `created_at`, `updated_at`) VALUES ('5', 'cancellation', 'iptal-ve-iade-politikasi', 'İptal ve İade Politikası', 'İptal ve İade Politikası | Quotarix', 'Quotarix SaaS abonelik hizmetlerinde anında ifa, cayma hakkı ve iptal koşulları.', NULL, '<div class=\"seller-box\">
            <strong>SATICI BİLGİLERİ</strong><br>
            Ünvan: Pekvera Yazılım Teknoloji A.Ş.<br>
            Adres: İTOB Mah. 10032 Sk. No:2 İçkapı No:Z13 Menderes / İzmir — İzmir Bilimpark Teknokent<br>
            Vergi Dairesi / No: Menderes V.D. – 7280891746<br>
            Telefon: 0546 971 52 49<br>
            E-posta: info@quotarix.com<br>
            Web: quotarix.com
        </div>

<h2>İPTAL VE İADE POLİTİKASI</h2>
<h3>1. CAYMA HAKKI (14 GÜN)</h3>
<p>ALICI, abonelik sözleşmesinin kurulduğu tarihten itibaren <strong>14 (on dört) gün</strong> içinde herhangi bir gerekçe göstermeksizin cayma hakkına sahiptir. Cayma bildirimi info@quotarix.com adresine yapılır. Cayma hakkının geçerli olduğu durumlarda, tahsil edilen bedel 14 gün içinde aynı ödeme yöntemiyle iade edilir.</p>
<h3>2. CAYMA HAKKININ İSTİSNASI</h3>
<p>Quotarix dijital bir hizmettir. ALICI\'nın açık onayı ile cayma süresi dolmadan hizmetin ifasına başlanması (yazılıma tam erişim sağlanması) halinde, Mesafeli Sözleşmeler Yönetmeliği md. 15 uyarınca ifa edilen hizmet bakımından cayma hakkı kullanılamaz.</p>
<h3>3. ABONELİK İPTALİ</h3>
<p>ALICI, dilediği zaman aboneliğini hesap panelinden veya info@quotarix.com üzerinden iptal edebilir. İptal halinde:</p>
<ul>
<li>Ödenmiş mevcut dönem sonuna kadar hizmet erişimi devam eder.</li>
<li>Abonelik, dönem sonunda otomatik olarak yenilenmez.</li>
<li>Mevcut dönem için, hizmet sunulduğundan kısmi/orantılı iade yapılmaz (14 günlük cayma hakkı saklıdır).</li>
</ul>
<h3>4. İADE SÜRECİ</h3>
<p>İade hakkının doğduğu durumlarda iade, ödeme yapılan karta/yönteme yapılır ve ödeme kuruluşu süreçlerine bağlı olarak makul sürede tamamlanır.</p>
<h3>5. İLETİŞİM</h3>
<p>İptal/iade talepleri: info@quotarix.com – 0546 971 52 49</p>', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `pages` (`id`, `key`, `slug`, `title`, `meta_title`, `meta_description`, `og_image`, `body`, `is_active`, `created_at`, `updated_at`) VALUES ('6', 'delivery', 'teslimat-bilgileri', 'Teslimat Bilgileri', 'Teslimat Bilgileri | Quotarix', 'Quotarix dijital yazılım hizmeti anlık çevrimiçi teslimat ve hesap aktivasyon esasları.', NULL, '<div class=\"seller-box\">
            <strong>SATICI BİLGİLERİ</strong><br>
            Ünvan: Pekvera Yazılım Teknoloji A.Ş.<br>
            Adres: İTOB Mah. 10032 Sk. No:2 İçkapı No:Z13 Menderes / İzmir — İzmir Bilimpark Teknokent<br>
            Vergi Dairesi / No: Menderes V.D. – 7280891746<br>
            Telefon: 0546 971 52 49<br>
            E-posta: info@quotarix.com<br>
            Web: quotarix.com
        </div>

<h2>TESLİMAT VE HİZMET SUNUM BİLGİLERİ</h2>
<h3>1. HİZMETİN NİTELİĞİ</h3>
<p>Quotarix, bulut tabanlı (SaaS) bir yazılım hizmetidir. Fiziksel bir ürün gönderimi/kargo teslimatı söz konusu değildir.</p>
<h3>2. ERİŞİM VE \"TESLİMAT\"</h3>
<p>Ödeme onaylandıktan sonra hizmete erişim <strong>anında</strong> sağlanır. ALICI, app.quotarix.com web paneli ve Quotarix mobil uygulaması (App Store / Google Play) üzerinden hesabına giriş yaparak hizmeti kullanmaya başlar. Hesap, abonelik oluşturulurken belirtilen yönetici e-posta adresi ile aktif edilir.</p>
<h3>3. HİZMETİN SÜREKLİLİĞİ</h3>
<p>Hizmet, abonelik süresi boyunca 7/24 erişilebilir olacak şekilde sunulur. Planlı bakım çalışmaları önceden duyurulmaya çalışılır.</p>
<h3>4. DESTEK</h3>
<p>Kurulum, erişim ve kullanım desteği için: info@quotarix.com – 0546 971 52 49</p>', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `pages` (`id`, `key`, `slug`, `title`, `meta_title`, `meta_description`, `og_image`, `body`, `is_active`, `created_at`, `updated_at`) VALUES ('7', 'pre_information', 'on-bilgilendirme', 'Ön Bilgilendirme Formu', 'Ön Bilgilendirme Formu | Quotarix', '6502 sayılı Kanun uyarınca abonelik öncesi satıcı ve hizmet temel nitelikleri ön bilgilendirme formu.', NULL, '<div class=\"seller-box\">
            <strong>SATICI BİLGİLERİ</strong><br>
            Ünvan: Pekvera Yazılım Teknoloji A.Ş.<br>
            Adres: İTOB Mah. 10032 Sk. No:2 İçkapı No:Z13 Menderes / İzmir — İzmir Bilimpark Teknokent<br>
            Vergi Dairesi / No: Menderes V.D. – 7280891746<br>
            Telefon: 0546 971 52 49<br>
            E-posta: info@quotarix.com<br>
            Web: quotarix.com
        </div>

<h2>ÖN BİLGİLENDİRME FORMU</h2>
<h3>1. HİZMETİN TEMEL NİTELİKLERİ</h3>
<p>Quotarix, saha satış ekipleri için bulut tabanlı (SaaS) bir CRM ve teklif yönetimi yazılımıdır. Hizmet, app.quotarix.com web paneli ve mobil uygulama üzerinden, abonelik karşılığında sunulur. Fiziksel ürün teslimatı yoktur.</p>
<h3>2. BEDEL VE ÖDEME</h3>
<p>Hizmet bedeli, kullanıcı başına aylık abonelik ücreti olarak hesaplanır ve ödeme adımında KDV dahil/hariç açıkça gösterilir. Ödeme, PayTR güvenli ödeme altyapısı ile kredi/banka kartı üzerinden yapılır.</p>
<h3>3. CAYMA HAKKI</h3>
<p>ALICI, sözleşme tarihinden itibaren 14 gün içinde cayma hakkına sahiptir. Hizmetin ifasına ALICI onayıyla başlanması halinde, ifa edilen kısım için cayma hakkı kullanılamaz (Yönetmelik md. 15).</p>
<h3>4. İPTAL VE İADE</h3>
<p>Abonelik iptali ve iade koşulları İptal ve İade Politikası\'nda düzenlenmiştir. Talepler info@quotarix.com adresine iletilir.</p>
<h3>5. ŞİKAYET VE İTİRAZ</h3>
<p>Talep ve şikayetler için: info@quotarix.com / 0546 971 52 49. Uyuşmazlıklarda Tüketici Hakem Heyetleri ve Tüketici Mahkemeleri yetkilidir.</p>', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `pages` (`id`, `key`, `slug`, `title`, `meta_title`, `meta_description`, `og_image`, `body`, `is_active`, `created_at`, `updated_at`) VALUES ('8', 'home', 'home', 'Ana Sayfa', 'Quotarix | Forwarder Satış Ekibiniz İçin CRM — Müşteriniz Şirkette Kalsın', 'Freight forwarder firmalar için satış yönetimi. Satışçı ayrılsa bile müşteri ilişkisi, ziyaretler ve teklifler şirketinizde kalır. Ekip performansını anlık görün.', NULL, NULL, '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `pages` (`id`, `key`, `slug`, `title`, `meta_title`, `meta_description`, `og_image`, `body`, `is_active`, `created_at`, `updated_at`) VALUES ('9', 'features_index', 'ozellikler', 'Özellikler', 'Özellikler — Quotarix Forwarder CRM', 'Hızlı teklif hazırlama, akıllı CRM, yönetici dashboard\'u ve AI kartvizit tarama özelliklerini keşfedin.', NULL, NULL, '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `pages` (`id`, `key`, `slug`, `title`, `meta_title`, `meta_description`, `og_image`, `body`, `is_active`, `created_at`, `updated_at`) VALUES ('10', 'why', 'neden-quotarix', 'Neden Quotarix?', 'Neden Quotarix? — Forwarder Diliyle Konuşan CRM', 'Genel CRM\'ler yerine lojistik ve forwarder iş süreçlerine özel tasarlanmış Quotarix farkını inceleyin.', NULL, NULL, '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `pages` (`id`, `key`, `slug`, `title`, `meta_title`, `meta_description`, `og_image`, `body`, `is_active`, `created_at`, `updated_at`) VALUES ('11', 'roadmap', 'yol-haritasi', 'Yol Haritası', 'Yol Haritası — Quotarix Gelecek Özellikler', 'WhatsApp\'tan teklif, akıllı teklif skoru ve yakında eklenecek yenilikler.', NULL, NULL, '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `pages` (`id`, `key`, `slug`, `title`, `meta_title`, `meta_description`, `og_image`, `body`, `is_active`, `created_at`, `updated_at`) VALUES ('12', 'pricing', 'fiyatlandirma', 'Fiyatlandırma', 'Fiyatlandırma — Quotarix CRM', 'Şeffaf ve esnek fiyatlandırma paketleri. Satış ekibinizin büyüklüğüne göre ölçekleyin.', NULL, NULL, '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `pages` (`id`, `key`, `slug`, `title`, `meta_title`, `meta_description`, `og_image`, `body`, `is_active`, `created_at`, `updated_at`) VALUES ('13', 'blog_index', 'blog', 'Blog & Lojistik İpuçları', 'Blog — Quotarix Forwarder CRM', 'Freight forwarder ve lojistik satış ekipleri için verimlilik, satış stratejisi ve teknoloji makaleleri.', NULL, NULL, '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `pages` (`id`, `key`, `slug`, `title`, `meta_title`, `meta_description`, `og_image`, `body`, `is_active`, `created_at`, `updated_at`) VALUES ('14', 'faq', 'sss', 'Sıkça Sorulan Sorular', 'Sıkça Sorulan Sorular — Quotarix', 'Quotarix hakkında en çok merak edilen sorular ve detaylı yanıtları.', NULL, NULL, '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `pages` (`id`, `key`, `slug`, `title`, `meta_title`, `meta_description`, `og_image`, `body`, `is_active`, `created_at`, `updated_at`) VALUES ('15', 'demo', 'demo', 'Ücretsiz Demo Talep Edin', 'Ücretsiz Demo Talep Edin — Quotarix', '15 dakikalık canlı demo ile Quotarix\'in satış süreçlerinizi nasıl hızlandıracağını keşfedin.', NULL, NULL, '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `pages` (`id`, `key`, `slug`, `title`, `meta_title`, `meta_description`, `og_image`, `body`, `is_active`, `created_at`, `updated_at`) VALUES ('16', 'contact', 'iletisim', 'İletişim', 'İletişim — Quotarix', 'Bizimle iletişime geçin, ekibimiz tüm sorularınızı yanıtlasın.', NULL, NULL, '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `plans`;
CREATE TABLE `plans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ay/kullanıcı',
  `features_list` json DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `plans` (`id`, `name`, `price`, `currency`, `period`, `features_list`, `is_featured`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('1', 'Standart Plan', '50.00', 'USD', 'ay / kullanıcı', '[\"Sınırsız teklif oluşturma & takip\", \"FCL, LCL, Hava ve Kara yolu şablonları\", \"Müşteri & firma hafızası (CRM)\", \"Yönetici dashboard & ekip performans raporları\", \"Çoklu döviz desteği (USD, EUR, TRY, GBP)\", \"PDF teklif oluşturma & e-posta gönderimi\", \"Yapay Zeka kartvizit okuyucu (OCR)\", \"Mobil uygulama (iOS & Android)\", \"E-posta ve WhatsApp desteği\"]', '1', '1', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `plans` (`id`, `name`, `price`, `currency`, `period`, `features_list`, `is_featured`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('2', 'Kurumsal Paket', NULL, 'USD', 'özel teklif', '[\"Standart plandaki tüm özellikler\", \"10+ kullanıcı için hacim indirimi\", \"Özel ERP / muhasebe API entegrasyonu\", \"Özel SLA & 7/24 öncelikli telefon desteği\", \"Gelişmiş ekip rolleri ve yetkilendirme\", \"Özel yerinde eğitim ve veri aktarım desteği\"]', '0', '2', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Fatih PEK',
  `published_at` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `posts` (`id`, `slug`, `category`, `title`, `summary`, `body`, `image`, `meta_title`, `meta_description`, `author`, `published_at`, `is_active`, `created_at`, `updated_at`) VALUES ('1', 'excelde-teklif-yonetimi-neden-artik-surdurulemez', 'Verimlilik', 'Excel\'de Teklif Yönetimi Neden Artık Sürdürülemez?', 'Freight forwarder firmalarda Excel ile teklif yönetmenin gizli maliyetleri, kaybolan müşteri verileri ve kaçan satış fırsatları hakkında kapsamlı analiz.', '<p>Freight forwarder sektöründe şirketlerin %90\'ından fazlası teklif süreçlerini hâlâ Excel tablolarında yürütüyor. Ancak bu durum görünenden çok daha büyük maliyetlere ve veri kaybına yol açıyor.</p><h3>1. Satışçı Ayrılınca Müşteri Hafızası Sıfırlanıyor</h3><p>Excel tabloları genellikle satış temsilcilerinin kişisel bilgisayarlarında veya dağınık klasörlerde tutulur. Personel ayrıldığında görüşme geçmişi, geçmiş fiyat teklifleri ve müşteri notları şirket bünyesinde kalmaz.</p><h3>2. Fırsatlar Takipsiz Kalıyor</h3><p>Verilen bir teklifin 3 gün sonra aranıp takip edilmesi gerektiğinde Excel size hatırlatma yapamaz. Müşteri rakibe yöneldiğinde bunu kimse fark etmez.</p><h3>3. Sektörel CRM Çözümü</h3><p>Quotarix gibi sektöre özel geliştirilmiş CRM platformları, tüm bu süreci tek merkezde toplar ve ekibinizin satış kapatma oranını katlar.</p>', NULL, 'Excel\'de Teklif Yönetimi Neden Artık Sürdürülemez? | Quotarix Blog', 'Freight forwarder firmalarda Excel ile teklif yönetmenin gizli maliyetleri, kaybolan müşteri verileri ve kaçan satış fırsatları hakkında kapsamlı analiz.', 'Fatih PEK', '2026-04-15 10:00:00', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `posts` (`id`, `slug`, `category`, `title`, `summary`, `body`, `image`, `meta_title`, `meta_description`, `author`, `published_at`, `is_active`, `created_at`, `updated_at`) VALUES ('2', 'forwarder-satis-ekiplerinde-teklif-donusum-orani-nasil-artirilir', 'Satış Stratejisi', 'Forwarder Satış Ekiplerinde Teklif Dönüşüm Oranı Nasıl Artırılır?', 'Sektördeki en başarılı forwarder firmalarının teklif takip süreçlerinden öğrendiğimiz 7 pratik strateji ile dönüşüm oranınızı artırın.', '<p>Forwarder satışında teklif vermek işin yalnızca başlangıcıdır. Başarı, doğru takip mekanizması ve hız ile gelir.</p><h3>1. İlk 30 Dakika Kuralı</h3><p>Gelen navlun talebine en hızlı profesyonel teklifi sunan firmaların onay alma oranı %40 daha yüksektir.</p><h3>2. Çoklu Döviz ve Net Kalemler</h3><p>Müşterinin para biriminde (USD, EUR, TRY) net ve anlaşılır kalemlerle sunulan teklifler tereddütleri ortadan kaldırır.</p><h3>3. Sistemli Takip Hatırlatıcıları</h3><p>Her teklife mutlaka 24-48 saatlik otomatik takip görevi atanmalıdır.</p>', NULL, 'Forwarder Satış Ekiplerinde Teklif Dönüşüm Oranı Nasıl Artırılır? | Quotarix Blog', 'Sektördeki en başarılı forwarder firmalarının teklif takip süreçlerinden öğrendiğimiz 7 pratik strateji ile dönüşüm oranınızı artırın.', 'Fatih PEK', '2026-04-10 10:00:00', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `posts` (`id`, `slug`, `category`, `title`, `summary`, `body`, `image`, `meta_title`, `meta_description`, `author`, `published_at`, `is_active`, `created_at`, `updated_at`) VALUES ('3', 'yapay-zeka-lojistik-sektorunde-satis-sureclerini-nasil-donusturuyor', 'Teknoloji', 'Yapay Zeka Lojistik Sektöründe Satış Süreçlerini Nasıl Dönüştürüyor?', 'AI destekli kartvizit tarama, otomatik teklif formları ve tahminleme araçlarının forwarder firmalarına sağladığı rekabet avantajları.', '<p>Yapay zeka teknolojileri artık sadece büyük teknoloji devlerinin değil, lojistik KOBİ\'lerinin de en büyük yardımcısı haline geldi.</p><h3>1. Kartvizitten Saniyeler İçinde Müşteriye</h3><p>OCR ve AI modelleri fuarlarda toplanan yüzlerce kartviziti saniyeler içinde CRM\'e kusursuz aktarabiliyor.</p><h3>2. Akıllı Fiyatlama ve Kazanma Tahmini</h3><p>Piyasa koşulları ve müşteri geçmişine göre teklifin kazanma olasılığı tahmin edilerek doğru strateji geliştirilebiliyor.</p>', NULL, 'Yapay Zeka Lojistik Sektöründe Satış Süreçlerini Nasıl Dönüştürüyor? | Quotarix Blog', 'AI destekli kartvizit tarama, otomatik teklif formları ve tahminleme araçlarının forwarder firmalarına sağladığı rekabet avantajları.', 'Fatih PEK', '2026-04-05 10:00:00', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');

DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sections_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sections` (`id`, `key`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES ('1', 'hero', '1', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `sections` (`id`, `key`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES ('2', 'problem', '1', '2', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `sections` (`id`, `key`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES ('3', 'features', '1', '3', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `sections` (`id`, `key`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES ('4', 'ocr', '1', '4', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `sections` (`id`, `key`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES ('5', 'steps', '1', '5', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `sections` (`id`, `key`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES ('6', 'manager', '1', '6', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `sections` (`id`, `key`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES ('7', 'why', '1', '7', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `sections` (`id`, `key`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES ('8', 'roadmap', '1', '8', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `sections` (`id`, `key`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES ('9', 'pricing', '0', '9', '2026-08-18 10:29:01', '2026-08-18 18:50:16');
INSERT INTO `sections` (`id`, `key`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES ('10', 'testimonials', '0', '10', '2026-08-18 10:29:01', '2026-08-18 18:50:18');
INSERT INTO `sections` (`id`, `key`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES ('11', 'video', '0', '11', '2026-08-18 10:29:01', '2026-08-18 18:50:18');
INSERT INTO `sections` (`id`, `key`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES ('12', 'blog', '1', '12', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `sections` (`id`, `key`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES ('13', 'band', '1', '13', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `sections` (`id`, `key`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES ('14', 'faq', '1', '14', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `sections` (`id`, `key`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES ('15', 'cta', '1', '15', '2026-08-18 10:29:01', '2026-08-18 10:29:01');

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('59vK7oJocpYkoqsvO88m8DD5xBlhJwdP4VBqZkET', NULL, '127.0.0.1', 'curl/8.16.0', 'eyJfdG9rZW4iOiJidWN0NlR5SDlrbXFueWJ2V3NCMlptQmNQRWdzbElmOVNnc2RTM0FNIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1787080898');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('8hCZXGIqiwaTtHct4fCbb6Dd5GgPPilk55u0vQvO', NULL, '127.0.0.1', 'curl/8.16.0', 'eyJfdG9rZW4iOiI3cG9sM0ozYXZoUENDNFVOYlhCbzUyTnZhalptU21iTGRyN2ZONHJRIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1787079088');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('B0v2hK7KUnswaiFhS6kA0UDOWgCqV9FC82g8SZQF', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko)', 'eyJfdG9rZW4iOiI2S2dad2lvRFJwRm9DWTh0bEQ4bVdUUzZETWNxRDgzM044d0VTTDI5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9xdW90YXJpeC13ZWIudGVzdFwvP2hlcmQ9cHJldmlldyIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', '1787079491');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('hKLFykgI5UjCkFEN22zr0uVoS2iIYSh3kZs1MI6g', '1', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 15; Pixel 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJTb3ZQN2FoNEtoaHByMlI3RnkzS1RKZFIwZTVwWmpua2FkVm84SWlNIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9hbnN3ZXJpbmctdmFsaWRhdGlvbi1sZWF2ZXMtbWVycnkudHJ5Y2xvdWRmbGFyZS5jb21cL2FkbWluXC9wbGFuc1wvMVwvZWRpdCIsInJvdXRlIjoiYWRtaW4ucGxhbnMuZWRpdCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sInVybCI6W10sImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9', '1787082587');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('oIme46G11LUfq63E3cXFWfnYDxIVoKuBRoRcN8ua', '1', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_6_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/151.0.7922.112 Mobile/15E148 Safari/604.1', 'eyJfdG9rZW4iOiJ4TW1JcEFtV3BBZ3ZtbW5Kd1VTUks0b2RvVklybFNKdEtHWTl6SnBDIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9hbnN3ZXJpbmctdmFsaWRhdGlvbi1sZWF2ZXMtbWVycnkudHJ5Y2xvdWRmbGFyZS5jb21cL2FkbWluXC9sZWFkcyIsInJvdXRlIjoiYWRtaW4ubGVhZHMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==', '1787079817');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('OMmH8kufqWQcYmMmBBjtu8W75ONn0BAkmq6iHGCV', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko)', 'eyJfdG9rZW4iOiJ5QVRuOVpJbHpNbjR3dHBiazY1T01vZzdhbU55TW1TNWF1elA1cXdjIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3F1b3Rhcml4LnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1787079493');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('trESN7zb3sH4XTq44DgTNmu3pelrTWJWmcj3LIWk', NULL, '127.0.0.1', 'WhatsApp/2.23.20.0', 'eyJfdG9rZW4iOiJlN2pId3p0UksxNUk1elluVEt3VWVEOU5kNzF3MU10SHFadWxyQzZpIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9hbnN3ZXJpbmctdmFsaWRhdGlvbi1sZWF2ZXMtbWVycnkudHJ5Y2xvdWRmbGFyZS5jb20iLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1787079168');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('whi8h3hT2nMXb9YNzx8GxgVbDVGpKsEwKQ7x9mKo', NULL, '127.0.0.1', 'WhatsApp/2.23.20.0', 'eyJfdG9rZW4iOiJFbXZ4Z2xBUEFuQ093S0Y0OEt0R0xYa1lZeVJOb3ZrR09kUUp6d3hJIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9hbnN3ZXJpbmctdmFsaWRhdGlvbi1sZWF2ZXMtbWVycnkudHJ5Y2xvdWRmbGFyZS5jb21cL2FkbWluXC9sb2dpbiIsInJvdXRlIjoiYWRtaW4ubG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1787079187');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('wkKUPzObWxDiC726DO8wUZrUaf1eXjwnVwjmdVqa', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJRb2I3U1RCRHJaN2E1VGoyNTAxZm1IaERUdXV2MzV2d3dQa2thQmFHIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cHM6XC9cL3F1b3Rhcml4LXdlYi50ZXN0Iiwicm91dGUiOiJob21lIn19', '1787079134');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('ysHrtJbXMX941FlfEmz1I3xjS26rItAHk1cCcBRY', NULL, '127.0.0.1', 'curl/8.16.0', 'eyJfdG9rZW4iOiJoaHNIeFJ4VGwxNkFhRlBhZDB2MU9zNzYxU0loMmNuR0pIUURsZmI1IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1787079139');

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('1', 'site_title', 'Quotarix', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('2', 'site_tagline', 'Forwarder Satış Ekibiniz İçin CRM — Müşteriniz Şirkette Kalsın', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('3', 'whatsapp', '+905469715249', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('4', 'whatsapp_text', 'Merhaba, Quotarix hakkında bilgi almak istiyorum.', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('5', 'app_url', 'https://app.quotarix.com', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('6', 'contact_email', 'info@quotarix.com', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('7', 'contact_phone', '+90 546 971 52 49', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('8', 'contact_address', 'İTOB Mah. 10032 Sk. No:2 İçkapı No:Z13 Menderes / İzmir — İzmir Bilimpark Teknokent', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('9', 'company_title', 'Pekvera Yazılım Teknoloji A.Ş.', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('10', 'tax_info', 'Menderes V.D. – 7280891746', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('11', 'ga4_id', '', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('12', 'social_linkedin', '#', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('13', 'social_instagram', '#', '2026-08-18 10:29:01', '2026-08-18 10:29:01');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('14', 'social_twitter', '#', '2026-08-18 10:29:01', '2026-08-18 10:29:01');

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quote` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint DEFAULT '5',
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `testimonials` (`id`, `name`, `company`, `role`, `avatar`, `quote`, `rating`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('1', 'Ahmet Yılmaz', 'TransGlobal Lojistik A.Ş.', 'Satış Direktörü', NULL, 'Quotarix sayesinde satış temsilcilerimiz ayrıldığında müşteri ve teklif geçmişimiz artık şirketimizde kalıyor. Fuar kartvizitlerini sisteme girmek dakikalar alıyor.', '5', '1', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placement` enum('home','features','why') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'home',
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `videos` (`id`, `title`, `video_url`, `thumbnail`, `placement`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('1', 'Quotarix Tanıtım Videosu', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', NULL, 'home', '1', '1', '2026-08-18 10:29:01', '2026-08-18 10:29:01');

SET FOREIGN_KEY_CHECKS=1;
