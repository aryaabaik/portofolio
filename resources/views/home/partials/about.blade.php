<section id="about" class="py-32 px-6 relative">
    <div class="max-w-6xl mx-auto">
        <div class="grid md:grid-cols-2 gap-20 items-center">

            {{-- Left: Image + decorative --}}
            <div data-reveal="left" class="relative flex justify-center md:justify-start">
                <div class="relative">
                    {{-- Decorative border --}}
                    <div style="position:absolute;inset:-12px;border-radius:24px;border:1px solid rgba(59,130,246,0.15);"></div>
                    <div style="position:absolute;inset:-6px;border-radius:20px;border:1px dashed rgba(59,130,246,0.08);"></div>

                    {{-- Profile image --}}
                    <div style="width:280px;height:320px;border-radius:16px;overflow:hidden;background:rgba(59,130,246,0.06);border:1px solid rgba(59,130,246,0.12);display:flex;align-items:center;justify-content:center;">
                        <img src="https://ui-avatars.com/api/?name=Arya+Adhitya&size=600&background=1e3a5f&color=60a5fa&bold=true"
                             alt="Arya Adhitya"
                             style="width:100%;height:100%;object-fit:cover;">
                    </div>

                    {{-- Floating badge --}}
                    <div style="position:absolute;bottom:-20px;right:-20px;background:rgba(3,7,18,0.9);border:1px solid rgba(59,130,246,0.2);border-radius:12px;padding:0.75rem 1.25rem;backdrop-filter:blur(12px);">
                        <p style="font-size:0.6875rem;color:#64748b;text-transform:uppercase;letter-spacing:0.08em;">Experience</p>
                        <p style="font-family:'Syne',sans-serif;font-size:1.25rem;font-weight:800;" class="gradient-text">4+ Years</p>
                    </div>
                </div>
            </div>

            {{-- Right: Content --}}
            <div>
                <div data-reveal data-delay="100">
                    <span class="section-label">About Me</span>
                </div>

                <h2 data-reveal data-delay="150" class="section-title" style="margin-bottom:1.5rem;">
                    Passionate developer,<br>
                    <span class="gradient-text">problem solver.</span>
                </h2>

                <p data-reveal data-delay="200" style="color:#475569;line-height:1.8;margin-bottom:1rem;font-size:0.9375rem;">
                    Saya adalah Full Stack Web Developer dengan pengalaman 4 tahun membangun
                    aplikasi web modern. Fokus menciptakan solusi digital yang tidak hanya
                    fungsional, tetapi juga memberikan pengalaman pengguna yang luar biasa.
                </p>

                <p data-reveal data-delay="250" style="color:#475569;line-height:1.8;margin-bottom:2.5rem;font-size:0.9375rem;">
                    Spesialisasi meliputi Laravel di backend, serta Vue.js dan React di
                    frontend. Kode yang baik adalah kode yang mudah dibaca dan dipelihara.
                </p>

                {{-- Stats --}}
                <div data-reveal data-delay="300" class="grid grid-cols-3 gap-4" style="margin-bottom:2.5rem;">
                    <div class="glass-card text-center" style="padding:1.25rem 0.75rem;">
                        <p class="counter-num" data-count="48">0</p>
                        <p style="font-size:0.6875rem;color:#475569;text-transform:uppercase;letter-spacing:0.08em;margin-top:0.4rem;font-weight:600;">Projects</p>
                    </div>
                    <div class="glass-card text-center" style="padding:1.25rem 0.75rem;">
                        <p class="counter-num" data-count="4">0</p>
                        <p style="font-size:0.6875rem;color:#475569;text-transform:uppercase;letter-spacing:0.08em;margin-top:0.4rem;font-weight:600;">Years Exp.</p>
                    </div>
                    <div class="glass-card text-center" style="padding:1.25rem 0.75rem;">
                        <p class="counter-num" data-count="30">0</p>
                        <p style="font-size:0.6875rem;color:#475569;text-transform:uppercase;letter-spacing:0.08em;margin-top:0.4rem;font-weight:600;">Clients</p>
                    </div>
                </div>

                <div data-reveal data-delay="400">
                    <a href="#contact" class="btn-primary" style="display:inline-flex;">
                        Mulai Kolaborasi
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
/* ---- COUNTER ANIMATION ---- */
(function() {
    const counters = document.querySelectorAll('.counter-num[data-count]');
    const obs = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const el  = entry.target;
            const end = parseInt(el.dataset.count);
            let current = 0;
            const step = Math.ceil(end / 50);
            const suffix = el.textContent.includes('+') ? '+' : '';
            const timer = setInterval(() => {
                current = Math.min(current + step, end);
                el.textContent = current + (end >= 30 ? '+' : '');
                if (current >= end) clearInterval(timer);
            }, 30);
            obs.unobserve(el);
        });
    }, { threshold: 0.5 });
    counters.forEach(c => obs.observe(c));
})();
</script>