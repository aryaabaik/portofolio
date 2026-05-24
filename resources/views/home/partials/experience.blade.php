<section id="experience" class="py-32 px-6 relative" style="background:rgba(255,255,255,0.012);">
    <div class="max-w-4xl mx-auto">

        <div class="text-center" style="margin-bottom:5rem;">
            <div data-reveal><span class="section-label" style="justify-content:center;">Experience</span></div>
            <h2 data-reveal data-delay="100" class="section-title" style="margin-top:0.5rem;">
                Perjalanan <span class="gradient-text">karir saya</span>
            </h2>
        </div>

        @php
        $experiences = [
            [
                'role'    => 'Full Stack Developer',
                'company' => 'PT Solusi Digital Nusantara',
                'period'  => 'Jan 2023 — Sekarang',
                'type'    => 'Full Time',
                'desc'    => 'Membangun dan memelihara sistem ERP berbasis web untuk klien korporat. Menggunakan Laravel 10+ dan Vue.js. Memimpin tim 3 developer junior dan bertanggung jawab atas arsitektur sistem.',
                'skills'  => ['Laravel', 'Vue.js', 'MySQL', 'Docker'],
            ],
            [
                'role'    => 'Backend Developer',
                'company' => 'Startup Fintech PayEase',
                'period'  => 'Jun 2021 — Des 2022',
                'type'    => 'Full Time',
                'desc'    => 'Mengembangkan API payment gateway terintegrasi dengan Midtrans dan DOKU. Meningkatkan performa query database hingga 60% melalui optimasi index dan query caching.',
                'skills'  => ['Laravel', 'Redis', 'Midtrans', 'REST API'],
            ],
            [
                'role'    => 'Junior Web Developer',
                'company' => 'Freelance',
                'period'  => 'Jan 2021 — Mei 2021',
                'type'    => 'Freelance',
                'desc'    => 'Membangun website untuk UMKM lokal menggunakan Laravel dan Bootstrap. Menangani 10+ proyek website company profile dan toko online dengan berbagai kebutuhan klien.',
                'skills'  => ['Laravel', 'Bootstrap', 'jQuery', 'MySQL'],
            ],
        ];
        @endphp

        <div class="relative">
            {{-- Vertical line --}}
            <div class="timeline-line hidden md:block"></div>

            <div style="display:flex;flex-direction:column;gap:3rem;">
                @foreach($experiences as $i => $exp)
                <div data-reveal data-delay="{{ $i * 150 }}" class="relative md:grid md:grid-cols-2 md:gap-16 items-start">

                    {{-- Timeline dot (desktop) --}}
                    <div class="timeline-dot hidden md:block" style="top:1.75rem;"></div>

                    @if($i % 2 === 0)
                    {{-- Left card --}}
                    <div class="glass-card" style="padding:1.75rem;border-left:3px solid rgba(59,130,246,0.4);">
                        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;flex-wrap:wrap;gap:0.5rem;">
                            <span class="tech-tag" style="background:rgba(59,130,246,0.1);color:#60a5fa;border-color:rgba(59,130,246,0.2);">{{ $exp['type'] }}</span>
                            <span style="font-size:0.75rem;color:#334155;font-weight:500;">{{ $exp['period'] }}</span>
                        </div>
                        <h3 style="font-weight:700;font-size:1rem;color:#e2e8f0;margin-bottom:0.25rem;">{{ $exp['role'] }}</h3>
                        <p style="color:#3b82f6;font-size:0.8125rem;font-weight:600;margin-bottom:1rem;">{{ $exp['company'] }}</p>
                        <p style="color:#475569;font-size:0.8125rem;line-height:1.8;margin-bottom:1.25rem;">{{ $exp['desc'] }}</p>
                        <div style="display:flex;flex-wrap:wrap;gap:0.375rem;">
                            @foreach($exp['skills'] as $skill)
                            <span class="tech-tag">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div></div>

                    @else
                    {{-- Right card --}}
                    <div></div>
                    <div class="glass-card" style="padding:1.75rem;border-left:3px solid rgba(6,182,212,0.4);">
                        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;flex-wrap:wrap;gap:0.5rem;">
                            <span class="tech-tag" style="background:rgba(6,182,212,0.1);color:#22d3ee;border-color:rgba(6,182,212,0.2);">{{ $exp['type'] }}</span>
                            <span style="font-size:0.75rem;color:#334155;font-weight:500;">{{ $exp['period'] }}</span>
                        </div>
                        <h3 style="font-weight:700;font-size:1rem;color:#e2e8f0;margin-bottom:0.25rem;">{{ $exp['role'] }}</h3>
                        <p style="color:#06b6d4;font-size:0.8125rem;font-weight:600;margin-bottom:1rem;">{{ $exp['company'] }}</p>
                        <p style="color:#475569;font-size:0.8125rem;line-height:1.8;margin-bottom:1.25rem;">{{ $exp['desc'] }}</p>
                        <div style="display:flex;flex-wrap:wrap;gap:0.375rem;">
                            @foreach($exp['skills'] as $skill)
                            <span class="tech-tag">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>