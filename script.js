  // Transparência do Header
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('nav');
            nav.style.backgroundColor = window.scrollY > 100 ? '#111' : 'transparent';
        });

        // Autoplay dos vídeos
        const videos = document.querySelectorAll('.meu-video');
        videos.forEach(v => {
            v.addEventListener('mouseenter', () => v.play().catch(e => {}));
            v.addEventListener('mouseleave', () => v.pause());
        });

        // Acordeão do FAQ
        const faqItems = document.querySelectorAll('.faq-item');
        faqItems.forEach(item => {
            item.querySelector('.faq-question').addEventListener('click', () => {
                faqItems.forEach(oi => oi !== item && oi.classList.remove('active'));
                item.classList.toggle('active');
            });
        });
