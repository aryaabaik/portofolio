<section id="projects" class="py-32 px-6">
    <div class="max-w-6xl mx-auto">

        <div class="text-center" style="margin-bottom:5rem;">
            <div data-reveal><span class="section-label" style="justify-content:center;">Portfolio</span></div>
            <h2 data-reveal data-delay="100" class="section-title" style="margin-top:0.5rem;">
                Projects <span class="gradient-text">terbaru</span>
            </h2>
        </div>

        @if($projects->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $i => $project)
            <div data-reveal data-delay="{{ ($i % 3) * 100 }}" class="project-card">

                {{-- Thumbnail --}}
                <div style="position:relative;height:180px;overflow:hidden;border-radius:16px 16px 0 0;">
                    @if($project->thumbnail)
                        <img src="{{ Storage::url($project->thumbnail) }}"
                             alt="{{ $project->title }}"
                             style="width:100%;height:100%;object-fit:cover;transition:transform 0.5s ease;">
                    @else
                        <div style="width:100%;height:100%;background:linear-gradient(135deg,rgba(59,130,246,0.08),rgba(6,182,212,0.08));display:flex;align-items:center;justify-content:center;border-bottom:1px solid rgba(255,255,255,0.04);">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.3)" stroke-width="1.5" stroke-linecap="round">
                                <rect x="2" y="3" width="20" height="14" rx="2"/>
                                <line x1="8" y1="21" x2="16" y2="21"/>
                                <line x1="12" y1="17" x2="12" y2="21"/>
                            </svg>
                        </div>
                    @endif

                    {{-- Overlay on hover --}}
                    <div class="card-overlay" style="border-radius:16px 16px 0 0;display:flex;align-items:flex-end;gap:1rem;padding:1rem;">
                        @if($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank" rel="noopener"
                           style="flex:1;text-align:center;background:rgba(59,130,246,0.9);color:#fff;font-size:0.75rem;font-weight:600;padding:0.5rem;border-radius:8px;transition:background 0.2s;text-decoration:none;">
                            Live Demo
                        </a>
                        @endif
                        @if($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" rel="noopener"
                           style="flex:1;text-align:center;background:rgba(255,255,255,0.1);color:#fff;font-size:0.75rem;font-weight:600;padding:0.5rem;border-radius:8px;transition:background 0.2s;text-decoration:none;border:1px solid rgba(255,255,255,0.15);">
                            GitHub
                        </a>
                        @endif
                    </div>
                </div>

                {{-- Content --}}
                <div style="padding:1.25rem 1.5rem 1.5rem;">
                    <span class="tech-tag" style="margin-bottom:0.75rem;display:inline-block;">{{ $project->category }}</span>
                    <h3 style="font-weight:700;font-size:0.9375rem;margin-bottom:0.5rem;color:#e2e8f0;">{{ $project->title }}</h3>
                    <p style="color:#475569;font-size:0.8125rem;line-height:1.7;margin-bottom:1rem;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                        {{ $project->description }}
                    </p>
                    <div style="display:flex;flex-wrap:wrap;gap:0.375rem;">
                        @foreach($project->tech_stack as $tech)
                        <span class="tech-tag">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div data-reveal class="glass-card text-center" style="padding:4rem 2rem;">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.3)" stroke-width="1.5" stroke-linecap="round" style="margin:0 auto 1rem;">
                <rect x="2" y="3" width="20" height="14" rx="2"/>
                <line x1="8" y1="21" x2="16" y2="21"/>
                <line x1="12" y1="17" x2="12" y2="21"/>
            </svg>
            <p style="color:#334155;font-size:0.875rem;">Belum ada project. Tambahkan melalui admin panel.</p>
        </div>
        @endif
    </div>
</section>

<script>
/* Hover image zoom effect */
document.querySelectorAll('.project-card').forEach(card => {
    const img = card.querySelector('img');
    if (!img) return;
    card.addEventListener('mouseenter', () => img.style.transform = 'scale(1.06)');
    card.addEventListener('mouseleave', () => img.style.transform = 'scale(1)');
});
</script>