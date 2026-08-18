# Graph Report - quotarix  (2026-08-18)

## Corpus Check
- 99 files · ~117,339 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 379 nodes · 519 edges · 65 communities (59 shown, 6 thin omitted)
- Extraction: 99% EXTRACTED · 1% INFERRED · 0% AMBIGUOUS · INFERRED: 4 edges (avg confidence: 0.84)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `c9e426f9`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- Quotarix Landing Page (index.html)
- QX-WEB Laravel Multipage Mimarisi
- composer.json
- scripts
- package.json
- Illuminate\Database\Seeder
- 0001_01_01_000000_create_users_table.php
- README.md
- ContentSeeder
- RedirectLegacyHtml.php
- app.blade.php
- AppServiceProvider
- QUOTARIX-WEB — Geliştirme Kuralları ve Bağlam/Token Optimizasyon Rehberi (`rules.md`)
- logging.php
- bootstrap/app.php
- ExampleTest
- console.php
- rules/graphify.md
- workflows/graphify.md
- Page
- Illuminate\Database\Eloquent\Factories\HasFactory
- BladeAndFormTest

## God Nodes (most connected - your core abstractions)
1. `Page` - 24 edges
2. `Feature` - 16 edges
3. `Post` - 14 edges
4. `Video` - 13 edges
5. `ContentSeeder` - 13 edges
6. `Quotarix Landing Page (index.html)` - 13 edges
7. `Faq` - 12 edges
8. `Lead` - 11 edges
9. `Plan` - 10 edges
10. `Controller` - 9 edges

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

## Communities (65 total, 6 thin omitted)

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

### Community 5 - "Illuminate\Database\Seeder"
Cohesion: 0.08
Nodes (15): Illuminate\Database\Eloquent\Attributes\Fillable, Illuminate\Database\Eloquent\Attributes\Hidden, Illuminate\Database\Eloquent\Factories\Factory, Illuminate\Database\Seeder, Illuminate\Foundation\Auth\User, Illuminate\Notifications\Notifiable, Illuminate\Support\Facades\Hash, Illuminate\Support\Str (+7 more)

### Community 7 - "0001_01_01_000000_create_users_table.php"
Cohesion: 0.19
Nodes (3): Illuminate\Database\Migrations\Migration, Illuminate\Database\Schema\Blueprint, Illuminate\Support\Facades\Schema

### Community 8 - "README.md"
Cohesion: 0.25
Nodes (7): About Laravel, Agentic Development, Code of Conduct, Contributing, Learning Laravel, License, Security Vulnerabilities

### Community 10 - "RedirectLegacyHtml.php"
Cohesion: 0.60
Nodes (3): Closure, RedirectLegacyHtml, Symfony\Component\HttpFoundation\Response

### Community 11 - "app.blade.php"
Cohesion: 0.33
Nodes (5): partials.cookie-consent, partials.demo-modal, partials.footer, partials.navbar, partials.seo

### Community 13 - "QUOTARIX-WEB — Geliştirme Kuralları ve Bağlam/Token Optimizasyon Rehberi (`rules.md`)"
Cohesion: 0.33
Nodes (5): ⚡ 1. Token ve Bağlam (Context) Optimizasyon Kuralları, 🏗️ 2. QX-WEB Genel Mimari ve Tasarım Prensipleri, 🛠️ 3. Kodlama ve Güvenlik Standartları, 📌 4. İş Emri Süreç Disiplini (QX-WEB Serisi), QUOTARIX-WEB — Geliştirme Kuralları ve Bağlam/Token Optimizasyon Rehberi (`rules.md`)

### Community 14 - "logging.php"
Cohesion: 0.40
Nodes (4): Monolog\Handler\NullHandler, Monolog\Handler\StreamHandler, Monolog\Handler\SyslogUdpHandler, Monolog\Processor\PsrLogMessageProcessor

### Community 15 - "bootstrap/app.php"
Cohesion: 0.40
Nodes (3): Illuminate\Foundation\Application, Illuminate\Foundation\Configuration\Exceptions, Illuminate\Foundation\Configuration\Middleware

### Community 20 - "Page"
Cohesion: 0.09
Nodes (20): Carbon\Carbon, Illuminate\Http\RedirectResponse, Illuminate\Http\Request, Illuminate\Http\Response, Illuminate\Support\Facades\Route, Illuminate\View\View, BlogController, Controller (+12 more)

### Community 31 - "Illuminate\Database\Eloquent\Factories\HasFactory"
Cohesion: 0.09
Nodes (13): Illuminate\Database\Eloquent\Factories\HasFactory, Illuminate\Database\Eloquent\Model, Illuminate\Support\Facades\Cache, active_sections(), is_section_active(), setting(), whatsapp_link(), Lead (+5 more)

### Community 32 - "BladeAndFormTest"
Cohesion: 0.13
Nodes (7): Illuminate\Foundation\Testing\RefreshDatabase, Illuminate\Foundation\Testing\TestCase, SettingSeeder, BladeAndFormTest, ExampleTest, RouteTest, TestCase

## Knowledge Gaps
- **91 isolated node(s):** `$schema`, `name`, `type`, `description`, `laravel` (+86 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **6 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Page` connect `Page` to `ContentSeeder`, `Illuminate\Database\Eloquent\Factories\HasFactory`?**
  _High betweenness centrality (0.034) - this node is a cross-community bridge._
- **Why does `Lead` connect `Illuminate\Database\Eloquent\Factories\HasFactory` to `BladeAndFormTest`, `Page`?**
  _High betweenness centrality (0.032) - this node is a cross-community bridge._
- **Why does `scripts` connect `scripts` to `composer.json`?**
  _High betweenness centrality (0.019) - this node is a cross-community bridge._
- **What connects `$schema`, `name`, `type` to the rest of the system?**
  _91 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Quotarix Landing Page (index.html)` be split into smaller, more focused modules?**
  _Cohesion score 0.13333333333333333 - nodes in this community are weakly interconnected._
- **Should `composer.json` be split into smaller, more focused modules?**
  _Cohesion score 0.046511627906976744 - nodes in this community are weakly interconnected._
- **Should `scripts` be split into smaller, more focused modules?**
  _Cohesion score 0.08 - nodes in this community are weakly interconnected._