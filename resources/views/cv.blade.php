<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV — Arya Adhitya</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Syne:wght@700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        :root {
            --bg-primary: #030712;
            --bg-card: rgba(255, 255, 255, 0.025);
            --border: rgba(255, 255, 255, 0.06);
            --text-primary: #f1f5f9;
            --text-muted: #64748b;
            --accent: #3b82f6;
            --cyan: #06b6d4;
            --gradient: linear-gradient(135deg, #3b82f6, #06b6d4);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            min-height: 100vh;
            line-height: 1.6;
        }

        .glass-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            backdrop-filter: blur(8px);
            padding: 1.75rem;
            margin-bottom: 1.25rem;
        }

        .tech-tag {
            display: inline-flex;
            align-items: center;
            font-size: 0.6875rem;
            font-weight: 500;
            padding: 0.2rem 0.5rem;
            border-radius: 6px;
            background: rgba(59, 130, 246, 0.08);
            border: 1px solid rgba(59, 130, 246, 0.18);
            color: #60a5fa;
        }

        .section-title {
            font-family: 'Syne', sans-serif;
            font-size: 1rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #60a5fa;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.05);
        }

        /* Print Overrides */
        @media print {
            :root {
                --bg-primary: #ffffff;
                --bg-card: transparent;
                --border: #e2e8f0;
                --text-primary: #0f172a;
                --text-muted: #475569;
                --accent: #2563eb;
            }

            body {
                background: #ffffff;
                color: #0f172a;
                padding: 0 !important;
                font-size: 12px;
                line-height: 1.5;
            }

            .no-print {
                display: none !important;
            }

            .glass-card {
                background: transparent !important;
                border: none !important;
                border-bottom: 1px dashed #e2e8f0 !important;
                border-radius: 0 !important;
                padding: 1rem 0 !important;
                margin-bottom: 0.75rem !important;
                box-shadow: none !important;
                backdrop-filter: none !important;
            }

            .glass-card:last-child {
                border-bottom: none !important;
            }

            .tech-tag {
                background: #f1f5f9 !important;
                color: #334155 !important;
                border: 1px solid #cbd5e1 !important;
            }

            .section-title {
                color: #0f172a !important;
                font-size: 11px !important;
                margin-bottom: 0.5rem !important;
            }

            .section-title::after {
                background: #cbd5e1 !important;
            }

            h1, h2, h3 {
                color: #0f172a !important;
            }

            .glow-orb {
                display: none !important;
            }
        }
    </style>
