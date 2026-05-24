@extends('layouts.app')

@section('content')
<section class="py-32 px-6 relative">
    {{-- Glow orb decor --}}
    <div class="glow-orb" style="width:600px;height:300px;background:#3b82f6;top:10%;left:50%;transform:translate(-50%,-50%);opacity:0.06;filter:blur(120px);position:absolute;pointer-events:none;"></div>

    <div class="max-w-5xl mx-auto relative">

        <div class="text-center mb-16" data-reveal>
            <span class="section-label" style="justify-content:center;">Blog</span>
            <h1 class="text-4xl md:text-5xl font-bold tracking-tight mb-4" style="font-family:'Syne',sans-serif">
                Artikel & <span class="gradient-text">Tulisan</span>
            </h1>
            <p style="font-size:0.9375rem;color:#64748b;">Berbagi insights, tutorial, dan pengalaman seputar software engineering.</p>
        </div>

        {{-- Search & Filter --}}
        <div data-reveal class="glass-card" style="padding:1.25rem;margin-bottom:3rem;">
            <form method="GET" action="{{ route('blog.index') }}" style="display:flex;flex-wrap:wrap;gap:0.75rem;align-items:center;">
                <div style="flex:1;min-width:240px;position:relative;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2.5" stroke-linecap="round" style="position:absolute;left:1rem;top:50%;transform:translateY(-50%);pointer-events:none;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Cari artikel..."
                           style="background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.05);border-radius:10px;padding:0.75rem 1rem 0.75rem 2.5rem;font-size:0.875rem;color:#f1f5f9;width:100%;outline:none;">
                    @if(request('search'))
                    <a href="{{ route('blog.index', request()->except('search', 'page')) }}"
                       style="position:absolute;right:1rem;top:50%;transform:translateY(-50%);color:#64748b;text-decoration:none;font-size:0.8125rem;">✕</a>
                    @endif
                </div>

                <div style="min-width:180px;">
                    <select name="category" onchange="this.form.submit()"
                            style="background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.05);border-radius:10px;padding:0.75rem 1.25rem;font-size:0.875rem;color:#f1f5f9;width:100%;outline:none;cursor:pointer;">
                        <option value="" style="background:#030712;">Semua Kategori</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }} style="background:#030712;">
                            {{ $cat }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn-primary" style="padding:0.75rem 1.5rem;border-radius:10px;">
                    Cari
                </button>
            </form>
        </div>

        {{-- Hasil pencarian --}}
        @if(request('search') || request('category'))
        <div data-reveal class="flex items-center justify-between" style="margin-bottom:2rem;flex-wrap:wrap;gap:1rem;">
            <p style="font-size:0.875rem;color:#64748b;margin:0;">
                Menampilkan hasil untuk:
                @if(request('search'))
                <span style="color:#3b82f6;font-weight:600;">"{{ request('search') }}"</span>
                @endif
                @if(request('category'))
                <span class="tech-tag" style="margin-left:0.25rem;">{{ request('category') }}</span>
                @endif
                — <span style="color:#f1f5f9;font-weight:600;">{{ $posts->total() }}</span> artikel ditemukan
            </p>
            <a href="{{ route('blog.index') }}" class="btn-sm btn-sm-primary" style="border-radius:99px;padding:0.25rem 0.75rem;text-decoration:none;">
                Reset Filter
            </a>
        </div>
        @endif

        @if($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <div data-reveal class="glass-card" style="overflow:hidden;display:flex;flex-direction:column;height:100%;">
                <a href="{{ route('blog.show', $post) }}" style="text-decoration:none;display:block;overflow:hidden;position:relative;" class="group">
                    @if($post->thumbnail)
                    <img src="{{ Storage::url($post->thumbnail) }}"
                         alt="{{ $post->title }}"
                         style="width:100%;height:200px;object-fit:cover;transition:transform 0.5s;" class="group-hover:scale-105">
                    @else
                    <div style="width:100%;height:200px;background:linear-gradient(135deg,rgba(59,130,246,0.03),rgba(6,182,212,0.03));display:flex;align-items:center;justify-content:center;border-bottom:1px solid var(--border);">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="1.2" stroke-linecap="round" style="opacity:0.4;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    </div>
                    @endif
                </a>

                <div style="padding:1.5rem;display:flex;flex-direction:column;flex:1;">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;">
                        <span class="tech-tag">{{ $post->category }}</span>
                        <span style="font-size:0.75rem;color:#64748b;">
                            {{ $post->published_at->format('d M Y') }}
                        </span>
                    </div>

                    <a href="{{ route('blog.show', $post) }}" style="text-decoration:none;">
                        <h2 style="font-family:'Syne',sans-serif;font-size:1.125rem;font-weight:700;color:#f1f5f9;line-height:1.4;margin-bottom:0.75rem;" class="hover:text-blue-400 transition line-clamp-2">
                            {{ $post->title }}
                        </h2>
                    </a>

                    <p style="font-size:0.875rem;color:#64748b;line-height:1.6;margin-bottom:1.5rem;" class="line-clamp-3">
                        {{ $post->excerpt }}
                    </p>

                    <div style="margin-top:auto;padding-top:1rem;border-top:1px solid var(--border);">
                        <a href="{{ route('blog.show', $post) }}" class="nav-link" style="display:inline-flex;align-items:center;gap:0.375rem;font-size:0.8125rem;">
                            Baca Selengkapnya
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div style="margin-top:4rem;display:flex;justify-content:center;">
            {{ $posts->links() }}
        </div>

        @else
        <div data-reveal class="glass-card" style="text-align:center;padding:5rem 2rem;">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="1.5" stroke-linecap="round" style="margin-bottom:1rem;margin-inline:auto;opacity:0.5;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
            <p style="font-size:0.9375rem;color:#64748b;margin-bottom:1.5rem;">
                @if(request('search') || request('category'))
                    Tidak ada artikel yang cocok dengan pencarianmu.
                @else
                    Belum ada artikel yang dipublikasikan.
                @endif
            </p>
            @if(request('search') || request('category'))
            <a href="{{ route('blog.index') }}" class="btn-primary" style="text-decoration:none;">
                Lihat Semua Artikel
            </a>
            @endif
        </div>
        @endif

    </div>
</section>
@endsection