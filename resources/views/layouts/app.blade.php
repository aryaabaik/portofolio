<!DOCTYPE html>
<html lang="id" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} — Portfolio</title>
    <meta name="description" content="Portfolio Arya Adhitya — Full Stack Developer spesialis Laravel, Vue.js dan React.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    {{-- =============================================
         ANIMATED BACKGROUND LAYERS
    ============================================= --}}

    {{-- 1. Dot grid --}}
    <div id="bg-grid" aria-hidden="true"></div>

    {{-- 2. Aurora floating orbs --}}
    <div id="bg-aurora" aria-hidden="true">
        <div class="aurora-orb aurora-orb-1"></div>
        <div class="aurora-orb aurora-orb-2"></div>
        <div class="aurora-orb aurora-orb-3"></div>
        <div class="aurora-orb aurora-orb-4"></div>
    </div>

    {{-- 3. Shooting stars canvas --}}
    <canvas id="bg-stars-canvas" aria-hidden="true"></canvas>

    {{-- 4. Floating geometric shapes --}}
    <div id="bg-shapes" aria-hidden="true">
        <div class="bg-shape bg-shape-1"></div>
        <div class="bg-shape bg-shape-2"></div>
        <div class="bg-shape bg-shape-3"></div>
        <div class="bg-shape bg-shape-4"></div>
        <div class="bg-shape bg-shape-5"></div>
    </div>

    {{-- 5. Noise texture --}}
    <div class="noise-overlay" aria-hidden="true"></div>

    {{-- Custom Cursor --}}
    <div id="cursor-dot"></div>
    <div id="cursor-ring"></div>
    <div id="cursor-glow" aria-hidden="true"></div>

    {{-- Scroll Progress --}}
    <div id="scroll-progress" style="width:0%"></div>

    {{-- Scroll to Top --}}
    <button id="scroll-top" aria-label="Kembali ke atas" title="Kembali ke atas">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="18 15 12 9 6 15"></polyline>
        </svg>
    </button>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" role="dialog" aria-modal="true" aria-label="Menu navigasi">
        <button id="mobile-close" aria-label="Tutup menu"
                style="position:absolute;top:1.5rem;right:1.5rem;color:#64748b;background:none;border:none;cursor:pointer;padding:0.5rem;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        <a href="#about" class="mobile-nav-link">About</a>
        <a href="#skills" class="mobile-nav-link">Skills</a>
        <a href="#projects" class="mobile-nav-link">Projects</a>
        <a href="#experience" class="mobile-nav-link">Experience</a>
        <a href="#contact" class="mobile-nav-link">Contact</a>
    </div>

    {{-- Navbar --}}
    <header id="navbar" class="fixed top-0 w-full z-50 transition-all duration-300" style="padding: 1.25rem 2rem;">
        <nav class="max-w-6xl mx-auto flex items-center justify-between">
            {{-- Logo --}}
            <a href="/" class="font-bold text-base tracking-tight" style="font-family:'Syne',sans-serif;">
                <span class="gradient-text">{{ config('app.name') }}</span>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-8">
                <a href="#about"      class="nav-link" data-section="about">About</a>
                <a href="#skills"     class="nav-link" data-section="skills">Skills</a>
                <a href="#projects"   class="nav-link" data-section="projects">Projects</a>
                <a href="#experience" class="nav-link" data-section="experience">Experience</a>
                <a href="#contact"    class="nav-link" data-section="contact">Contact</a>
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3">
                <button id="theme-toggle" onclick="toggleTheme()" aria-label="Toggle tema"
                        class="w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-200"
                        style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);">
                    <span id="theme-icon-sun" class="hidden">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round">
                            <circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/>
                            <line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                            <line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
                        </svg>
                    </span>
                    <span id="theme-icon-moon">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" stroke-linecap="round">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                        </svg>
                    </span>
                </button>

                {{-- Hamburger --}}
                <button id="hamburger" aria-label="Buka menu" class="md:hidden w-9 h-9 flex items-center justify-center rounded-lg transition"
                        style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" stroke-linecap="round">
                        <line x1="3" y1="6" x2="21" y2="6"/>
                        <line x1="3" y1="12" x2="21" y2="12"/>
                        <line x1="3" y1="18" x2="21" y2="18"/>
                    </svg>
                </button>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer style="border-top:1px solid rgba(255,255,255,0.05);padding:3rem 2rem;">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
            <span class="font-bold gradient-text text-sm" style="font-family:'Syne',sans-serif;">{{ config('app.name') }}</span>
            <p class="text-sm" style="color:#334155;">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <div class="flex gap-5">
                <a href="https://github.com" target="_blank" class="nav-link text-xs">GitHub</a>
                <a href="https://linkedin.com" target="_blank" class="nav-link text-xs">LinkedIn</a>
                <a href="#contact" class="nav-link text-xs">Contact</a>
            </div>
        </div>
    </footer>

