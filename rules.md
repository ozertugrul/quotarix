# QUOTARIX-WEB — Geliştirme Kuralları ve Bağlam/Token Optimizasyon Rehberi (`rules.md`)

Bu dosya, **Quotarix** projesinde geliştirme yapan tüm AI ajanları ve geliştiriciler için token tasarrufu, bağlam (context) yönetimi, mimari prensipler ve kodlama standartlarını belirler.

---

## ⚡ 1. Token ve Bağlam (Context) Optimizasyon Kuralları

1. **Önce Knowledge Graph'ı Sorgula (Graphify İlk Kuralı):**
   * Kod tabanı, mimari, veri modelleri veya ilişkiler hakkında soru geldiğinde tüm dosyaları tek tek okumak (view_file) yerine önce **Graphify** kullan:
     ```bash
     uv tool run --from graphifyy graphify query "<konu veya soru>"
     uv tool run --from graphifyy graphify explain "<modül veya kavram>"
     uv tool run --from graphifyy graphify path "<KavramA>" "<KavramB>"
     ```
   * Bu yaklaşım **%80-90 token tasarrufu** sağlar ve yalnızca ilgili alt grafı bağlama getirir.

2. **Hedefe Yönelik Dosya Okuma:**
   * Dosya okurken (`view_file`) doğrudan tüm dosyayı (800+ satır) yüklemek yerine, grep ile hedef satırı tespit edip `StartLine` ve `EndLine` aralıklarıyla okuyun.
   * `graphify-out/GRAPH_REPORT.md` dosyasını sadece genel bir mimari bakış gerektiğinde kullanın.

3. **Grafı Güncel Tutma:**
   * Kod veya dosya yapısında değişiklik yapıldığında, grafı güncellemek için çalıştırın:
     ```bash
     uv tool run --from graphifyy graphify update .
     ```

---

## 🏗️ 2. QX-WEB Genel Mimari ve Tasarım Prensipleri

1. **Baştan Teaser & Multipage Mantığı (PV-WEB-016 Kuralı):**
   * Ana sayfa (`/`) asla devasa bir one-page içerik çöplüğü olmayacaktır.
   * Ana sayfadaki bölümler özet/teaser (`Str::limit(90-120)`) + ilgili iç sayfaya yönlendiren CTA butonu ("Tüm Özellikleri İncele →", "Neden Quotarix →", "Yol Haritası →", "Tüm Sorular →") şeklinde tasarlanır.
   * İç sayfalar (`/ozellikler`, `/neden-quotarix`, `/yol-haritasi`, `/fiyatlandirma`, `/blog`, `/sss`, `/demo`, `/iletisim`, `/{slug}`) zengin ve tam içeriği barındırır.

2. **Dinamik Bölüm (Section Toggle) ve Boş Guard'ı:**
   * 15 ana sayfa bölümü `sections` tablosu üzerinden panelden dinamik açılıp kapatılır.
   * `pricing`, `testimonials` ve `video` bölümleri varsayılan olarak **pasif** gelecektir.
   * Bölüm aktif olsa dahi veri tabanında ilgili kayıt yoksa (örneğin müşteri yorumu girilmemişse) sayfa patlamamalı, boş guard (`@if($items->isNotEmpty())`) ile bölüm gizlenmelidir.

3. **Performans ve Lazy-Load Video Facade:**
   * YouTube / Vimeo videoları asla doğrudan `<iframe>` olarak sayfaya gömülmez.
   * Önce kapak görseli + play butonu (facade) yüklenir; kullanıcı tıkladığında iframe JS ile enjekte edilir (Lighthouse puanını korumak için).
   * Video için `VideoObject` JSON-LD şeması eklenir.
   * `hero.png` WebP formatında sunulur (`<picture>` fallback ile).

4. **Yasal İçerikler ve SEO 301 Koruma:**
   * 7 yasal sayfa (`/kvkk`, `/gizlilik-politikasi`, `/kullanim-kosullari`, `/mesafeli-satis-sozlesmesi`, `/iptal-ve-iade-politikasi`, `/teslimat-bilgileri`, `/on-bilgilendirme`) `pages` tablosundan tek dinamik route ile yönetilir.
   * Eski statik dosya URL'leri (`kvkk.html` vb.) ve eski anchor linkleri (`/#features` vb.) 301 kalıcı yönlendirme haritası ile yeni temiz URL'lere yönlendirilir.

5. **Hafiflik ve Stil Bütünlüğü:**
   * Bootstrap 5.3.3 CDN, Bootstrap Icons CDN ve Plus Jakarta Sans fontu korunur.
   * Özel stiller tek ve temiz `public/assets/css/quotarix.css` dosyasında toplanır. Ağır tema asset yüklemelerinden kaçınılır.

---

## 🛠️ 3. Kodlama ve Güvenlik Standartları

* **Model & Scope:** Tüm içerik modellerinde `scopeActive()` kullanılmalıdır.
* **Cache İptali (Cache Busting):** `Section` ve `Setting` modellerinde güncelleme yapıldığında cache `booted()` hook'u ile anında temizlenmelidir.
* **Admin Güvenliği:** Ayrı `admins` tablosu ve bağımsız `admin` auth guard'ı. Giriş denemelerine rate limiting (5 istek/dakika) ve CSRF koruması.
* **Form & Lead Yönetimi:** Demo ve iletişim formları `leads` tablosuna `source` ('demo' | 'contact') ayrılarak kaydedilir, reCAPTCHA v3 ve e-posta bildirimi tetiklenir.
* **JSON-LD Şemaları:** Organization (genel), SoftwareApplication (ürün), FAQPage (SSS), Article (Blog), VideoObject (Video).

---

## 📌 4. İş Emri Süreç Disiplini (QX-WEB Serisi)

İş emirleri bağımlılık sırasına göre adım adım uygulanacaktır:
* **QX-WEB-000:** Kurulum & Ortam Hazırlığı
* **QX-WEB-001:** Asset Taşıma + CSS Ayrıştırma + WebP
* **QX-WEB-002:** Veritabanı Şeması + Modeller + Seeder'lar
* **QX-WEB-003:** Route Yapısı + 301 SEO Yönlendirmeleri
* **QX-WEB-004:** Blade Layout + Teaser Ana Sayfa + İç Sayfalar
* **QX-WEB-005:** 11 Modüllü Admin Panel & CSV Export
* **QX-WEB-006:** SEO Meta + Sitemap + JSON-LD + KVKK Banner
* **QX-WEB-007:** Testler & Paylaşımlı Hosting Deploy Paketi
