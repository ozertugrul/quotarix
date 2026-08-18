@extends('layouts.app')

@php
    $title = $meta->title ?? 'Neden Quotarix?';
    $metaTitle = $meta->meta_title ?? 'Neden Quotarix? — Forwarder Diliyle Konuşan CRM';
    $metaDescription = $meta->meta_description ?? 'Genel CRM\'ler yerine lojistik ve forwarder iş süreçlerine özel tasarlanmış Quotarix farkını inceleyin.';
@endphp

@section('content')
<div class="py-5 bg-light-teal" style="padding-top: 140px !important;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-teal text-decoration-none">Ana Sayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Neden Quotarix?</li>
            </ol>
        </nav>
        <div class="text-center max-w-700 mx-auto">
            <span class="section-badge">Sektörel Fark</span>
            <h1 class="fw-extrabold text-navy display-5 mb-3">Neden Genel Bir CRM Değil de Quotarix?</h1>
            <p class="text-secondary fs-5">Genel CRM sistemleri lojistiğin dinamiklerini anlamaz. Quotarix, freight forwarder firmalarının navlun teklifleri ve operasyonel hafızası için sıfırdan inşa edildi.</p>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="card border-0 shadow-sm p-4 p-md-5 mb-5" style="border-radius: 24px; background: #fff;">
            <h3 class="fw-bold text-navy text-center mb-4">Genel CRM vs Quotarix Karşılaştırması</h3>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr style="border-bottom: 2px solid var(--border);">
                            <th style="width: 35%; font-size: 16px; color: var(--navy); padding: 16px;">Kriter / İhtiyaç</th>
                            <th style="width: 30%; font-size: 16px; color: #64748b; padding: 16px;">Genel CRM (HubSpot, Salesforce vs.)</th>
                            <th style="width: 35%; font-size: 16px; color: var(--teal); padding: 16px; background: rgba(14,165,165,0.06); border-radius: 12px 12px 0 0;">Quotarix Forwarder CRM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-semibold py-3">FCL, LCL, Hava Şablonları</td>
                            <td class="text-muted"><i class="bi bi-x-circle-fill text-danger me-2"></i>Yok (Özel kodlama / danışmanlık gerekir)</td>
                            <td class="fw-bold text-navy" style="background: rgba(14,165,165,0.06);"><i class="bi bi-check-circle-fill text-teal me-2"></i>Kullanıma Hazır Standart Şablonlar</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold py-3">Çoklu Döviz (USD navlun + TRY masraf)</td>
                            <td class="text-muted"><i class="bi bi-dash-circle-fill text-warning me-2"></i>Karmaşık ve ek lisans ücreti</td>
                            <td class="fw-bold text-navy" style="background: rgba(14,165,165,0.06);"><i class="bi bi-check-circle-fill text-teal me-2"></i>Teklif İçinde Çoklu Döviz Desteği</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold py-3">THC, Demurrage, Ordino Kalemleri</td>
                            <td class="text-muted"><i class="bi bi-x-circle-fill text-danger me-2"></i>Tanımsız (Elle saatlerce ayarlanır)</td>
                            <td class="fw-bold text-navy" style="background: rgba(14,165,165,0.06);"><i class="bi bi-check-circle-fill text-teal me-2"></i>Forwarder Sektörel Masraf Kütüphanesi</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold py-3">Fuar Kartvizitlerini AI ile Çekme</td>
                            <td class="text-muted"><i class="bi bi-x-circle-fill text-danger me-2"></i>Yok veya üçüncü parti pahalı eklenti</td>
                            <td class="fw-bold text-navy" style="background: rgba(14,165,165,0.06);"><i class="bi bi-check-circle-fill text-teal me-2"></i>Dahili Yapay Zeka Kartvizit Okuyucu</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold py-3">Personel Ayrıldığında Müşteri Hafızası</td>
                            <td class="text-muted"><i class="bi bi-dash-circle-fill text-warning me-2"></i>Karmaşık yetki devri</td>
                            <td class="fw-bold text-navy" style="background: rgba(14,165,165,0.06);"><i class="bi bi-check-circle-fill text-teal me-2"></i>Tek Tıkla Yeni Temsilciye Eksiksiz Devir</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold py-3">Kurulum ve Başlangıç Süresi</td>
                            <td class="text-muted"><i class="bi bi-x-circle-fill text-danger me-2"></i>Haftalar / Aylar süren eğitim</td>
                            <td class="fw-bold text-navy" style="background: rgba(14,165,165,0.06);"><i class="bi bi-check-circle-fill text-teal me-2"></i>5 Dakikada Hesap Açın, Hemen Başlayın</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card p-4 border-0 shadow-sm h-100" style="border-radius: 20px; background: #fff;">
                    <div class="feature-icon mb-3"><i class="bi bi-shield-check"></i></div>
                    <h5 class="fw-bold text-navy">Müşteriniz Şirkette Kalır</h5>
                    <p class="text-secondary">Satışçınız ayrıldığında tüm geçmiş görüşmeler, rota fiyatları ve müşteri tercihleri şirketinizin güvencesinde kalır.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 border-0 shadow-sm h-100" style="border-radius: 20px; background: #fff;">
                    <div class="feature-icon mb-3"><i class="bi bi-speedometer2"></i></div>
                    <h5 class="fw-bold text-navy">30 Saniyede Teklif</h5>
                    <p class="text-secondary">Müşteriye teklif verme hızınızı 10 katına çıkararak navlun taleplerini ilk onaylayan siz olun.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 border-0 shadow-sm h-100" style="border-radius: 20px; background: #fff;">
                    <div class="feature-icon mb-3"><i class="bi bi-phone"></i></div>
                    <h5 class="fw-bold text-navy">Yönetici Cebinde</h5>
                    <p class="text-secondary">Ekibin sahadaki performansını, verilen teklifleri ve beklenen ciroyu anlık olarak cep telefonunuzdan takip edin.</p>
                </div>
            </div>
        </div>

        <div class="p-5 text-center fade-up" style="background: linear-gradient(135deg, var(--navy), var(--navy-light)); border-radius: 24px; color: #fff;">
            <h3 class="fw-bold text-white mb-3">Quotarix ile Satışlarınızı Büyütün</h3>
            <p class="text-white-50 max-w-600 mx-auto mb-4">Ekibinizin potansiyelini ortaya çıkarın. Ücretsiz canlı demo ile hemen tanışın.</p>
            <a href="{{ route('demo') }}" class="btn btn-hero">
                <i class="bi bi-rocket-takeoff me-2"></i> Ücretsiz Demo İste
            </a>
        </div>
    </div>
</div>
@endsection
