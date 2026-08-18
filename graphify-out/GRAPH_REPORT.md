# Graph Report - quotarix  (2026-08-18)

## Corpus Check
- 19 files · ~55,240 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 22 nodes · 21 edges · 4 communities (3 shown, 1 thin omitted)
- Extraction: 95% EXTRACTED · 5% INFERRED · 0% AMBIGUOUS · INFERRED: 1 edges (avg confidence: 0.95)
- Token cost: 1,200 input · 950 output

## Community Hubs (Navigation)
- Quotarix Landing Page & CRM Değer Önerisi
- QX-WEB Laravel Multipage Mimari & Admin
- Pekvera Kurumsal & Yasal Uyumluluk (KVKK)
- Sektörel Teklif & Fırsat Formu Prototipi

## God Nodes (most connected - your core abstractions)
1. `Quotarix Landing Page (index.html)` - 13 edges
2. `QX-WEB Laravel Multipage Mimarisi` - 5 edges
3. `Hızlı Teklif Yönetimi Modülü` - 2 edges
4. `KVKK Aydınlatma Metni` - 2 edges
5. `Gizlilik Politikası (TR/EN)` - 2 edges
6. `Pekvera Yazılım Teknoloji A.Ş.` - 2 edges
7. `Hero & Değer Önerisi Bölümü` - 1 edges
8. `Forwarder Sektörel Acı Noktaları` - 1 edges
9. `Akıllı CRM & Müşteri Kartı` - 1 edges
10. `Yönetici Dashboard` - 1 edges

## Surprising Connections (you probably didn't know these)
- `Quotarix Landing Page (index.html)` --links_to--> `KVKK Aydınlatma Metni`  [EXTRACTED]
  index.html → kvkk.html
- `Quotarix Landing Page (index.html)` --links_to--> `Gizlilik Politikası (TR/EN)`  [EXTRACTED]
  index.html → privacy-policy.html
- `Quotarix Landing Page (index.html)` --links_to--> `İptal ve İade Politikası`  [EXTRACTED]
  index.html → iptal-iade-politikasi.html
- `Quotarix Landing Page (index.html)` --links_to--> `Mesafeli Satış Sözleşmesi`  [EXTRACTED]
  index.html → mesafeli-satis-sozlesmesi.html
- `Quotarix Landing Page (index.html)` --links_to--> `Ön Bilgilendirme Formu`  [EXTRACTED]
  index.html → on-bilgilendirme.html

## Hyperedges (group relationships)
- **SaaS & E-Ticaret Yasal Uyumluluk Paketi** — legal_kvkk, legal_privacy_policy, legal_terms_of_service, legal_mesafeli_satis, legal_iptal_iade, legal_on_bilgilendirme, legal_teslimat_bilgileri [EXTRACTED 1.00]
- **Quotarix Çekirdek CRM ve Teklif Yetenekleri** — feature_quick_quote, feature_smart_crm, feature_manager_dashboard, feature_ai_business_card_ocr [EXTRACTED 0.95]

## Communities (4 total, 1 thin omitted)

### Community 0 - "Quotarix Landing Page & CRM Değer Önerisi"
Cohesion: 0.18
Nodes (11): Yapay Zeka Kartvizit Tarama (OCR), Yönetici Dashboard, Akıllı CRM & Müşteri Kartı, Hero & Değer Önerisi Bölümü, İptal ve İade Politikası, Mesafeli Satış Sözleşmesi, Ön Bilgilendirme Formu, Kullanım Koşulları (TR/EN) (+3 more)

### Community 1 - "QX-WEB Laravel Multipage Mimari & Admin"
Cohesion: 0.33
Nodes (6): 11 Modüllü Quotarix Admin Panel, SEO 301 Yönlendirme Haritası, QX-WEB Laravel Multipage Mimarisi, Lazy-Load Video Facade Deseni, 15 Bölümlü Dinamik Section Toggle, Teaser Ana Sayfa Deseni (PV-WEB-016)

### Community 2 - "Pekvera Kurumsal & Yasal Uyumluluk (KVKK)"
Cohesion: 0.67
Nodes (3): Pekvera Yazılım Teknoloji A.Ş., KVKK Aydınlatma Metni, Gizlilik Politikası (TR/EN)

## Knowledge Gaps
- **16 isolated node(s):** `Hero & Değer Önerisi Bölümü`, `Forwarder Sektörel Acı Noktaları`, `Akıllı CRM & Müşteri Kartı`, `Yönetici Dashboard`, `Yapay Zeka Kartvizit Tarama (OCR)` (+11 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **1 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Quotarix Landing Page (index.html)` connect `Quotarix Landing Page & CRM Değer Önerisi` to `Pekvera Kurumsal & Yasal Uyumluluk (KVKK)`, `Sektörel Teklif & Fırsat Formu Prototipi`?**
  _High betweenness centrality (0.483) - this node is a cross-community bridge._
- **Why does `Hızlı Teklif Yönetimi Modülü` connect `Sektörel Teklif & Fırsat Formu Prototipi` to `Quotarix Landing Page & CRM Değer Önerisi`?**
  _High betweenness centrality (0.067) - this node is a cross-community bridge._
- **What connects `Hero & Değer Önerisi Bölümü`, `Forwarder Sektörel Acı Noktaları`, `Akıllı CRM & Müşteri Kartı` to the rest of the system?**
  _16 weakly-connected nodes found - possible documentation gaps or missing edges._