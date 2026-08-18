<section class="section" id="faq">
    <div class="container">
        <div class="text-center mb-5 fade-up">
            <span class="section-badge">SSS</span>
            <h2 class="section-title">Sıkça Sorulan Sorular</h2>
            <p class="section-subtitle mx-auto">Quotarix hakkında en çok merak edilen sorular ve yanıtları.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 fade-up">
                <div class="accordion" id="faqAccordionHome">
                    @foreach($faqs as $index => $faq)
                        <div class="accordion-item mb-3" style="border:1px solid var(--border); border-radius:14px; overflow:hidden;">
                            <h2 class="accordion-header" id="headingHome{{ $faq->id }}">
                                <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }} fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHome{{ $faq->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapseHome{{ $faq->id }}" style="font-size:16px; padding:20px 24px; color:var(--navy);">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="collapseHome{{ $faq->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="headingHome{{ $faq->id }}" data-bs-parent="#faqAccordionHome">
                                <div class="accordion-body text-secondary" style="padding:0 24px 20px 24px; font-size:15px; line-height:1.7;">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-4 pt-2">
                    <a href="{{ route('faq') }}" class="btn btn-outline-dark px-4 py-3 fw-bold" style="border-radius:12px; font-size:15px;">
                        Tüm Sıkça Sorulan Soruları Gör <i class="bi bi-arrow-right ms-2 text-teal"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