</head>
<body class="p-6 md:p-12 max-w-4xl mx-auto relative">

    {{-- Glow orbs --}}
    <div class="glow-orb" style="width:500px;height:250px;background:#3b82f6;top:0;left:50%;transform:translateX(-50%);opacity:0.05;filter:blur(100px);position:absolute;pointer-events:none;"></div>

    {{-- Tombol Actions --}}
    <div class="no-print flex justify-between items-center gap-3 mb-8">
        <a href="/" class="btn-outline" style="padding:0.5rem 1.25rem;font-size:0.8125rem;text-decoration:none;border-radius:8px;">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" style="margin-right:0.25rem;display:inline-block;vertical-align:middle;"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Kembali
        </a>
        <button onclick="window.print()" class="btn-primary" style="padding:0.5rem 1.25rem;font-size:0.8125rem;border-radius:8px;">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" style="margin-right:0.25rem;display:inline-block;vertical-align:middle;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Download PDF
        </button>
    </div>

    {{-- Header Card --}}
    <div class="glass-card">
        <div style="display:flex;flex-wrap:wrap;gap:1.5rem;align-items:center;">
            <img src="https://ui-avatars.com/api/?name=Arya+Adhitya&size=120&background=2563eb&color=fff&bold=true&rounded=true"
                 alt="Foto Arya Adhitya"
                 style="width:96px;height:96px;border-radius:50%;border:2px solid rgba(255,255,255,0.08);background:rgba(255,255,255,0.02);padding:4px;">
            <div style="flex:1;min-width:240px;">
                <h1 style="font-family:'Syne',sans-serif;font-size:2.25rem;font-weight:800;color:#f1f5f9;line-height:1.1;margin-bottom:0.25rem;">
                    Arya Adhitya
                </h1>
                <p style="font-size:1rem;color:#60a5fa;font-weight:600;margin-bottom:1rem;">Full Stack Web Developer</p>
                <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(160px, 1fr));gap:0.5rem;font-size:0.8125rem;color:#64748b;">
                    <span style="display:inline-flex;align-items:center;gap:0.375rem;">📧 arya@email.com</span>
                    <span style="display:inline-flex;align-items:center;gap:0.375rem;">📱 +62 812-xxxx-xxxx</span>
                    <span style="display:inline-flex;align-items:center;gap:0.375rem;">📍 Jakarta, Indonesia</span>
                    <span style="display:inline-flex;align-items:center;gap:0.375rem;">🔗 github.com/arya</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Summary --}}
    <div class="glass-card">
        <h2 class="section-title">Tentang Saya</h2>
        <p style="color:#94a3b8;font-size:0.875rem;line-height:1.7;">
            Full Stack Web Developer dengan pengalaman 4 tahun membangun aplikasi web modern.
            Spesialisasi di Laravel, Vue.js, dan React. Passionate dalam menciptakan solusi
            digital yang fungsional dan memiliki pengalaman pengguna yang luar biasa.
        </p>
    </div>

    {{-- Experience --}}
    <div class="glass-card">
        <h2 class="section-title">Pengalaman Kerja</h2>
        <div style="display:flex;flex-direction:column;gap:1.5rem;">
            @foreach([
                [
                    'role'    => 'Full Stack Developer',
                    'company' => 'PT Solusi Digital Nusantara',
                    'period'  => 'Jan 2023 – Sekarang',
                    'desc'    => 'Membangun dan memelihara sistem ERP berbasis web untuk klien korporat menggunakan Laravel 10+ dan Vue.js. Memimpin tim 3 developer junior.'
                ],
                [
                    'role'    => 'Backend Developer',
                    'company' => 'Startup Fintech PayEase',
                    'period'  => 'Jun 2021 – Des 2022',
                    'desc'    => 'Mengembangkan API payment gateway terintegrasi dengan Midtrans and DOKU. Meningkatkan performa query database hingga 60%.'
                ],
                [
                    'role'    => 'Junior Web Developer',
                    'company' => 'Freelance',
                    'period'  => 'Jan 2021 – Mei 2021',
                    'desc'    => 'Membangun website untuk UMKM lokal menggunakan Laravel dan Bootstrap. Menangani 10+ proyek website company profile dan toko online.'
                ],
            ] as $exp)
            <div style="display:flex;gap:1rem;">
                <div style="width:8px;height:8px;border-radius:50%;background:#60a5fa;margin-top:0.5rem;flex-shrink:0;box-shadow:0 0 10px rgba(96,165,250,0.5);"></div>
                <div style="flex:1;">
                    <div style="display:flex;flex-wrap:wrap;align-items:baseline;justify-content:space-between;margin-bottom:0.25rem;">
                        <h3 style="font-weight:600;font-size:0.9375rem;color:#f1f5f9;margin:0;">
                            {{ $exp['role'] }} <span style="color:#64748b;font-weight:normal;">di</span> <span style="color:#60a5fa;">{{ $exp['company'] }}</span>
                        </h3>
                        <span style="font-size:0.8125rem;color:#64748b;">{{ $exp['period'] }}</span>
                    </div>
                    <p style="color:#94a3b8;font-size:0.875rem;margin:0;line-height:1.6;">{{ $exp['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Skills --}}
    <div class="glass-card">
        <h2 class="section-title">Keahlian (Skills)</h2>
        <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));gap:1.25rem;">
            @foreach([
                ['Frontend', ['HTML/CSS', 'JavaScript', 'Vue.js', 'React', 'Tailwind CSS']],
                ['Backend',  ['Laravel', 'PHP', 'Node.js', 'REST API']],
                ['Tools & Others', ['Git', 'Docker', 'MySQL', 'Linux', 'Figma']],
            ] as [$cat, $skills])
            <div>
                <p style="font-size:0.75rem;font-weight:600;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:0.5rem;">{{ $cat }}</p>
                <div style="display:flex;flex-wrap:wrap;gap:0.375rem;">
                    @foreach($skills as $s)
                    <span class="tech-tag">{{ $s }}</span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Education & Projects Side by Side --}}
    <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(320px, 1fr));gap:1rem;">
        {{-- Education --}}
        <div class="glass-card" style="margin-bottom:0;">
            <h2 class="section-title">Pendidikan</h2>
            <div style="display:flex;gap:1rem;">
                <div style="width:8px;height:8px;border-radius:50%;background:#60a5fa;margin-top:0.5rem;flex-shrink:0;box-shadow:0 0 10px rgba(96,165,250,0.5);"></div>
                <div>
                    <h3 style="font-weight:600;font-size:0.9375rem;color:#f1f5f9;margin:0;">S1 Teknik Informatika</h3>
                    <p style="color:#60a5fa;font-size:0.875rem;margin:0.125rem 0;">Universitas Indonesia</p>
                    <p style="color:#64748b;font-size:0.8125rem;margin:0;">2017 – 2021 · IPK 3.72</p>
                </div>
            </div>
        </div>

        {{-- Projects --}}
        <div class="glass-card" style="margin-bottom:0;">
            <h2 class="section-title">Project Unggulan</h2>
            <div style="display:flex;flex-direction:column;gap:0.75rem;">
                @foreach([
                    ['SiKasir', 'Aplikasi Point of Sale UMKM', 'Laravel, Vue.js'],
                    ['TaskFlow', 'Real-time Project Management', 'React, Laravel'],
                ] as [$name, $desc, $tech])
                <div style="border-left:2px solid rgba(255,255,255,0.05);padding-left:0.75rem;">
                    <h3 style="font-weight:600;font-size:0.875rem;color:#f1f5f9;margin:0;">{{ $name }}</h3>
                    <p style="color:#64748b;font-size:0.75rem;margin:0.125rem 0;">{{ $desc }}</p>
                    <span class="tech-tag" style="font-size:0.625rem;padding:0.125rem 0.375rem;">{{ $tech }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</body>
</html>