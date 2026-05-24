<section id="testimonials" class="py-32 px-6">
    <div class="max-w-6xl mx-auto">

        <div class="text-center" style="margin-bottom:5rem;">
            <div data-reveal><span class="section-label" style="justify-content:center;">Testimonials</span></div>
            <h2 data-reveal data-delay="100" class="section-title" style="margin-top:0.5rem;">
                Kata mereka <span class="gradient-text">tentang saya</span>
            </h2>
        </div>

        @php
        $testimonials = [
            [
                'name'    => 'Budi Santoso',
                'role'    => 'CEO, PT Maju Bersama',
                'initials'=> 'BS',
                'message' => 'Sangat profesional dan hasil kerjanya melampaui ekspektasi kami. Website e-commerce kami selesai tepat waktu dengan kualitas premium. Komunikasinya juga sangat baik dan responsif.',
                'color'   => '#3b82f6',
            ],
            [
                'name'    => 'Siti Rahayu',
                'role'    => 'Owner, Toko Berkah Online',
                'initials'=> 'SR',
                'message' => 'Komunikasinya bagus, responsif, dan sangat memahami kebutuhan bisnis. Sistem inventory yang dibangun sangat membantu operasional kami sehari-hari.',
                'color'   => '#06b6d4',
            ],
            [
                'name'    => 'Ahmad Fauzi',
                'role'    => 'CTO, Logistik.id',
                'initials'=> 'AF',
                'message' => 'Developer terbaik yang pernah saya ajak kerja sama. Kodenya bersih, dokumentasinya lengkap, dan selalu on-time. Tidak ragu untuk bekerja sama lagi.',
                'color'   => '#8b5cf6',
            ],
            [
                'name'    => 'Diana Putri',
                'role'    => 'Founder, StartupKu',
                'initials'=> 'DP',
                'message' => 'Proses pengerjaannya sangat transparan dan selalu update progress. Hasilnya memuaskan dan performa websitenya sangat cepat.',
                'color'   => '#10b981',
            ],
        ];
        @endphp

        <div data-reveal class="relative overflow-hidden">
            <div id="testi-track" style="display:flex;transition:transform 0.6s cubic-bezier(0.4,0,0.2,1);">
                @foreach($testimonials as $t)
                <div class="testi-slide" style="min-width:100%;padding:0 0.5rem;">
                    <div style="max-width:680px;margin:0 auto;">
                        <div class="testimonial-card" style="position:relative;">

                            {{-- Quote mark --}}
                            <div style="font-size:5rem;line-height:1;color:rgba(59,130,246,0.12);font-family:'Syne',sans-serif;font-weight:800;position:absolute;top:1rem;right:1.5rem;user-select:none;">"</div>

                            {{-- Stars --}}
                            <div style="display:flex;gap:3px;margin-bottom:1.5rem;">
                                @for($s=0;$s<5;$s++)
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="#f59e0b" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                @endfor
                            </div>

                            <p style="color:#94a3b8;font-size:1rem;line-height:1.85;margin-bottom:2rem;font-style:italic;">
                                "{{ $t['message'] }}"
                            </p>

                            <div style="display:flex;align-items:center;gap:1rem;">
                                <div style="width:44px;height:44px;border-radius:50%;background:{{ $t['color'] }}20;border:1px solid {{ $t['color'] }}30;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:0.875rem;color:{{ $t['color'] }};flex-shrink:0;">
                                    {{ $t['initials'] }}
                                </div>
                                <div>
                                    <p style="font-weight:600;font-size:0.875rem;color:#e2e8f0;">{{ $t['name'] }}</p>
                                    <p style="font-size:0.75rem;color:#475569;margin-top:0.125rem;">{{ $t['role'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Controls --}}
        <div style="display:flex;align-items:center;justify-content:center;gap:1.5rem;margin-top:2.5rem;">
            <button id="testi-prev" aria-label="Sebelumnya"
                style="width:40px;height:40px;border-radius:50%;border:1px solid rgba(255,255,255,0.08);background:rgba(255,255,255,0.03);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:border-color 0.2s,background 0.2s;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2.5" stroke-linecap="round"><polyline points="15 18 9 12 15 6"/></svg>
            </button>

            <div id="testi-dots" style="display:flex;gap:0.5rem;">
                @foreach($testimonials as $i => $t)
                <button onclick="testiGoTo({{ $i }})" aria-label="Slide {{ $i+1 }}"
                    class="testi-dot"
                    style="width:{{ $i === 0 ? '24px' : '8px' }};height:8px;border-radius:99px;border:none;cursor:pointer;transition:width 0.3s,background 0.3s;background:{{ $i === 0 ? '#3b82f6' : 'rgba(255,255,255,0.1)' }};padding:0;">
                </button>
                @endforeach
            </div>

            <button id="testi-next" aria-label="Berikutnya"
                style="width:40px;height:40px;border-radius:50%;border:1px solid rgba(255,255,255,0.08);background:rgba(255,255,255,0.03);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:border-color 0.2s,background 0.2s;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2.5" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg>
            </button>
        </div>
    </div>
</section>

<script>
(function() {
    const track = document.getElementById('testi-track');
    const dots  = document.querySelectorAll('.testi-dot');
    const total = {{ count($testimonials) }};
    let current = 0, timer;

    function updateBtn(btn, hovering) {
        btn.style.borderColor = hovering ? 'rgba(59,130,246,0.4)' : 'rgba(255,255,255,0.08)';
        btn.style.background  = hovering ? 'rgba(59,130,246,0.08)' : 'rgba(255,255,255,0.03)';
    }

    ['testi-prev','testi-next'].forEach(id => {
        const btn = document.getElementById(id);
        btn.addEventListener('mouseenter', () => updateBtn(btn, true));
        btn.addEventListener('mouseleave', () => updateBtn(btn, false));
    });

    function goTo(n) {
        current = (n + total) % total;
        track.style.transform = `translateX(-${current * 100}%)`;
        dots.forEach((d, i) => {
            d.style.width      = i === current ? '24px' : '8px';
            d.style.background = i === current ? '#3b82f6' : 'rgba(255,255,255,0.1)';
        });
    }

    window.testiGoTo = goTo;
    document.getElementById('testi-next').addEventListener('click', () => { goTo(current + 1); resetTimer(); });
    document.getElementById('testi-prev').addEventListener('click', () => { goTo(current - 1); resetTimer(); });

    function resetTimer() {
        clearInterval(timer);
        timer = setInterval(() => goTo(current + 1), 5000);
    }

    resetTimer();

    /* Touch/swipe support */
    let startX = 0;
    track.addEventListener('touchstart', e => startX = e.touches[0].clientX, { passive: true });
    track.addEventListener('touchend', e => {
        const dx = e.changedTouches[0].clientX - startX;
        if (Math.abs(dx) > 50) { goTo(dx < 0 ? current + 1 : current - 1); resetTimer(); }
    }, { passive: true });
})();
</script>