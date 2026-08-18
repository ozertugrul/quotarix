# Graph Report - quotarix  (2026-08-18)

## Corpus Check
- 36 files · ~65,514 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 209 nodes · 200 edges · 31 communities (24 shown, 7 thin omitted)
- Extraction: 100% EXTRACTED · 0% INFERRED · 0% AMBIGUOUS · INFERRED: 1 edges (avg confidence: 0.95)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `ee257aef`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- Quotarix Landing Page (index.html)
- QX-WEB Laravel Multipage Mimarisi
- composer.json
- scripts
- package.json
- User
- UserFactory.php
- 0001_01_01_000000_create_users_table.php
- README.md
- config
- bootstrap/app.php
- TestCase
- AppServiceProvider
- QUOTARIX-WEB — Geliştirme Kuralları ve Bağlam/Token Optimizasyon Rehberi (`rules.md`)
- logging.php
- psr-4
- ExampleTest
- console.php
- rules/graphify.md
- workflows/graphify.md
- Illuminate\Support\Facades\Route
- Controller.php

## God Nodes (most connected - your core abstractions)
1. `Quotarix Landing Page (index.html)` - 13 edges
2. `User` - 9 edges
3. `scripts` - 9 edges
4. `require-dev` - 8 edges
5. `setup` - 7 edges
6. `AppServiceProvider` - 5 edges
7. `config` - 5 edges
8. `UserFactory` - 5 edges
9. `QUOTARIX-WEB — Geliştirme Kuralları ve Bağlam/Token Optimizasyon Rehberi (`rules.md`)` - 5 edges
10. `QX-WEB Laravel Multipage Mimarisi` - 5 edges

## Surprising Connections (you probably didn't know these)
- `Quotarix Landing Page (index.html)` --links_to--> `İptal ve İade Politikası`  [EXTRACTED]
  index.html → iptal-iade-politikasi.html
- `Quotarix Landing Page (index.html)` --links_to--> `Mesafeli Satış Sözleşmesi`  [EXTRACTED]
  index.html → mesafeli-satis-sozlesmesi.html
- `Quotarix Landing Page (index.html)` --links_to--> `Ön Bilgilendirme Formu`  [EXTRACTED]
  index.html → on-bilgilendirme.html
- `Quotarix Landing Page (index.html)` --links_to--> `Kullanım Koşulları (TR/EN)`  [EXTRACTED]
  index.html → terms-of-service.html
- `Quotarix Landing Page (index.html)` --links_to--> `Teslimat Bilgileri`  [EXTRACTED]
  index.html → teslimat-bilgileri.html

## Import Cycles
- None detected.

## Hyperedges (group relationships)
- **Quotarix Çekirdek CRM ve Teklif Yetenekleri** — feature_quick_quote, feature_smart_crm, feature_manager_dashboard, feature_ai_business_card_ocr [EXTRACTED 0.95]
- **SaaS & E-Ticaret Yasal Uyumluluk Paketi** — legal_kvkk, legal_privacy_policy, legal_terms_of_service, legal_mesafeli_satis, legal_iptal_iade, legal_on_bilgilendirme, legal_teslimat_bilgileri [EXTRACTED 1.00]

## Communities (31 total, 7 thin omitted)

### Community 0 - "Quotarix Landing Page (index.html)"
Cohesion: 0.13
Nodes (16): Pekvera Yazılım Teknoloji A.Ş., Yapay Zeka Kartvizit Tarama (OCR), Yeni Fırsat Formu Prototipi (v2), Yönetici Dashboard, Hızlı Teklif Yönetimi Modülü, Akıllı CRM & Müşteri Kartı, Hero & Değer Önerisi Bölümü, İptal ve İade Politikası (+8 more)

### Community 1 - "QX-WEB Laravel Multipage Mimarisi"
Cohesion: 0.33
Nodes (6): 11 Modüllü Quotarix Admin Panel, SEO 301 Yönlendirme Haritası, QX-WEB Laravel Multipage Mimarisi, Lazy-Load Video Facade Deseni, 15 Bölümlü Dinamik Section Toggle, Teaser Ana Sayfa Deseni (PV-WEB-016)

### Community 2 - "composer.json"
Cohesion: 0.07
Nodes (28): autoload-dev, psr-4, description, extra, laravel, keywords, dont-discover, license (+20 more)

