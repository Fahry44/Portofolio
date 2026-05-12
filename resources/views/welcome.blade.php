<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | Fahri</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Syne:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    {{-- ════════════════════════════════════
         LOADING SCREEN
    ════════════════════════════════════ --}}
    <div id="loader">
        <div class="loader-logo">Fahri.</div>
        <div class="loader-bar-wrap">
            <div class="loader-bar"></div>
        </div>
        <div class="loader-count">Loading — 2026</div>
    </div>

    {{-- ════════════════════════════════════
         CURSOR
    ════════════════════════════════════ --}}
    <div id="cursor-dot"></div>
    <div id="cursor-ring"></div>

    {{-- ════════════════════════════════════
         BACKGROUND EFFECTS
    ════════════════════════════════════ --}}
    <div id="noise"></div>
    <div id="grid-bg"></div>
    <div id="mouse-glow"></div>
    <div class="blob" id="blob1"></div>
    <div class="blob" id="blob2"></div>
    <div class="blob" id="blob3"></div>

    {{-- Scroll Progress Bar --}}
    <div id="progress"></div>

    {{-- ════════════════════════════════════
         NAVBAR
    ════════════════════════════════════ --}}
    <nav id="navbar">
        <div class="nav-logo">Fahri.</div>
        <ul class="nav-links">
            <li><a href="#works">Works</a></li>
            <li><a href="#process">Process</a></li>
            <li><a href="#about">About</a></li>
        </ul>
        <button class="nav-cta" onclick="document.getElementById('footer-section').scrollIntoView({behavior:'smooth'})">
            Contact
        </button>
    </nav>

    {{-- ════════════════════════════════════
         HERO SECTION
    ════════════════════════════════════ --}}
    <section id="hero">
        <div class="hero-badge">
            <span class="dot"></span>
            Available for work
        </div>

        <p class="hero-sub">Hi, I'm Fahri</p>

        <h1 class="hero-h1">
            Creative<br>
            <span class="accent">Developer</span>
        </h1>

        <p class="hero-desc">
            Building digital experiences that feel as good as they look —
            where clean code meets refined aesthetics.
        </p>

        <div class="hero-btns">
            <a href="#works" class="btn-primary">
                View Work <span class="btn-arrow">↗</span>
            </a>
            <a href="{{ asset('cv/fahri-cv.pdf') }}" class="btn-outline" target="_blank">
                Download CV
            </a>
        </div>

        {{-- PHOTO - jangan diubah sesuai permintaan --}}
        <div class="hero-photo-wrap" id="about">
            <div class="hero-photo-frame">
                <div class="photo-glow"></div>
                <img src="{{ asset('img/fahri.png') }}"
                     alt="Fahri"
                     class="hero-photo-img">
                <div class="photo-badge">
                    <div class="badge-label">Based in</div>
                    <div class="badge-val">Indonesia 🇮🇩</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ════════════════════════════════════
         MARQUEE — TECH STACK
    ════════════════════════════════════ --}}
    <div class="marquee-section">
        <div class="marquee-track">
            @php
                $techStack = ['React', 'Laravel', 'Tailwind CSS', 'Figma', 'GSAP', 'Three.js', 'TypeScript', 'Framer Motion', 'MySQL', 'Node.js', 'PHP', 'Vite'];
            @endphp
            {{-- duplicate for seamless loop --}}
            @foreach(array_merge($techStack, $techStack) as $tech)
                <span class="marquee-item">
                    <span class="marquee-dot"></span>
                    {{ $tech }}
                </span>
            @endforeach
        </div>
    </div>

    {{-- ════════════════════════════════════
         STATS SECTION
    ════════════════════════════════════ --}}
    <div class="stats-section">
        <div class="stats-inner">
            <div class="stat-item reveal">
                <div class="stat-n" id="s1" data-target="24" data-suffix="+">0<span>+</span></div>
                <p>Projects Completed</p>
            </div>
            <div class="stat-item reveal">
                <div class="stat-n" id="s2" data-target="15" data-suffix="+">0<span>+</span></div>
                <p>Happy Clients</p>
            </div>
            <div class="stat-item reveal">
                <div class="stat-n" id="s3" data-target="3" data-suffix="yrs">0<span>yrs</span></div>
                <p>Years Experience</p>
            </div>
            <div class="stat-item reveal">
                <div class="stat-n" id="s4" data-target="100" data-suffix="%">0<span>%</span></div>
                <p>Client Satisfaction</p>
            </div>
        </div>
    </div>

    {{-- ════════════════════════════════════
         BENTO GRID — ABOUT
    ════════════════════════════════════ --}}
    <div class="bento-section">
        <div class="section-header reveal">
            <p class="section-label">// About Me</p>
            <h2 class="section-title">
                Developer with a<br>
                <span class="italic">design soul.</span>
            </h2>
        </div>

        <div class="bento-grid">
            <div class="bento-card span2 reveal">
                <span class="card-num">01</span>
                <h3>Full-Stack Developer</h3>
                <p>I craft end-to-end digital products — from pixel-perfect interfaces to robust backend systems. Every line of code is written with intention and purpose.</p>
            </div>

            <div class="bento-card bento-accent reveal">
                <div class="stat-big">3</div>
                <div class="stat-label">Years building<br>on the web</div>
            </div>

            <div class="bento-card reveal">
                <h3>UI/UX Design</h3>
                <p>Design is where function meets emotion. I create interfaces that feel as natural as they are beautiful.</p>
            </div>

            <div class="bento-card reveal">
                <h3>Roblox Dev</h3>
                <p>Building immersive 3D social experiences in Lua with complex game systems and world design.</p>
            </div>

            <div class="bento-card reveal">
                <h3>Open to Collab</h3>
                <p>Looking for freelance projects, internships, and long-term collaboration with creative teams.</p>
            </div>
        </div>
    </div>

    {{-- Beam Divider --}}
    <div class="beam-divider">
        <div class="beam-border"></div>
    </div>

    {{-- ════════════════════════════════════
         WORKS / PORTFOLIO
    ════════════════════════════════════ --}}
    <div class="works-section" id="works">
        <div class="works-header reveal">
            <div>
                <p class="section-label">// Portfolio</p>
                <h2 class="section-title">
                    Selected <span class="italic">Works</span>
                </h2>
            </div>
            <p class="works-desc">
                Curated projects built with a focus on UI/UX craft,
                performance, and clean architecture.
            </p>
        </div>

        <div class="works-grid">
            {{-- Card 1 --}}
            <div class="work-card reveal">
                <div class="work-img">
                    <div class="work-img-inner work-img-1">
                        <span class="work-img-label">Library</span>
                    </div>
                    <div class="work-overlay">
                        <div class="work-overlay-btn">View Detail</div>
                    </div>
                </div>
                <div class="work-meta">
                    <h3>Perpustakaan Fahri</h3>
                    <div class="work-tags">
                        <span class="tag">Laravel 10</span>
                        <span class="tag">Tailwind</span>
                        <span class="tag">MySQL</span>
                    </div>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="work-card reveal">
                <div class="work-img">
                    <div class="work-img-inner work-img-2">
                        <span class="work-img-label">Roblox</span>
                    </div>
                    <div class="work-overlay">
                        <div class="work-overlay-btn">View Detail</div>
                    </div>
                </div>
                <div class="work-meta">
                    <h3>Roblox Social Hangout</h3>
                    <div class="work-tags">
                        <span class="tag">Lua</span>
                        <span class="tag">3D Design</span>
                        <span class="tag">Game Dev</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ════════════════════════════════════
         PROCESS SECTION
    ════════════════════════════════════ --}}
    <div class="process-section" id="process">
        <div class="process-header reveal">
            <p class="section-label">// How I Work</p>
            <h2 class="section-title">
                My <span class="italic">Process</span>
            </h2>
        </div>

        <div class="process-grid">
            @php
                $steps = [
                    ['num' => '01', 'icon' => '🔍', 'title' => 'Discover', 'desc' => 'Deep-diving into the problem space — understanding user needs, constraints, and opportunities before touching any code.'],
                    ['num' => '02', 'icon' => '✦', 'title' => 'Design', 'desc' => 'Transforming insights into intuitive, beautiful interfaces that solve problems elegantly and create memorable experiences.'],
                    ['num' => '03', 'icon' => '🚀', 'title' => 'Deliver', 'desc' => 'Shipping production-ready products with clean, maintainable code — fast, optimized, and built to last.'],
                ];
            @endphp

            @foreach($steps as $step)
                <div class="process-card reveal">
                    <div class="process-num">{{ $step['num'] }}</div>
                    <div class="process-icon">{{ $step['icon'] }}</div>
                    <h3>{{ $step['title'] }}</h3>
                    <p>{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ════════════════════════════════════
         FOOTER
    ════════════════════════════════════ --}}
    <footer id="footer-section">
        <div class="footer-inner">
            <div class="beam-border" style="margin-bottom: 80px;"></div>

            <p class="section-label reveal">// Let's Connect</p>

            <h2 class="footer-headline reveal">
                Let's build<br>
                something <span class="footer-green">great.</span>
            </h2>

            <a href="mailto:fahri@email.com" class="btn-primary reveal" style="display:inline-flex; margin-bottom: 80px;">
                Start a project <span class="btn-arrow">↗</span>
            </a>

            <div class="footer-bottom">
                <div class="footer-links">
                    <a href="#" target="_blank">Instagram</a>
                    <a href="#" target="_blank">LinkedIn</a>
                    <a href="#" target="_blank">GitHub</a>
                </div>
                <p class="footer-copy">© {{ date('Y') }} Fahri — All Rights Reserved</p>
            </div>
        </div>
    </footer>

    {{-- ════════════════════════════════════
         FLOATING DOCK
    ════════════════════════════════════ --}}
    <div class="dock">
        <a href="#hero">Home</a>
        <div class="dock-divider"></div>
        <a href="#works">Works</a>
        <div class="dock-divider"></div>
        <a href="#process">Process</a>
        <div class="dock-divider"></div>
        <a href="#footer-section">Contact</a>
    </div>

</body>
</html>