<script>
/* ---- THEME ---- */
const root = document.documentElement;

function applyTheme(theme) {
    if (theme === 'light') {
        root.classList.add('light-mode');
        document.getElementById('theme-icon-sun').classList.remove('hidden');
        document.getElementById('theme-icon-moon').classList.add('hidden');
    } else {
        root.classList.remove('light-mode');
        document.getElementById('theme-icon-sun').classList.add('hidden');
        document.getElementById('theme-icon-moon').classList.remove('hidden');
    }
    localStorage.setItem('theme', theme);
}

function toggleTheme() {
    const current = localStorage.getItem('theme') || 'dark';
    applyTheme(current === 'dark' ? 'light' : 'dark');
}

applyTheme(localStorage.getItem('theme') || 'dark');

/* ---- CURSOR & SPOTLIGHT PARALLAX ---- */
const dot  = document.getElementById('cursor-dot');
const ring = document.getElementById('cursor-ring');
const glow = document.getElementById('cursor-glow');
const orbs = document.querySelectorAll('.aurora-orb');

let mx = window.innerWidth / 2;
let my = window.innerHeight / 2;
let rx = mx, ry = my;
let gx = mx, gy = my;
let px = 0, py = 0;

document.addEventListener('mousemove', e => {
    mx = e.clientX;
    my = e.clientY;
    dot.style.left  = mx + 'px';
    dot.style.top   = my + 'px';
});

(function animCursorAndOrbs() {
    // Easing for ring
    rx += (mx - rx) * 0.12;
    ry += (my - ry) * 0.12;
    ring.style.left = rx + 'px';
    ring.style.top  = ry + 'px';

    // Easing for ambient spotlight
    gx += (mx - gx) * 0.08;
    gy += (my - gy) * 0.08;
    if (glow) {
        glow.style.transform = `translate3d(${gx}px, ${gy}px, 0) translate(-50%, -50%)`;
    }

    // Easing for 3D Aurora Parallax
    const targetPx = (mx - window.innerWidth / 2) * 0.06;
    const targetPy = (my - window.innerHeight / 2) * 0.06;
    px += (targetPx - px) * 0.05;
    py += (targetPy - py) * 0.05;

    orbs.forEach((orb, i) => {
        const factor = (i + 1) * 0.4;
        orb.style.transform = `translate3d(${px * factor}px, ${py * factor}px, 0)`;
    });

    requestAnimationFrame(animCursorAndOrbs);
})();

document.querySelectorAll('a,button,[data-cursor]').forEach(el => {
    el.addEventListener('mouseenter', () => ring.classList.add('hovering'));
    el.addEventListener('mouseleave', () => ring.classList.remove('hovering'));
});

/* ---- SCROLL PROGRESS ---- */
const progress  = document.getElementById('scroll-progress');
const scrollTop = document.getElementById('scroll-top');

window.addEventListener('scroll', () => {
    const pct = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
    progress.style.width = pct + '%';

    // Scroll to top visibility
    if (window.scrollY > 400) scrollTop.classList.add('visible');
    else                       scrollTop.classList.remove('visible');

    // Navbar glass effect
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 60) {
        navbar.style.background    = 'rgba(3,7,18,0.88)';
        navbar.style.backdropFilter = 'blur(16px)';
        navbar.style.borderBottom  = '1px solid rgba(255,255,255,0.05)';
        navbar.style.padding       = '0.75rem 2rem';
    } else {
        navbar.style.background    = 'transparent';
        navbar.style.backdropFilter = 'none';
        navbar.style.borderBottom  = 'none';
        navbar.style.padding       = '1.25rem 2rem';
    }

    // Active nav section highlight
    const sections = ['about','skills','projects','experience','contact'];
    sections.forEach(id => {
        const sec = document.getElementById(id);
        if (!sec) return;
        const top = sec.getBoundingClientRect().top;
        const link = document.querySelector(`.nav-link[data-section="${id}"]`);
        if (!link) return;
        if (top <= 120 && top > -sec.offsetHeight + 120) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
}, { passive: true });

scrollTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

/* ---- MOBILE MENU ---- */
const hamburger   = document.getElementById('hamburger');
const mobileMenu  = document.getElementById('mobile-menu');
const mobileClose = document.getElementById('mobile-close');

hamburger.addEventListener('click', () => mobileMenu.classList.add('open'));
mobileClose.addEventListener('click', () => mobileMenu.classList.remove('open'));
document.querySelectorAll('.mobile-nav-link').forEach(link => {
    link.addEventListener('click', () => mobileMenu.classList.remove('open'));
});

/* ---- SCROLL REVEAL ---- */
const revealObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('revealed');
        }
    });
}, { threshold: 0.12 });