### Community 3 - "scripts"
Cohesion: 0.08
Nodes (26): scripts, dev, post-autoload-dump, post-create-project-cmd, post-root-package-install, post-update-cmd, pre-package-uninstall, setup (+18 more)

### Community 4 - "package.json"
Cohesion: 0.10
Nodes (20): concurrently, @laravel/multiplex, laravel-vite-plugin, devDependencies, concurrently, laravel-vite-plugin, tailwindcss, @tailwindcss/vite (+12 more)

### Community 5 - "User"
Cohesion: 0.20
Nodes (9): Illuminate\Database\Console\Seeds\WithoutModelEvents, Illuminate\Database\Eloquent\Attributes\Fillable, Illuminate\Database\Eloquent\Attributes\Hidden, Illuminate\Database\Eloquent\Factories\HasFactory, Illuminate\Database\Seeder, Illuminate\Foundation\Auth\User, Illuminate\Notifications\Notifiable, User (+1 more)

### Community 6 - "UserFactory.php"
Cohesion: 0.20
Nodes (6): Illuminate\Database\Eloquent\Factories\Factory, Illuminate\Support\Facades\Hash, Illuminate\Support\Str, Pdo\Mysql, UserFactory, static

### Community 7 - "0001_01_01_000000_create_users_table.php"
Cohesion: 0.23
Nodes (3): Illuminate\Database\Migrations\Migration, Illuminate\Database\Schema\Blueprint, Illuminate\Support\Facades\Schema

### Community 8 - "README.md"
Cohesion: 0.25
Nodes (7): About Laravel, Agentic Development, Code of Conduct, Contributing, Learning Laravel, License, Security Vulnerabilities

### Community 9 - "config"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 10 - "bootstrap/app.php"
Cohesion: 0.40
Nodes (4): Illuminate\Foundation\Application, Illuminate\Foundation\Configuration\Exceptions, Illuminate\Foundation\Configuration\Middleware, Illuminate\Http\Request

### Community 11 - "TestCase"
Cohesion: 0.40
Nodes (3): Illuminate\Foundation\Testing\TestCase, ExampleTest, TestCase

### Community 13 - "QUOTARIX-WEB — Geliştirme Kuralları ve Bağlam/Token Optimizasyon Rehberi (`rules.md`)"
Cohesion: 0.33
Nodes (5): ⚡ 1. Token ve Bağlam (Context) Optimizasyon Kuralları, 🏗️ 2. QX-WEB Genel Mimari ve Tasarım Prensipleri, 🛠️ 3. Kodlama ve Güvenlik Standartları, 📌 4. İş Emri Süreç Disiplini (QX-WEB Serisi), QUOTARIX-WEB — Geliştirme Kuralları ve Bağlam/Token Optimizasyon Rehberi (`rules.md`)

### Community 14 - "logging.php"
Cohesion: 0.40
Nodes (4): Monolog\Handler\NullHandler, Monolog\Handler\StreamHandler, Monolog\Handler\SyslogUdpHandler, Monolog\Processor\PsrLogMessageProcessor

### Community 15 - "psr-4"
Cohesion: 0.40
Nodes (5): autoload, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\

## Knowledge Gaps
- **86 isolated node(s):** `Controller`, `$schema`, `name`, `type`, `description` (+81 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **7 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `scripts` connect `scripts` to `composer.json`?**
  _High betweenness centrality (0.060) - this node is a cross-community bridge._
- **Why does `config` connect `config` to `composer.json`?**
  _High betweenness centrality (0.017) - this node is a cross-community bridge._
- **What connects `Controller`, `$schema`, `name` to the rest of the system?**
  _86 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Quotarix Landing Page (index.html)` be split into smaller, more focused modules?**
  _Cohesion score 0.13333333333333333 - nodes in this community are weakly interconnected._
- **Should `composer.json` be split into smaller, more focused modules?**
  _Cohesion score 0.06896551724137931 - nodes in this community are weakly interconnected._
- **Should `scripts` be split into smaller, more focused modules?**
  _Cohesion score 0.08 - nodes in this community are weakly interconnected._
- **Should `package.json` be split into smaller, more focused modules?**
  _Cohesion score 0.09523809523809523 - nodes in this community are weakly interconnected._