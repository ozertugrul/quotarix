# Graph Report - quotarix  (2026-08-18)

## Corpus Check
- 146 files · ~146,461 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 543 nodes · 905 edges · 96 communities (89 shown, 7 thin omitted)
- Extraction: 97% EXTRACTED · 3% INFERRED · 0% AMBIGUOUS · INFERRED: 27 edges (avg confidence: 0.81)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `8a7fb130`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- Quotarix Landing Page (index.html)
- QX-WEB Laravel Multipage Mimarisi
- composer.json
- scripts
- package.json
- AdminPanelTest
- 0001_01_01_000000_create_users_table.php
- README.md
- Lead
- Illuminate\Http\Request
- app.blade.php
- AppServiceProvider
- QUOTARIX-WEB — Geliştirme Kuralları ve Bağlam/Token Optimizasyon Rehberi (`rules.md`)
- logging.php
- 🚀 2. cPanel Kurulum Adımları
- ExampleTest
- console.php
- rules/graphify.md
- workflows/graphify.md
- Illuminate\Database\Eloquent\Factories\HasFactory
- AdminPanelTest.php
- Illuminate\View\View
- build-package.sh
- Plan
- Video

## God Nodes (most connected - your core abstractions)
1. `Controller` - 33 edges
2. `Feature` - 27 edges
3. `Post` - 24 edges
4. `Lead` - 23 edges
5. `Page` - 22 edges
6. `Faq` - 20 edges
7. `Plan` - 20 edges
8. `Video` - 20 edges
9. `Section` - 17 edges
10. `Testimonial` - 17 edges

## Surprising Connections (you probably didn't know these)
- `Hızlı Teklif Yönetimi Modülü` --implemented_by_prototype--> `Yeni Fırsat Formu Prototipi (v2)`  [INFERRED]
  index.html → firsat-form-mockup.html
- `Quotarix Landing Page (index.html)` --links_to--> `İptal ve İade Politikası`  [EXTRACTED]
  index.html → iptal-iade-politikasi.html
- `Quotarix Landing Page (index.html)` --links_to--> `KVKK Aydınlatma Metni`  [EXTRACTED]
  index.html → kvkk.html
- `Quotarix Landing Page (index.html)` --links_to--> `Mesafeli Satış Sözleşmesi`  [EXTRACTED]
  index.html → mesafeli-satis-sozlesmesi.html
- `Quotarix Landing Page (index.html)` --links_to--> `Ön Bilgilendirme Formu`  [EXTRACTED]
  index.html → on-bilgilendirme.html

## Import Cycles
- None detected.

## Hyperedges (group relationships)
- **Quotarix Çekirdek CRM ve Teklif Yetenekleri** — feature_quick_quote, feature_smart_crm, feature_manager_dashboard, feature_ai_business_card_ocr [EXTRACTED 0.95]
- **SaaS & E-Ticaret Yasal Uyumluluk Paketi** — legal_kvkk, legal_privacy_policy, legal_terms_of_service, legal_mesafeli_satis, legal_iptal_iade, legal_on_bilgilendirme, legal_teslimat_bilgileri [EXTRACTED 1.00]

## Communities (96 total, 7 thin omitted)

### Community 0 - "Quotarix Landing Page (index.html)"
Cohesion: 0.13
Nodes (16): Pekvera Yazılım Teknoloji A.Ş., Yapay Zeka Kartvizit Tarama (OCR), Yeni Fırsat Formu Prototipi (v2), Yönetici Dashboard, Hızlı Teklif Yönetimi Modülü, Akıllı CRM & Müşteri Kartı, Hero & Değer Önerisi Bölümü, İptal ve İade Politikası (+8 more)

### Community 1 - "QX-WEB Laravel Multipage Mimarisi"
Cohesion: 0.33
Nodes (6): 11 Modüllü Quotarix Admin Panel, SEO 301 Yönlendirme Haritası, QX-WEB Laravel Multipage Mimarisi, Lazy-Load Video Facade Deseni, 15 Bölümlü Dinamik Section Toggle, Teaser Ana Sayfa Deseni (PV-WEB-016)

### Community 2 - "composer.json"
Cohesion: 0.05
Nodes (42): pestphp/pest-plugin, php-http/discovery, autoload, autoload-dev, psr-4, files, psr-4, config (+34 more)

### Community 3 - "scripts"
Cohesion: 0.08
Nodes (26): scripts, dev, post-autoload-dump, post-create-project-cmd, post-root-package-install, post-update-cmd, pre-package-uninstall, setup (+18 more)

### Community 4 - "package.json"
Cohesion: 0.10
Nodes (20): concurrently, @laravel/multiplex, laravel-vite-plugin, devDependencies, concurrently, laravel-vite-plugin, tailwindcss, @tailwindcss/vite (+12 more)

### Community 5 - "AdminPanelTest"
Cohesion: 0.06
Nodes (12): Illuminate\Database\Eloquent\Attributes\Fillable, Illuminate\Database\Eloquent\Attributes\Hidden, Illuminate\Database\Eloquent\Factories\Factory, Illuminate\Foundation\Auth\User, Illuminate\Notifications\Notifiable, Illuminate\Support\Str, Pdo\Mysql, Admin (+4 more)

### Community 7 - "0001_01_01_000000_create_users_table.php"
Cohesion: 0.19
Nodes (3): Illuminate\Database\Migrations\Migration, Illuminate\Database\Schema\Blueprint, Illuminate\Support\Facades\Schema

