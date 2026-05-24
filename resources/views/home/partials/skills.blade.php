<section id="skills" class="py-32 px-6 relative" style="background:rgba(255,255,255,0.012);">
    <div class="max-w-6xl mx-auto">

        <div class="text-center" style="margin-bottom:5rem;">
            <div data-reveal><span class="section-label" style="justify-content:center;">Skills</span></div>
            <h2 data-reveal data-delay="100" class="section-title" style="margin-top:0.5rem;">
                Tech stack <span class="gradient-text">&amp; tools</span>
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            {{-- Frontend --}}
            <div data-reveal data-delay="100" class="glass-card" style="padding:2rem;">
                <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:2rem;">
                    <div style="width:36px;height:36px;border-radius:10px;background:rgba(59,130,246,0.12);border:1px solid rgba(59,130,246,0.2);display:flex;align-items:center;justify-content:center;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round"><polygon points="12 2 22 8.5 22 15.5 12 22 2 15.5 2 8.5 12 2"/></svg>
                    </div>
                    <h3 style="font-size:0.8125rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:#64748b;">Frontend</h3>
                </div>
                @foreach([['HTML / CSS',95],['JavaScript',88],['Vue.js',85],['React',80],['Tailwind CSS',92]] as [$name,$val])
                <div style="margin-bottom:1.25rem;">
                    <div style="display:flex;justify-content:space-between;margin-bottom:0.5rem;">
                        <span style="font-size:0.8125rem;font-weight:500;color:#94a3b8;">{{ $name }}</span>
                        <span style="font-size:0.75rem;font-weight:600;color:#3b82f6;">{{ $val }}%</span>
                    </div>
                    <div class="skill-track">
                        <div class="skill-fill" data-width="{{ $val }}"></div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Backend --}}
            <div data-reveal data-delay="200" class="glass-card" style="padding:2rem;">
                <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:2rem;">
                    <div style="width:36px;height:36px;border-radius:10px;background:rgba(6,182,212,0.12);border:1px solid rgba(6,182,212,0.2);display:flex;align-items:center;justify-content:center;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2" stroke-linecap="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                    </div>
                    <h3 style="font-size:0.8125rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:#64748b;">Backend</h3>
                </div>
                @foreach([['Laravel',93],['PHP',90],['Node.js',72],['REST API',88],['MySQL',85]] as [$name,$val])
                <div style="margin-bottom:1.25rem;">
                    <div style="display:flex;justify-content:space-between;margin-bottom:0.5rem;">
                        <span style="font-size:0.8125rem;font-weight:500;color:#94a3b8;">{{ $name }}</span>
                        <span style="font-size:0.75rem;font-weight:600;color:#06b6d4;">{{ $val }}%</span>
                    </div>
                    <div class="skill-track">
                        <div class="skill-fill" data-width="{{ $val }}" style="background:linear-gradient(135deg,#06b6d4,#3b82f6);box-shadow:0 0 10px rgba(6,182,212,0.4);"></div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Tools --}}
            <div data-reveal data-delay="300" class="glass-card" style="padding:2rem;">
                <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:2rem;">
                    <div style="width:36px;height:36px;border-radius:10px;background:rgba(139,92,246,0.12);border:1px solid rgba(139,92,246,0.2);display:flex;align-items:center;justify-content:center;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>
                    </div>
                    <h3 style="font-size:0.8125rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:#64748b;">Tools &amp; Infra</h3>
                </div>
                @foreach([['Git & GitHub',90],['Docker',70],['Linux',75],['Figma',78],['Redis',65]] as [$name,$val])
                <div style="margin-bottom:1.25rem;">
                    <div style="display:flex;justify-content:space-between;margin-bottom:0.5rem;">
                        <span style="font-size:0.8125rem;font-weight:500;color:#94a3b8;">{{ $name }}</span>
                        <span style="font-size:0.75rem;font-weight:600;color:#8b5cf6;">{{ $val }}%</span>
                    </div>
                    <div class="skill-track">
                        <div class="skill-fill" data-width="{{ $val }}" style="background:linear-gradient(135deg,#8b5cf6,#3b82f6);box-shadow:0 0 10px rgba(139,92,246,0.4);"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
(function() {
    const fills = document.querySelectorAll('.skill-fill');
    fills.forEach(f => f.style.width = '0');

    const obs = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            entry.target.style.width = entry.target.dataset.width + '%';
            obs.unobserve(entry.target);
        });
    }, { threshold: 0.3 });

    fills.forEach(f => obs.observe(f));
})();
</script>