document.querySelectorAll('[data-reveal]').forEach(el => revealObserver.observe(el));

/* ---- INTERACTIVE GRAPHICS ENGINE (CANVAS) ---- */
(function() {
    const canvas = document.getElementById('bg-stars-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    let W, H;
    
    const staticStars = [];
    const particles = [];
    const shootingStars = [];
    const bursts = [];

    function resize() {
        W = canvas.width  = window.innerWidth;
        H = canvas.height = window.innerHeight;
    }

    // Initialize stars (deep sky twinkling)
    function initStars() {
        staticStars.length = 0;
        const count = Math.floor((W * H) / 5000);
        for (let i = 0; i < count; i++) {
            staticStars.push({
                x: Math.random() * W,
                y: Math.random() * H,
                r: Math.random() * 0.9 + 0.1,
                a: Math.random(),
                speed: Math.random() * 0.007 + 0.002,
                phase: Math.random() * Math.PI * 2,
                color: Math.random() > 0.85 ? 'rgba(6,182,212,' : Math.random() > 0.7 ? 'rgba(129,140,248,' : 'rgba(148,163,184,'
            });
        }
    }

    // Initialize constellation network particles
    function initParticles() {
        particles.length = 0;
        const count = Math.min(90, Math.max(35, Math.floor((W * H) / 14000)));
        for (let i = 0; i < count; i++) {
            particles.push({
                x: Math.random() * W,
                y: Math.random() * H,
                vx: (Math.random() - 0.5) * 0.35,
                vy: (Math.random() - 0.5) * 0.35,
                r: Math.random() * 1.5 + 0.8,
                baseAlpha: Math.random() * 0.3 + 0.15,
                color: Math.random() > 0.7 ? '#06b6d4' : Math.random() > 0.4 ? '#818cf8' : '#3b82f6'
            });
        }
    }

    function spawnShootingStar() {
        const angle = (Math.random() * 25 + 15) * (Math.PI / 180);
        const startX = Math.random() * W * 1.5 - W * 0.25;
        const startY = Math.random() * H * 0.4 - 50;
        shootingStars.push({
            x: startX, y: startY,
            vx: Math.cos(angle) * (5 + Math.random() * 5),
            vy: Math.sin(angle) * (5 + Math.random() * 5),
            len: 90 + Math.random() * 100,
            a: 1.0,
            fade: 0.01 + Math.random() * 0.008,
            w: 1.0 + Math.random() * 0.8
        });
    }

    // Spawn particle burst on click
    window.addEventListener('click', e => {
        // Cek apakah klik pada tautan atau tombol interaktif
        if (e.target.closest('a, button, [role="button"]')) return;
        
        const count = 12;
        const colors = ['#3b82f6', '#06b6d4', '#d946ef', '#6366f1'];
        const selectedColor = colors[Math.floor(Math.random() * colors.length)];
        for (let i = 0; i < count; i++) {
            const angle = Math.random() * Math.PI * 2;
            const speed = 1.0 + Math.random() * 2.8;
            bursts.push({
                x: e.clientX,
                y: e.clientY,
                vx: Math.cos(angle) * speed,
                vy: Math.sin(angle) * speed,
                r: 1.5 + Math.random() * 2.2,
                a: 1.0,
                color: selectedColor,
                decay: 0.012 + Math.random() * 0.012
            });
        }
    });

    let frame = 0;
    function draw() {
        ctx.clearRect(0, 0, W, H);
        frame++;

        const isLight = document.documentElement.classList.contains('light-mode');

        // 1. Static Twinkling Stars (only in dark mode)
        if (!isLight) {
            staticStars.forEach(s => {
                s.phase += s.speed;
                const twinkle = (Math.sin(s.phase) + 1) / 2;
                const alpha = 0.05 + twinkle * s.a * 0.65;
                ctx.beginPath();
                ctx.arc(s.x, s.y, s.r, 0, Math.PI * 2);
                ctx.fillStyle = s.color + alpha + ')';
                ctx.fill();
            });
        }

        // 2. Constellation Network Particles & Connections
        particles.forEach(p => {
            // Drift movement
            p.x += p.vx;
            p.y += p.vy;

            // Bounce boundary
            if (p.x < 0 || p.x > W) p.vx *= -1;
            if (p.y < 0 || p.y > H) p.vy *= -1;

            // Gentle push field from mouse pointer
            const dx = p.x - mx;
            const dy = p.y - my;
            const dist = Math.sqrt(dx * dx + dy * dy);
            if (dist < 180) {
                const force = (180 - dist) / 180;
                const angle = Math.atan2(dy, dx);
                // Apply a smooth repelling push
                p.x += Math.cos(angle) * force * 1.6;
                p.y += Math.sin(angle) * force * 1.6;
            }

            // Draw particle
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = p.color;
            ctx.globalAlpha = isLight ? p.baseAlpha * 0.45 : p.baseAlpha;
            ctx.fill();
            ctx.globalAlpha = 1.0; // reset
        });

        // Drawing connections
        for (let i = 0; i < particles.length; i++) {
            const p1 = particles[i];
            for (let j = i + 1; j < particles.length; j++) {
                const p2 = particles[j];
                const dx = p1.x - p2.x;
                const dy = p1.y - p2.y;
                const dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < 130) {
                    const alpha = ((130 - dist) / 130) * 0.18;
                    ctx.beginPath();
                    ctx.moveTo(p1.x, p1.y);
                    ctx.lineTo(p2.x, p2.y);
                    ctx.strokeStyle = isLight ? `rgba(59, 130, 246, ${alpha * 0.5})` : `rgba(6, 182, 212, ${alpha})`;
                    ctx.lineWidth = 0.5;
                    ctx.stroke();
                }
            }
        }

        // 3. Click Burst Particles
        for (let i = bursts.length - 1; i >= 0; i--) {
            const b = bursts[i];
            b.x += b.vx;
            b.y += b.vy;
            b.a -= b.decay;

            if (b.a <= 0) {
                bursts.splice(i, 1);
                continue;
            }

            ctx.beginPath();
            ctx.arc(b.x, b.y, b.r, 0, Math.PI * 2);
            ctx.fillStyle = b.color;
            ctx.globalAlpha = b.a;
            ctx.fill();
            ctx.globalAlpha = 1.0;
        }

        // 4. Shooting Stars (Dark mode only)
        if (!isLight) {
            for (let i = shootingStars.length - 1; i >= 0; i--) {
                const s = shootingStars[i];
                const grad = ctx.createLinearGradient(
                    s.x - s.vx * (s.len / 8), s.y - s.vy * (s.len / 8),
                    s.x, s.y
                );
                grad.addColorStop(0, `rgba(255,255,255,0)`);
                grad.addColorStop(1, `rgba(255,255,255,${s.a * 0.85})`);
                
                ctx.beginPath();
                ctx.moveTo(s.x - s.vx * (s.len / 8), s.y - s.vy * (s.len / 8));
                ctx.lineTo(s.x, s.y);
                ctx.strokeStyle = grad;
                ctx.lineWidth = s.w;
                ctx.stroke();

                s.x += s.vx;
                s.y += s.vy;
                s.a -= s.fade;
                if (s.a <= 0) shootingStars.splice(i, 1);
            }

            if (frame % 250 === 0 && Math.random() > 0.4) spawnShootingStar();
            if (frame % 400 === 0 && Math.random() > 0.6) spawnShootingStar();
        }

        requestAnimationFrame(draw);
    }

    window.addEventListener('resize', () => {
        resize();
        initStars();
        initParticles();
    });
    
    resize();
    initStars();
    initParticles();
    draw();

    // Spawn first shooting stars on load
    setTimeout(spawnShootingStar, 1000);
    setTimeout(spawnShootingStar, 3200);
})();
</script>
</body>
</html>