<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Feature;
use App\Models\Page;
use App\Models\Plan;
use App\Models\Post;
use App\Models\Testimonial;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedLegalPages();
        $this->seedMetaPages();
        $this->seedFeatures();
        $this->seedPosts();
        $this->seedFaqs();
        $this->seedPlans();
        $this->seedSampleVideosAndTestimonials();
    }

    protected function seedLegalPages(): void
    {
        $workspacePath = base_path('..');

        $legalPages = [
            [
                'key' => 'kvkk',
                'slug' => 'kvkk',
                'file' => 'kvkk.html',
                'title' => 'KVKK Aydınlatma Metni',
                'meta_title' => 'KVKK Aydınlatma Metni | Quotarix',
                'meta_description' => 'Pekvera Yazılım Teknoloji A.Ş. 6698 sayılı Kişisel Verilerin Korunması Kanunu uyarınca aydınlatma metni.',
            ],
            [
                'key' => 'privacy',
                'slug' => 'gizlilik-politikasi',
                'file' => 'privacy-policy.html',
                'title' => 'Gizlilik Politikası / Privacy Policy',
                'meta_title' => 'Gizlilik Politikası / Privacy Policy | Quotarix',
                'meta_description' => 'Quotarix mobil ve web platformu kişisel veri işleme, cihaz izinleri ve gizlilik politikası.',
            ],
            [
                'key' => 'terms',
                'slug' => 'kullanim-kosullari',
                'file' => 'terms-of-service.html',
                'title' => 'Kullanım Koşulları / Terms of Service',
                'meta_title' => 'Kullanım Koşulları / Terms of Service | Quotarix',
                'meta_description' => 'Quotarix B2B CRM ve teklif yönetim platformu kullanım koşulları ve lisans şartları.',
            ],
            [
                'key' => 'distance_sales',
                'slug' => 'mesafeli-satis-sozlesmesi',
                'file' => 'mesafeli-satis-sozlesmesi.html',
                'title' => 'Mesafeli Satış Sözleşmesi',
                'meta_title' => 'Mesafeli Satış Sözleşmesi | Quotarix',
                'meta_description' => 'app.quotarix.com SaaS abonelik hizmeti mesafeli satış sözleşmesi ve hükümleri.',
            ],
            [
                'key' => 'cancellation',
                'slug' => 'iptal-ve-iade-politikasi',
                'file' => 'iptal-iade-politikasi.html',
                'title' => 'İptal ve İade Politikası',
                'meta_title' => 'İptal ve İade Politikası | Quotarix',
                'meta_description' => 'Quotarix SaaS abonelik hizmetlerinde anında ifa, cayma hakkı ve iptal koşulları.',
            ],
            [
                'key' => 'delivery',
                'slug' => 'teslimat-bilgileri',
                'file' => 'teslimat-bilgileri.html',
                'title' => 'Teslimat Bilgileri',
                'meta_title' => 'Teslimat Bilgileri | Quotarix',
                'meta_description' => 'Quotarix dijital yazılım hizmeti anlık çevrimiçi teslimat ve hesap aktivasyon esasları.',
            ],
            [
                'key' => 'pre_information',
                'slug' => 'on-bilgilendirme',
                'file' => 'on-bilgilendirme.html',
                'title' => 'Ön Bilgilendirme Formu',
                'meta_title' => 'Ön Bilgilendirme Formu | Quotarix',
                'meta_description' => '6502 sayılı Kanun uyarınca abonelik öncesi satıcı ve hizmet temel nitelikleri ön bilgilendirme formu.',
            ],
        ];

        foreach ($legalPages as $page) {
            $filePath = $workspacePath . '/' . $page['file'];
            $bodyContent = '';

            if (file_exists($filePath)) {
                $rawHtml = file_get_contents($filePath);
                
                // If contains legal-body div, extract it
                if (preg_match('/<div class="legal-body">(.*?)<\/div>\s*(?:<footer|<\/body)/is', $rawHtml, $match)) {
                    $bodyContent = trim($match[1]);
                } elseif (preg_match('/<body[^>]*>(.*?)<\/body>/is', $rawHtml, $match)) {
                    $bodyContent = trim($match[1]);
                } else {
                    $bodyContent = trim($rawHtml);
                }

                // Enrich privacy and kvkk with exact cookie definitions
                if (in_array($page['key'], ['privacy', 'kvkk'])) {
                    $cookieSection = '<div class="cookie-policy-box mt-4 p-4" style="background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0; margin-top: 24px;">'
                        . '<h3 style="color: #0a1628; font-size: 18px; font-weight: 700; margin-bottom: 12px;">Çerez (Cookie) Politikası ve Kullanılan Çerezler</h3>'
                        . '<p style="margin-bottom: 12px;">Platformumuzda hizmetlerimizin güvenli, hızlı ve kullanıcı dostu sunulabilmesi amacıyla aşağıdaki çerezler kullanılmaktadır:</p>'
                        . '<ul style="margin-bottom: 0; padding-left: 20px; line-height: 1.7;">'
                        . '<li><strong>laravel_session:</strong> Zorunlu oturum çerezi. Kullanıcı oturumunun güvenliğini ve sürekliliğini sağlar.</li>'
                        . '<li><strong>XSRF-TOKEN:</strong> Zorunlu güvenlik çerezi. Siteler arası istek sahteciliği (CSRF) saldırılarına karşı koruma sağlar.</li>'
                        . '<li><strong>qx_consent:</strong> Tercih çerezi. Ziyaretçinin çerez onay/ret tercihini tarayıcıda saklar.</li>'
                        . '<li><strong>_ga, _ga_*:</strong> İsteğe bağlı analitik çerezleri (Google Analytics 4). Yalnızca ziyaretçi açık onay verdiğinde, IP anonimleştirme aktif olarak çalıştırılır.</li>'
                        . '</ul>'
                        . '</div>';

                    if (!str_contains($bodyContent, 'laravel_session')) {
                        $bodyContent .= $cookieSection;
                    }
                }
            }

            Page::updateOrCreate(
                ['slug' => $page['slug']],
                [
                    'key' => $page['key'],
                    'title' => $page['title'],
                    'meta_title' => $page['meta_title'],
                    'meta_description' => $page['meta_description'],
                    'body' => $bodyContent,
                    'is_active' => true,
                ]
            );
        }
    }

    protected function seedMetaPages(): void
    {
        $metaPages = [
            [
                'key' => 'home',
                'slug' => 'home',
                'title' => 'Ana Sayfa',
                'meta_title' => 'Quotarix | Forwarder Satış Ekibiniz İçin CRM — Müşteriniz Şirkette Kalsın',
                'meta_description' => 'Freight forwarder firmalar için satış yönetimi. Satışçı ayrılsa bile müşteri ilişkisi, ziyaretler ve teklifler şirketinizde kalır. Ekip performansını anlık görün.',
            ],
            [
                'key' => 'features_index',
                'slug' => 'ozellikler',
                'title' => 'Özellikler',
                'meta_title' => 'Özellikler — Quotarix Forwarder CRM',
                'meta_description' => 'Hızlı teklif hazırlama, akıllı CRM, yönetici dashboard\'u ve AI kartvizit tarama özelliklerini keşfedin.',
            ],
            [
                'key' => 'why',
                'slug' => 'neden-quotarix',
                'title' => 'Neden Quotarix?',
                'meta_title' => 'Neden Quotarix? — Forwarder Diliyle Konuşan CRM',
                'meta_description' => 'Genel CRM\'ler yerine lojistik ve forwarder iş süreçlerine özel tasarlanmış Quotarix farkını inceleyin.',
            ],
            [
                'key' => 'roadmap',
                'slug' => 'yol-haritasi',
                'title' => 'Yol Haritası',
                'meta_title' => 'Yol Haritası — Quotarix Gelecek Özellikler',
                'meta_description' => 'WhatsApp\'tan teklif, akıllı teklif skoru ve yakında eklenecek yenilikler.',
            ],
            [
                'key' => 'pricing',
                'slug' => 'fiyatlandirma',
                'title' => 'Fiyatlandırma',
                'meta_title' => 'Fiyatlandırma — Quotarix CRM',
                'meta_description' => 'Şeffaf ve esnek fiyatlandırma paketleri. Satış ekibinizin büyüklüğüne göre ölçekleyin.',
            ],
            [
                'key' => 'blog_index',
                'slug' => 'blog',
                'title' => 'Blog & Lojistik İpuçları',
                'meta_title' => 'Blog — Quotarix Forwarder CRM',
                'meta_description' => 'Freight forwarder ve lojistik satış ekipleri için verimlilik, satış stratejisi ve teknoloji makaleleri.',
            ],
            [
                'key' => 'faq',
                'slug' => 'sss',
                'title' => 'Sıkça Sorulan Sorular',
                'meta_title' => 'Sıkça Sorulan Sorular — Quotarix',
                'meta_description' => 'Quotarix hakkında en çok merak edilen sorular ve detaylı yanıtları.',
            ],
            [
                'key' => 'demo',
                'slug' => 'demo',
                'title' => 'Ücretsiz Demo Talep Edin',
                'meta_title' => 'Ücretsiz Demo Talep Edin — Quotarix',
                'meta_description' => '15 dakikalık canlı demo ile Quotarix\'in satış süreçlerinizi nasıl hızlandıracağını keşfedin.',
            ],
            [
                'key' => 'contact',
                'slug' => 'iletisim',
                'title' => 'İletişim',
                'meta_title' => 'İletişim — Quotarix',
                'meta_description' => 'Bizimle iletişime geçin, ekibimiz tüm sorularınızı yanıtlasın.',
            ],
        ];

        foreach ($metaPages as $page) {
            Page::updateOrCreate(
                ['key' => $page['key']],
                [
                    'slug' => $page['slug'],
                    'title' => $page['title'],
                    'meta_title' => $page['meta_title'],
                    'meta_description' => $page['meta_description'],
                    'body' => null,
                    'is_active' => true,
                ]
            );
        }
    }

    protected function seedFeatures(): void
    {
        $features = [
            [
                'slug' => 'hizli-teklif-yonetimi',
                'icon' => 'bi-file-earmark-text',
                'title' => 'Hızlı Teklif Yönetimi',
                'summary' => 'FCL, LCL, hava yolu ve kara yolu şablonlarıyla saniyeler içinde çoklu dövizli profesyonel teklifler hazırlayın ve otomatik takip hatırlatmaları kurun.',
                'body' => '<h3>Forwarder İşinize Özel Teklif Motoru</h3><p>Excel tablolarında kaybolmadan, saniyeler içinde sektöre uygun navlun, THC, demurrage kalemlerini seçerek profesyonel teklifler oluşturun. PDF olarak tek tıkla müşterinize iletin.</p><ul><li>FCL, LCL, hava yolu ve kara yolu hazır şablonları</li><li>Çoklu döviz desteği (USD, EUR, TRY, GBP)</li><li>Teklif durum takibi: Gönderildi → İnceleniyor → Onaylandı</li><li>Otomatik takip hatırlatmaları ile unutulan tekliflere son</li><li>Teklif klonlama ile saniyeler içinde revize teklif</li></ul>',
                'badge' => null,
                'sort_order' => 1,
            ],
            [
                'slug' => 'akilli-crm',
                'icon' => 'bi-people',
                'title' => 'Akıllı CRM & Müşteri Hafızası',
                'summary' => 'Müşteri görüşmeleri, rota geçmişi, notlar ve teklifler tek kartta. Satışçı ayrılsa bile müşteri ilişkisi şirketinizde kalır.',
                'body' => '<h3>Satışçınız Ayrılsa Bile Müşteri Şirkette Kalır</h3><p>Satış ekibinizin sahadaki tüm telefon görüşmeleri, ziyaret notları ve müşteri bazlı rota tercihleri tek bir akıllı müşteri kartında toplanır.</p><ul><li>Tüm müşteri teklif geçmişi ve teklif dönüşüm oranları</li><li>Görüşme notları, rota tercihleri ve dosya ekleri</li><li>Müşteri segmentasyonu: Aktif, VIP, Potansiyel, Pasif</li><li>Personel devrinde anında yeni temsilciye eksiksiz devir</li></ul>',
                'badge' => null,
                'sort_order' => 2,
            ],
            [
                'slug' => 'yonetici-dashboard',
                'icon' => 'bi-graph-up-arrow',
                'title' => 'Yönetici Dashboard & Raporlama',
                'summary' => 'Tüm ekibin tekliflerini, dönüşüm oranlarını, gelir tahminlerini ve sahadaki aktivitelerini anlık olarak cebinizden izleyin.',
                'body' => '<h3>Sahadan Anlık Bilgi Alın, Gelirinizi Öngörün</h3><p>Hangi satışçı bu ay kaç teklif verdi, kaçı kapandı, hangi müşterilere takip yapılmadı? Yönetici paneli tüm ekibin performansını gerçek zamanlı gösterir.</p><ul><li>Temsilci bazlı performans ve teklif dönüşüm karşılaştırması</li><li>Aylık beklenen ciro ve gelir tahminleme (pipeline)</li><li>1 haftadır takip edilmeyen teklifler için akıllı uyarı sistemi</li><li>Mobil uyumlu yönetici ekranları</li></ul>',
                'badge' => null,
                'sort_order' => 3,
            ],
            [
                'slug' => 'kartvizit-tarama',
                'icon' => 'bi-person-vcard',
                'title' => 'Yapay Zeka Kartvizit Tarama (OCR)',
                'summary' => 'Fuarlardan toplanan yüzlerce kartviziti tek tek girmeye son. Fotoğrafını çekin, yapay zeka saniyeler içinde müşteri kartına dönüştürsün.',
                'body' => '<h3>Fuardan 300 Kartvizit — Saniyeler İçinde Sisteme Aktarın</h3><p>Lojistik fuarlarından toplanan yüzlerce kartviziti elle Excel\'e girmek saatler alır, çoğu hiç girilmeden çekmecede kaybolur. Quotarix mobil uygulaması ile kartvizitin fotoğrafını çekin; AI isim, unvan, firma, telefon ve e-posta bilgilerini anında müşteri kartına kaydeder.</p>',
                'badge' => null,
                'sort_order' => 4,
            ],
            [
                'slug' => 'whatsapptan-teklif',
                'icon' => 'bi-whatsapp',
                'title' => 'WhatsApp\'tan Teklif Oluşturma',
                'summary' => 'Müşteriden gelen mesajı kopyalayıp yapıştırın, AI metinden yük ve rota bilgilerini çıkararak teklif taslağını 30 saniyede doldursun.',
                'body' => '<h3>WhatsApp Mesajından Anında Teklife</h3><p>Müşterinizin WhatsApp üzerinden ilettiği taşıma talebini kopyalayın; Quotarix AI çıkış limanı, varış noktası, konteyner tipi ve yük detaylarını otomatik ayrıştırarak teklif formunu doldursun.</p>',
                'badge' => 'yakinda',
                'sort_order' => 5,
            ],
            [
                'slug' => 'akilli-teklif-skoru',
                'icon' => 'bi-robot',
                'title' => 'Akıllı Teklif Skoru & Kapanma Tahmini',
                'summary' => 'Geçmiş teklif ve piyasa verilerinize dayanarak yapay zeka "bu teklif kapanır mı" skorlaması yapsın ve fiyat önerisi sunsun.',
                'body' => '<h3>Yapay Zeka Destekli Kazanma Olasılığı</h3><p>Müşterinin geçmiş onaylama alışkanlıkları, navlun seviyeleri ve rota yoğunluğuna göre her teklife bir kazanma skoru atanır; ekibiniz öncelikli fırsatlara odaklanır.</p>',
                'badge' => 'yakinda',
                'sort_order' => 6,
            ],
        ];

        foreach ($features as $feature) {
            Feature::updateOrCreate(
                ['slug' => $feature['slug']],
                [
                    'icon' => $feature['icon'],
                    'title' => $feature['title'],
                    'summary' => $feature['summary'],
                    'body' => $feature['body'],
                    'meta_title' => $feature['title'] . ' | Quotarix Forwarder CRM',
                    'meta_description' => $feature['summary'],
                    'badge' => $feature['badge'],
                    'sort_order' => $feature['sort_order'],
                    'is_active' => true,
                ]
            );
        }
    }

    protected function seedPosts(): void
    {
        $posts = [
            [
                'slug' => 'excelde-teklif-yonetimi-neden-artik-surdurulemez',
                'category' => 'Verimlilik',
                'title' => 'Excel\'de Teklif Yönetimi Neden Artık Sürdürülemez?',
                'summary' => 'Freight forwarder firmalarda Excel ile teklif yönetmenin gizli maliyetleri, kaybolan müşteri verileri ve kaçan satış fırsatları hakkında kapsamlı analiz.',
                'body' => '<p>Freight forwarder sektöründe şirketlerin %90\'ından fazlası teklif süreçlerini hâlâ Excel tablolarında yürütüyor. Ancak bu durum görünenden çok daha büyük maliyetlere ve veri kaybına yol açıyor.</p><h3>1. Satışçı Ayrılınca Müşteri Hafızası Sıfırlanıyor</h3><p>Excel tabloları genellikle satış temsilcilerinin kişisel bilgisayarlarında veya dağınık klasörlerde tutulur. Personel ayrıldığında görüşme geçmişi, geçmiş fiyat teklifleri ve müşteri notları şirket bünyesinde kalmaz.</p><h3>2. Fırsatlar Takipsiz Kalıyor</h3><p>Verilen bir teklifin 3 gün sonra aranıp takip edilmesi gerektiğinde Excel size hatırlatma yapamaz. Müşteri rakibe yöneldiğinde bunu kimse fark etmez.</p><h3>3. Sektörel CRM Çözümü</h3><p>Quotarix gibi sektöre özel geliştirilmiş CRM platformları, tüm bu süreci tek merkezde toplar ve ekibinizin satış kapatma oranını katlar.</p>',
                'author' => 'Fatih PEK',
                'published_at' => Carbon::parse('2026-04-15 10:00:00'),
            ],
            [
                'slug' => 'forwarder-satis-ekiplerinde-teklif-donusum-orani-nasil-artirilir',
                'category' => 'Satış Stratejisi',
                'title' => 'Forwarder Satış Ekiplerinde Teklif Dönüşüm Oranı Nasıl Artırılır?',
                'summary' => 'Sektördeki en başarılı forwarder firmalarının teklif takip süreçlerinden öğrendiğimiz 7 pratik strateji ile dönüşüm oranınızı artırın.',
                'body' => '<p>Forwarder satışında teklif vermek işin yalnızca başlangıcıdır. Başarı, doğru takip mekanizması ve hız ile gelir.</p><h3>1. İlk 30 Dakika Kuralı</h3><p>Gelen navlun talebine en hızlı profesyonel teklifi sunan firmaların onay alma oranı %40 daha yüksektir.</p><h3>2. Çoklu Döviz ve Net Kalemler</h3><p>Müşterinin para biriminde (USD, EUR, TRY) net ve anlaşılır kalemlerle sunulan teklifler tereddütleri ortadan kaldırır.</p><h3>3. Sistemli Takip Hatırlatıcıları</h3><p>Her teklife mutlaka 24-48 saatlik otomatik takip görevi atanmalıdır.</p>',
                'author' => 'Fatih PEK',
                'published_at' => Carbon::parse('2026-04-10 10:00:00'),
            ],
            [
                'slug' => 'yapay-zeka-lojistik-sektorunde-satis-sureclerini-nasil-donusturuyor',
                'category' => 'Teknoloji',
                'title' => 'Yapay Zeka Lojistik Sektöründe Satış Süreçlerini Nasıl Dönüştürüyor?',
                'summary' => 'AI destekli kartvizit tarama, otomatik teklif formları ve tahminleme araçlarının forwarder firmalarına sağladığı rekabet avantajları.',
                'body' => '<p>Yapay zeka teknolojileri artık sadece büyük teknoloji devlerinin değil, lojistik KOBİ\'lerinin de en büyük yardımcısı haline geldi.</p><h3>1. Kartvizitten Saniyeler İçinde Müşteriye</h3><p>OCR ve AI modelleri fuarlarda toplanan yüzlerce kartviziti saniyeler içinde CRM\'e kusursuz aktarabiliyor.</p><h3>2. Akıllı Fiyatlama ve Kazanma Tahmini</h3><p>Piyasa koşulları ve müşteri geçmişine göre teklifin kazanma olasılığı tahmin edilerek doğru strateji geliştirilebiliyor.</p>',
                'author' => 'Fatih PEK',
                'published_at' => Carbon::parse('2026-04-05 10:00:00'),
            ],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(
                ['slug' => $post['slug']],
                [
                    'category' => $post['category'],
                    'title' => $post['title'],
                    'summary' => $post['summary'],
                    'body' => $post['body'],
                    'meta_title' => $post['title'] . ' | Quotarix Blog',
                    'meta_description' => $post['summary'],
                    'author' => $post['author'],
                    'published_at' => $post['published_at'],
                    'is_active' => true,
                ]
            );
        }
    }

    protected function seedFaqs(): void
    {
        $faqs = [
            [
                'question' => 'Quotarix sadece forwarder firmalar için mi?',
                'answer' => 'Evet, Quotarix özellikle freight forwarder, lojistik ve nakliyat firmalarının satış süreçlerine özel tasarlanmıştır. FCL/LCL teklif şablonları, çoklu döviz desteği ve sektöre özel raporlama gibi özellikler genel CRM\'lerde bulunmaz.',
                'sort_order' => 1,
            ],
            [
                'question' => 'Mevcut müşteri verilerimi aktarabilir miyim?',
                'answer' => 'Evet. Excel dosyanızdaki müşteri listesini kolayca içe aktarabilirsiniz. Kurulum ekibimiz size yardımcı olur.',
                'sort_order' => 2,
            ],
            [
                'question' => 'Mobil uygulama hangi telefonlarda çalışır?',
                'answer' => 'iOS (iPhone) ve Android telefonlarda çalışır. App Store ve Google Play\'den ücretsiz indirilebilir.',
                'sort_order' => 3,
            ],
            [
                'question' => 'Verilerim güvende mi?',
                'answer' => 'Tüm verileriniz şifreli bulut sunucularda saklanır. Günlük otomatik yedekleme yapılır. KVKK uyumlu altyapı kullanıyoruz.',
                'sort_order' => 4,
            ],
            [
                'question' => 'Kurulum ne kadar sürer?',
                'answer' => '5 dakikada hesabınızı oluşturun, ekibinizi davet edin ve kullanmaya başlayın. Eğitim desteği ücretsizdir.',
                'sort_order' => 5,
            ],
            [
                'question' => 'Sözleşme zorunluluğu var mı?',
                'answer' => 'Hayır. Aylık abonelik modelimiz var, istediğiniz zaman iptal edebilirsiniz. Yıllık ödeme tercih ederseniz 2 ay ücretsiz kazanırsınız.',
                'sort_order' => 6,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                [
                    'answer' => $faq['answer'],
                    'sort_order' => $faq['sort_order'],
                    'is_active' => true,
                ]
            );
        }
    }

    protected function seedPlans(): void
    {
        $plans = [
            [
                'name' => 'Standart Plan',
                'price' => 50.00,
                'currency' => 'USD',
                'period' => 'ay / kullanıcı',
                'features_list' => [
                    'Sınırsız teklif oluşturma & takip',
                    'FCL, LCL, Hava ve Kara yolu şablonları',
                    'Müşteri & firma hafızası (CRM)',
                    'Yönetici dashboard & ekip performans raporları',
                    'Çoklu döviz desteği (USD, EUR, TRY, GBP)',
                    'PDF teklif oluşturma & e-posta gönderimi',
                    'Yapay Zeka kartvizit okuyucu (OCR)',
                    'Mobil uygulama (iOS & Android)',
                    'E-posta ve WhatsApp desteği',
                ],
                'is_featured' => true,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Kurumsal Paket',
                'price' => null,
                'currency' => 'USD',
                'period' => 'özel teklif',
                'features_list' => [
                    'Standart plandaki tüm özellikler',
                    '10+ kullanıcı için hacim indirimi',
                    'Özel ERP / muhasebe API entegrasyonu',
                    'Özel SLA & 7/24 öncelikli telefon desteği',
                    'Gelişmiş ekip rolleri ve yetkilendirme',
                    'Özel yerinde eğitim ve veri aktarım desteği',
                ],
                'is_featured' => false,
                'sort_order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($plans as $plan) {
            Plan::updateOrCreate(
                ['name' => $plan['name']],
                $plan
            );
        }
    }

    protected function seedSampleVideosAndTestimonials(): void
    {
        // Sample Testimonial (ready for when section is enabled)
        Testimonial::updateOrCreate(
            ['name' => 'Ahmet Yılmaz'],
            [
                'company' => 'TransGlobal Lojistik A.Ş.',
                'role' => 'Satış Direktörü',
                'avatar' => null,
                'quote' => 'Quotarix sayesinde satış temsilcilerimiz ayrıldığında müşteri ve teklif geçmişimiz artık şirketimizde kalıyor. Fuar kartvizitlerini sisteme girmek dakikalar alıyor.',
                'rating' => 5,
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        // Sample Video (ready for when section is enabled)
        Video::updateOrCreate(
            ['title' => 'Quotarix Tanıtım Videosu'],
            [
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'thumbnail' => null,
                'placement' => 'home',
                'sort_order' => 1,
                'is_active' => true,
            ]
        );
    }
}
