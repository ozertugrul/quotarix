/**
 * Quotarix - Eski Anchor Yönlendirme ve Akıllı Scroll Yönetimi
 * (QX-WEB-003 - pekvera deseni)
 */
(function() {
    const anchorMap = {
        '#features': '/ozellikler',
        '#problem': '#problem',
        '#why': '/neden-quotarix',
        '#manager': '#manager',
        '#roadmap': '/yol-haritasi',
        '#pricing': '/fiyatlandirma',
        '#testimonials': '/#testimonials',
        '#blog': '/blog',
        '#faq': '/sss',
        '#cta': '/demo',
        '#contact': '/iletisim'
    };

    function handleHash() {
        const hash = window.location.hash;
        if (!hash) return;

        const isHome = window.location.pathname === '/' || window.location.pathname === '';
        const targetElement = document.querySelector(hash);

        // Eğer ana sayfadaysak ve bölüm sayfada aktif olarak bulunuyorsa oraya kaydır
        if (isHome && targetElement) {
            setTimeout(function() {
                targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
            return;
        }

        // Bölüm sayfada yoksa veya başka sayfadaysak eşleşen yeni multipage rotasına yönlendir
        if (anchorMap[hash] && anchorMap[hash] !== hash) {
            window.location.href = anchorMap[hash];
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', handleHash);
    } else {
        handleHash();
    }

    window.addEventListener('hashchange', handleHash);
})();
