# Graph Report - quotarix  (2026-08-18)

## Corpus Check
- 140 files · ~131,892 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 515 nodes · 869 edges · 92 communities (86 shown, 6 thin omitted)
- Extraction: 97% EXTRACTED · 3% INFERRED · 0% AMBIGUOUS · INFERRED: 24 edges (avg confidence: 0.81)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `9a0b5fd9`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- Quotarix Landing Page (index.html)
- QX-WEB Laravel Multipage Mimarisi
- composer.json
- scripts
- package.json
- AdminPanelTest.php
- 0001_01_01_000000_create_users_table.php
- README.md
- Lead
- Illuminate\Http\Request
- app.blade.php
- AppServiceProvider
- QUOTARIX-WEB — Geliştirme Kuralları ve Bağlam/Token Optimizasyon Rehberi (`rules.md`)
- logging.php
- Video
- ExampleTest
- console.php
- rules/graphify.md
- workflows/graphify.md
- Illuminate\View\View
- Illuminate\Database\Eloquent\Factories\HasFactory
- ContentSeeder

## God Nodes (most connected - your core abstractions)
1. `Controller` - 33 edges
2. `Feature` - 26 edges
3. `Post` - 23 edges
4. `Page` - 22 edges
5. `Lead` - 21 edges
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

## Communities (92 total, 6 thin omitted)

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

### Community 5 - "AdminPanelTest.php"
Cohesion: 0.08
Nodes (13): Illuminate\Database\Eloquent\Attributes\Fillable, Illuminate\Database\Eloquent\Attributes\Hidden, Illuminate\Database\Eloquent\Factories\Factory, Illuminate\Foundation\Auth\User, Illuminate\Notifications\Notifiable, Illuminate\Support\Facades\Hash, Illuminate\Support\Str, Pdo\Mysql (+5 more)

### Community 7 - "0001_01_01_000000_create_users_table.php"
Cohesion: 0.19
Nodes (3): Illuminate\Database\Migrations\Migration, Illuminate\Database\Schema\Blueprint, Illuminate\Support\Facades\Schema

### Community 8 - "README.md"
Cohesion: 0.25
Nodes (7): About Laravel, Agentic Development, Code of Conduct, Contributing, Learning Laravel, License, Security Vulnerabilities

### Community 9 - "Lead"
Cohesion: 0.21
Nodes (3): LeadController, Lead, Symfony\Component\HttpFoundation\StreamedResponse

### Community 10 - "Illuminate\Http\Request"
Cohesion: 0.09
Nodes (14): Closure, Illuminate\Foundation\Application, Illuminate\Foundation\Configuration\Exceptions, Illuminate\Foundation\Configuration\Middleware, Illuminate\Http\RedirectResponse, Illuminate\Http\Request, Illuminate\Support\Facades\Auth, Illuminate\Support\Facades\RateLimiter (+6 more)

### Community 11 - "app.blade.php"
Cohesion: 0.33
Nodes (5): partials.cookie-consent, partials.demo-modal, partials.footer, partials.navbar, partials.seo

### Community 13 - "QUOTARIX-WEB — Geliştirme Kuralları ve Bağlam/Token Optimizasyon Rehberi (`rules.md`)"
Cohesion: 0.33
Nodes (5): ⚡ 1. Token ve Bağlam (Context) Optimizasyon Kuralları, 🏗️ 2. QX-WEB Genel Mimari ve Tasarım Prensipleri, 🛠️ 3. Kodlama ve Güvenlik Standartları, 📌 4. İş Emri Süreç Disiplini (QX-WEB Serisi), QUOTARIX-WEB — Geliştirme Kuralları ve Bağlam/Token Optimizasyon Rehberi (`rules.md`)

### Community 14 - "logging.php"
Cohesion: 0.40
Nodes (4): Monolog\Handler\NullHandler, Monolog\Handler\StreamHandler, Monolog\Handler\SyslogUdpHandler, Monolog\Processor\PsrLogMessageProcessor

### Community 20 - "Illuminate\View\View"
Cohesion: 0.06
Nodes (21): Illuminate\Support\Facades\Route, Illuminate\View\View, page_meta(), DashboardController, FaqController, FeatureController, PlanController, PostController (+13 more)

### Community 31 - "Illuminate\Database\Eloquent\Factories\HasFactory"
Cohesion: 0.08
Nodes (16): Illuminate\Database\Eloquent\Factories\HasFactory, Illuminate\Database\Eloquent\Model, Illuminate\Http\JsonResponse, Illuminate\Http\Response, Illuminate\Support\Facades\Cache, active_sections(), is_section_active(), setting() (+8 more)

### Community 32 - "ContentSeeder"
Cohesion: 0.07
Nodes (13): Carbon\Carbon, Illuminate\Database\Seeder, Illuminate\Foundation\Testing\RefreshDatabase, Illuminate\Foundation\Testing\TestCase, ContentSeeder, DatabaseSeeder, SectionSeeder, SettingSeeder (+5 more)

## Knowledge Gaps
- **91 isolated node(s):** `$schema`, `name`, `type`, `description`, `laravel` (+86 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **6 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Lead` connect `Lead` to `ContentSeeder`, `AdminPanelTest.php`, `Illuminate\Http\Request`, `Illuminate\View\View`, `Illuminate\Database\Eloquent\Factories\HasFactory`?**
  _High betweenness centrality (0.026) - this node is a cross-community bridge._
- **Why does `Feature` connect `Illuminate\View\View` to `ContentSeeder`, `Illuminate\Http\Request`, `AdminPanelTest.php`, `Illuminate\Database\Eloquent\Factories\HasFactory`?**
  _High betweenness centrality (0.025) - this node is a cross-community bridge._
- **Why does `Controller` connect `Illuminate\View\View` to `Lead`, `Illuminate\Http\Request`, `Video`, `Illuminate\Database\Eloquent\Factories\HasFactory`?**
  _High betweenness centrality (0.022) - this node is a cross-community bridge._
- **What connects `$schema`, `name`, `type` to the rest of the system?**
  _91 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Quotarix Landing Page (index.html)` be split into smaller, more focused modules?**
  _Cohesion score 0.13333333333333333 - nodes in this community are weakly interconnected._
- **Should `composer.json` be split into smaller, more focused modules?**
  _Cohesion score 0.046511627906976744 - nodes in this community are weakly interconnected._
- **Should `scripts` be split into smaller, more focused modules?**
  _Cohesion score 0.08 - nodes in this community are weakly interconnected._