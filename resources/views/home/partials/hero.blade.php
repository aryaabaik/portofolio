<section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden" style="padding-top:5rem;">

    {{-- Animated canvas background --}}
    <canvas id="hero-canvas" aria-hidden="true"></canvas>

    {{-- Glow orbs --}}
    <div class="glow-orb" style="width:500px;height:500px;background:#3b82f6;top:-120px;left:-100px;"></div>
    <div class="glow-orb" style="width:400px;height:400px;background:#06b6d4;bottom:-100px;right:-80px;animation-delay:3s;"></div>

    <div class="relative z-10 text-center max-w-4xl mx-auto px-6">

        <div data-reveal style="margin-bottom:1.5rem;">
            <span class="section-label" style="justify-content:center;">
                Available for work
            </span>
        </div>

        <h1 data-reveal data-delay="100"
            style="font-family:'Syne',sans-serif;font-size:clamp(3rem,8vw,6rem);font-weight:800;letter-spacing:-0.03em;line-height:1.05;margin-bottom:1.5rem;">
            Arya<br>
            <span class="gradient-text">Adhitya</span>
        </h1>

        <p data-reveal data-delay="200"
           style="font-size:1.125rem;color:#475569;margin-bottom:2.5rem;min-height:1.75rem;">
            <span id="typewriter"></span><span id="cursor-blink" style="color:#3b82f6;animation:blink 1s step-end infinite;">|</span>
        </p>

        <div data-reveal data-delay="300" class="flex flex-wrap gap-4 justify-center" style="margin-bottom:3.5rem;">
            <a href="#projects" class="btn-primary">
                Lihat Portfolio
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
            <a href="#contact" class="btn-outline">Hubungi Saya</a>
        </div>

        {{-- Social links --}}
        <div data-reveal data-delay="400" class="flex justify-center gap-6" style="color:#334155;font-size:0.75rem;letter-spacing:0.08em;text-transform:uppercase;font-weight:600;">
            <a href="https://github.com" target="_blank" class="hover:text-white transition-colors duration-200">GitHub</a>
            <span style="color:#1e293b;">—</span>
            <a href="https://linkedin.com" target="_blank" class="hover:text-white transition-colors duration-200">LinkedIn</a>
            <span style="color:#1e293b;">—</span>
            <a href="mailto:hello@arya.dev" class="hover:text-white transition-colors duration-200">Email</a>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2" style="color:#1e293b;font-size:0.6875rem;letter-spacing:0.1em;text-transform:uppercase;">
        <span>Scroll</span>
        <div style="width:1px;height:40px;background:linear-gradient(to bottom,rgba(59,130,246,0.6),transparent);animation:scrollPulse 2s ease-in-out infinite;"></div>
    </div>
</section>

<style>
@keyframes blink { 0%,100%{opacity:1}50%{opacity:0} }
@keyframes scrollPulse { 0%,100%{opacity:0.3}50%{opacity:1} }
</style>

<script>
/* ---- TYPEWRITER ---- */
(function() {
    const words = ['Full Stack Developer', 'Laravel Specialist', 'UI/UX Enthusiast', 'Problem Solver'];
    let wi = 0, ci = 0, deleting = false;
    const el = document.getElementById('typewriter');

    function type() {
        const word = words[wi];
        el.textContent = deleting ? word.substring(0, ci--) : word.substring(0, ci++);

        if (!deleting && ci === word.length + 1) {
            deleting = true;
            setTimeout(type, 1800);
            return;
        }
        if (deleting && ci === 0) {
            deleting = false;
            wi = (wi + 1) % words.length;
        }
        setTimeout(type, deleting ? 55 : 90);
    }
    type();
})();

/* ---- PARTICLE CANVAS ---- */
(function() {
    const canvas = document.getElementById('hero-canvas');
    const ctx    = canvas.getContext('2d');
    let W, H, particles;

    function resize() {
        W = canvas.width  = canvas.offsetWidth;
        H = canvas.height = canvas.offsetHeight;
    }

    function createParticles() {
        particles = [];
        const count = Math.floor((W * H) / 14000);
        for (let i = 0; i < count; i++) {
            particles.push({
                x:  Math.random() * W,
                y:  Math.random() * H,
                r:  Math.random() * 1.2 + 0.3,
                vx: (Math.random() - 0.5) * 0.15,
                vy: (Math.random() - 0.5) * 0.15,
                a:  Math.random() * 0.5 + 0.1,
            });
        }
    }

    function draw() {
        ctx.clearRect(0, 0, W, H);
        particles.forEach(p => {
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(148,163,184,${p.a})`;
            ctx.fill();
            p.x += p.vx;
            p.y += p.vy;
            if (p.x < 0) p.x = W;
            if (p.x > W) p.x = 0;
            if (p.y < 0) p.y = H;
            if (p.y > H) p.y = 0;
        });

        // Draw connecting lines
        particles.forEach((p, i) => {
            particles.slice(i + 1).forEach(q => {
                const dx = p.x - q.x, dy = p.y - q.y;
                const dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < 100) {
                    ctx.beginPath();
                    ctx.moveTo(p.x, p.y);
                    ctx.lineTo(q.x, q.y);
                    ctx.strokeStyle = `rgba(59,130,246,${0.06 * (1 - dist / 100)})`;
                    ctx.lineWidth = 0.5;
                    ctx.stroke();
                }
            });
        });

        requestAnimationFrame(draw);
    }

    window.addEventListener('resize', () => { resize(); createParticles(); });
    resize();
    createParticles();
    draw();
})();
</script>