### Community 8 - "README.md"
Cohesion: 0.25
Nodes (7): About Laravel, Agentic Development, Code of Conduct, Contributing, Learning Laravel, License, Security Vulnerabilities

### Community 9 - "Lead"
Cohesion: 0.23
Nodes (3): LeadController, Lead, Symfony\Component\HttpFoundation\StreamedResponse

### Community 10 - "Illuminate\Http\Request"
Cohesion: 0.09
Nodes (15): Closure, Illuminate\Foundation\Application, Illuminate\Foundation\Configuration\Exceptions, Illuminate\Foundation\Configuration\Middleware, Illuminate\Http\RedirectResponse, Illuminate\Http\Request, Illuminate\Support\Facades\Auth, Illuminate\Support\Facades\RateLimiter (+7 more)

### Community 11 - "app.blade.php"
Cohesion: 0.33
Nodes (5): partials.cookie-consent, partials.demo-modal, partials.footer, partials.navbar, partials.seo

### Community 13 - "QUOTARIX-WEB — Geliştirme Kuralları ve Bağlam/Token Optimizasyon Rehberi (`rules.md`)"
Cohesion: 0.33
Nodes (5): ⚡ 1. Token ve Bağlam (Context) Optimizasyon Kuralları, 🏗️ 2. QX-WEB Genel Mimari ve Tasarım Prensipleri, 🛠️ 3. Kodlama ve Güvenlik Standartları, 📌 4. İş Emri Süreç Disiplini (QX-WEB Serisi), QUOTARIX-WEB — Geliştirme Kuralları ve Bağlam/Token Optimizasyon Rehberi (`rules.md`)

### Community 14 - "logging.php"
Cohesion: 0.40
Nodes (4): Monolog\Handler\NullHandler, Monolog\Handler\StreamHandler, Monolog\Handler\SyslogUdpHandler, Monolog\Processor\PsrLogMessageProcessor

### Community 15 - "🚀 2. cPanel Kurulum Adımları"
Cohesion: 0.14
Nodes (13): 📦 1. Dağıtım Paketleri (`dist/`), 🚀 2. cPanel Kurulum Adımları, 🔍 3. Yayın Sonrası Kontrol Listesi (Checklist), A. Çekirdek (Core) Dosyaların Yüklenmesi:, Adım 1: PHP Sürümü ve Eklentileri Kontrol Edin, Adım 2: Veritabanını Oluşturun ve İçe Aktarın, Adım 3: Dosyaları Yükleyin ve Çıkartın, Adım 4: `.env` Dosyasını Oluşturun (+5 more)

### Community 31 - "Illuminate\Database\Eloquent\Factories\HasFactory"
Cohesion: 0.09
Nodes (13): Illuminate\Database\Eloquent\Factories\HasFactory, Illuminate\Database\Eloquent\Model, Illuminate\Http\JsonResponse, Illuminate\Support\Facades\Cache, active_sections(), is_section_active(), sanitize_input(), setting() (+5 more)

### Community 32 - "AdminPanelTest.php"
Cohesion: 0.07
Nodes (15): Illuminate\Database\Seeder, Illuminate\Foundation\Testing\RefreshDatabase, Illuminate\Foundation\Testing\TestCase, Illuminate\Support\Facades\Hash, Setting, AdminSeeder, DatabaseSeeder, SectionSeeder (+7 more)

### Community 92 - "Illuminate\View\View"
Cohesion: 0.07
Nodes (21): Illuminate\Http\Response, Illuminate\Support\Facades\Route, Illuminate\View\View, page_meta(), DashboardController, FeatureController, PageController, PostController (+13 more)

### Community 96 - "Video"
Cohesion: 0.15
Nodes (3): Carbon\Carbon, Video, ContentSeeder

## Knowledge Gaps
- **102 isolated node(s):** `$schema`, `name`, `type`, `description`, `laravel` (+97 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **7 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Lead` connect `Lead` to `AdminPanelTest.php`, `AdminPanelTest`, `Illuminate\Http\Request`, `Illuminate\View\View`, `Illuminate\Database\Eloquent\Factories\HasFactory`?**
  _High betweenness centrality (0.030) - this node is a cross-community bridge._
- **Why does `Feature` connect `Illuminate\View\View` to `Video`, `AdminPanelTest.php`, `AdminPanelTest`, `Illuminate\Http\Request`, `Illuminate\Database\Eloquent\Factories\HasFactory`?**
  _High betweenness centrality (0.026) - this node is a cross-community bridge._
- **Why does `Post` connect `Illuminate\View\View` to `Video`, `AdminPanelTest.php`, `AdminPanelTest`, `Illuminate\Http\Request`, `Illuminate\Database\Eloquent\Factories\HasFactory`?**
  _High betweenness centrality (0.022) - this node is a cross-community bridge._
- **What connects `$schema`, `name`, `type` to the rest of the system?**
  _102 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Quotarix Landing Page (index.html)` be split into smaller, more focused modules?**
  _Cohesion score 0.13333333333333333 - nodes in this community are weakly interconnected._
- **Should `composer.json` be split into smaller, more focused modules?**
  _Cohesion score 0.046511627906976744 - nodes in this community are weakly interconnected._
- **Should `scripts` be split into smaller, more focused modules?**
  _Cohesion score 0.08 - nodes in this community are weakly interconnected._