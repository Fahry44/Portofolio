/**
 * ══════════════════════════════════════════════════════
 * FAHRI PORTFOLIO — app.js
 * Ultra Modern Futuristic Minimalist — 2026
 * ══════════════════════════════════════════════════════
 */

import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {

    // ══════════════════════════════════════════════════
    // 1. LOADING SCREEN
    // ══════════════════════════════════════════════════
    const loader = document.getElementById('loader');

    if (loader) {
        // Sembunyikan loader setelah 2.3 detik
        setTimeout(() => {
            loader.classList.add('hidden');
        }, 2300);
    }


    // ══════════════════════════════════════════════════
    // 2. CUSTOM CURSOR
    // ══════════════════════════════════════════════════
    const cursorDot  = document.getElementById('cursor-dot');
    const cursorRing = document.getElementById('cursor-ring');

    if (cursorDot && cursorRing) {
        let mouseX = 0, mouseY = 0;
        let ringX  = 0, ringY  = 0;

        // Update posisi dot & mouse glow langsung
        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;

            // Dot — langsung mengikuti mouse
            cursorDot.style.left = (mouseX - 3) + 'px';
            cursorDot.style.top  = (mouseY - 3) + 'px';

            // Mouse glow
            const glow = document.getElementById('mouse-glow');
            if (glow) {
                glow.style.left = mouseX + 'px';
                glow.style.top  = mouseY + 'px';
            }
        });

        // Ring — mengikuti dengan smooth lag
        function animateRing() {
            const lerpFactor = 0.11;
            ringX += (mouseX - ringX - 18) * lerpFactor;
            ringY += (mouseY - ringY - 18) * lerpFactor;

            cursorRing.style.left = ringX + 'px';
            cursorRing.style.top  = ringY + 'px';

            requestAnimationFrame(animateRing);
        }
        animateRing();

        // Sembunyikan cursor di luar window
        document.addEventListener('mouseleave', () => {
            cursorDot.style.opacity  = '0';
            cursorRing.style.opacity = '0';
        });

        document.addEventListener('mouseenter', () => {
            cursorDot.style.opacity  = '1';
            cursorRing.style.opacity = '1';
        });
    }


    // ══════════════════════════════════════════════════
    // 3. SCROLL PROGRESS BAR
    // ══════════════════════════════════════════════════
    const progressBar = document.getElementById('progress');

    if (progressBar) {
        window.addEventListener('scroll', () => {
            const scrollTop    = window.scrollY;
            const docHeight    = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
            progressBar.style.width = scrollPercent + '%';
        }, { passive: true });
    }


    // ══════════════════════════════════════════════════
    // 4. NAVBAR — SCROLL EFFECT
    // ══════════════════════════════════════════════════
    const navbar = document.getElementById('navbar');

    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 60) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        }, { passive: true });
    }


    // ══════════════════════════════════════════════════
    // 5. SCROLL REVEAL — Intersection Observer
    // ══════════════════════════════════════════════════
    const revealElements = document.querySelectorAll('.reveal');

    if (revealElements.length > 0) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    // Stagger delay untuk elemen berturut-turut
                    const delay = index * 80;
                    setTimeout(() => {
                        entry.target.classList.add('visible');
                    }, delay);
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -40px 0px'
        });

        revealElements.forEach(el => revealObserver.observe(el));
    }


    // ══════════════════════════════════════════════════
    // 6. STATS COUNT-UP ANIMATION
    // ══════════════════════════════════════════════════
    function countUp(element, target, suffix, duration = 1600) {
        if (!element) return;

        let startTime = null;
        const startValue = 0;

        function step(timestamp) {
            if (!startTime) startTime = timestamp;
            const elapsed  = timestamp - startTime;
            const progress = Math.min(elapsed / duration, 1);

            // Easing out cubic
            const eased   = 1 - Math.pow(1 - progress, 3);
            const current = Math.floor(startValue + (target - startValue) * eased);

            element.innerHTML = current + '<span>' + suffix + '</span>';

            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                element.innerHTML = target + '<span>' + suffix + '</span>';
            }
        }

        requestAnimationFrame(step);
    }

    const statsSection = document.querySelector('.stats-section');

    if (statsSection) {
        let statsAnimated = false;

        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !statsAnimated) {
                    statsAnimated = true;

                    // Ambil target dari data attribute
                    const statElements = [
                        { id: 's1', target: 24, suffix: '+' },
                        { id: 's2', target: 15, suffix: '+' },
                        { id: 's3', target: 3,  suffix: 'yrs' },
                        { id: 's4', target: 100, suffix: '%' },
                    ];

                    statElements.forEach((stat, i) => {
                        setTimeout(() => {
                            const el = document.getElementById(stat.id);
                            countUp(el, stat.target, stat.suffix, 1600);
                        }, i * 150);
                    });

                    statsObserver.disconnect();
                }
            });
        }, { threshold: 0.4 });

        statsObserver.observe(statsSection);
    }


    // ══════════════════════════════════════════════════
    // 7. PARALLAX MOUSE EFFECT — Hero Photo
    // ══════════════════════════════════════════════════
    const heroPhoto = document.querySelector('.hero-photo-frame');

    if (heroPhoto) {
        document.addEventListener('mousemove', (e) => {
            const centerX = window.innerWidth  / 2;
            const centerY = window.innerHeight / 2;

            const deltaX = (e.clientX - centerX) / centerX;
            const deltaY = (e.clientY - centerY) / centerY;

            const maxTilt = 6; // derajat maksimum tilt

            heroPhoto.style.transform = `
                perspective(800px)
                rotateY(${deltaX * maxTilt}deg)
                rotateX(${-deltaY * maxTilt}deg)
                translateZ(10px)
            `;
        });

        // Reset saat mouse keluar
        document.addEventListener('mouseleave', () => {
            heroPhoto.style.transform = 'perspective(800px) rotateY(0deg) rotateX(0deg) translateZ(0)';
            heroPhoto.style.transition = 'transform 0.6s ease';
        });

        document.addEventListener('mouseenter', () => {
            heroPhoto.style.transition = 'transform 0.1s linear';
        });
    }


    // ══════════════════════════════════════════════════
    // 8. WORK CARD — Spotlight Hover Effect
    // ══════════════════════════════════════════════════
    const workCards = document.querySelectorAll('.work-card, .bento-card, .process-card');

    workCards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect    = card.getBoundingClientRect();
            const x       = e.clientX - rect.left;
            const y       = e.clientY - rect.top;
            const centerX = rect.width  / 2;
            const centerY = rect.height / 2;

            const rotateX = ((y - centerY) / centerY) * -4;
            const rotateY = ((x - centerX) / centerX) *  4;

            card.style.transform = `
                translateY(-5px)
                perspective(600px)
                rotateX(${rotateX}deg)
                rotateY(${rotateY}deg)
            `;

            // Spotlight gradient
            card.style.background = `
                radial-gradient(circle at ${x}px ${y}px, rgba(0,255,135,0.06), transparent 60%),
                #111111
            `;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform  = '';
            card.style.background = '';
            card.style.transition = 'all 0.5s ease';
        });

        card.addEventListener('mouseenter', () => {
            card.style.transition = 'transform 0.1s linear, background 0.1s linear, border-color 0.4s ease';
        });
    });


    // ══════════════════════════════════════════════════
    // 9. TEXT REVEAL — Smooth Letter Animation (Hero H1)
    // ══════════════════════════════════════════════════
    // Sudah ditangani via CSS animation dengan delay


    // ══════════════════════════════════════════════════
    // 10. SMOOTH SCROLL — untuk semua anchor links
    // ══════════════════════════════════════════════════
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', (e) => {
            const href = anchor.getAttribute('href');
            if (href === '#') return;

            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });


    // ══════════════════════════════════════════════════
    // 11. MARQUEE — Pause on hover (sudah via CSS)
    //     Extra: tambahkan pointer cursor on hover
    // ══════════════════════════════════════════════════
    const marqueeSection = document.querySelector('.marquee-section');
    if (marqueeSection) {
        marqueeSection.addEventListener('mouseenter', () => {
            marqueeSection.style.cursor = 'default';
        });
    }


    // ══════════════════════════════════════════════════
    // 12. FLOATING DOCK — Hide on scroll up fast, show on stop
    // ══════════════════════════════════════════════════
    const dock = document.querySelector('.dock');
    if (dock) {
        let lastScrollY  = window.scrollY;
        let scrollTimer  = null;
        let dockVisible  = true;

        window.addEventListener('scroll', () => {
            const currentScrollY = window.scrollY;
            const scrollingDown  = currentScrollY > lastScrollY;
            const scrollDelta    = Math.abs(currentScrollY - lastScrollY);

            // Sembunyikan saat scroll down cepat (delta > 8)
            if (scrollingDown && scrollDelta > 8 && currentScrollY > 200) {
                if (dockVisible) {
                    dock.style.transform   = 'translateX(-50%) translateY(100px)';
                    dock.style.opacity     = '0';
                    dock.style.transition  = 'all 0.4s ease';
                    dockVisible = false;
                }
            }

            // Tampilkan saat scroll berhenti
            clearTimeout(scrollTimer);
            scrollTimer = setTimeout(() => {
                if (!dockVisible) {
                    dock.style.transform  = 'translateX(-50%) translateY(0)';
                    dock.style.opacity    = '1';
                    dock.style.transition = 'all 0.5s ease';
                    dockVisible = true;
                }
            }, 400);

            lastScrollY = currentScrollY;
        }, { passive: true });
    }

});
