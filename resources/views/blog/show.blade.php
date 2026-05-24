@extends('layouts.app')

@section('content')
<section class="py-32 px-6 relative">
    {{-- Glow orb decor --}}
    <div class="glow-orb" style="width:600px;height:300px;background:#3b82f6;top:10%;left:50%;transform:translate(-50%,-50%);opacity:0.06;filter:blur(120px);position:absolute;pointer-events:none;"></div>

    <article class="max-w-3xl mx-auto relative">

        <div class="mb-8" data-reveal>
            <a href="{{ route('blog.index') }}" class="nav-link" style="display:inline-flex;align-items:center;gap:0.5rem;font-size:0.875rem;text-decoration:none;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Kembali ke Blog
            </a>
        </div>

        <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1.5rem;" data-reveal>
            <span class="tech-tag">{{ $post->category }}</span>
            <span style="font-size:0.8125rem;color:#64748b;">
                Dipublikasikan {{ $post->published_at->format('d F Y') }}
            </span>
        </div>

        <h1 class="text-3xl md:text-5xl font-bold tracking-tight mb-8" style="font-family:'Syne',sans-serif;color:#f1f5f9;line-height:1.2;" data-reveal>
            {{ $post->title }}
        </h1>

        <div data-reveal class="glass-card" style="padding:1.5rem;margin-bottom:2.5rem;border-left:3px solid #3b82f6;border-radius:0 16px 16px 0;">
            <p style="font-size:1.125rem;color:#94a3b8;line-height:1.6;margin:0;font-weight:400;font-style:italic;">
                {{ $post->excerpt }}
            </p>
        </div>

        @if($post->thumbnail)
        <div data-reveal class="glass-card" style="padding:0.5rem;overflow:hidden;margin-bottom:3rem;">
            <img src="{{ Storage::url($post->thumbnail) }}"
                 alt="{{ $post->title }}"
                 style="width:100%;border-radius:12px;object-fit:cover;max-height:420px;display:block;">
        </div>
        @endif

        <div data-reveal class="glass-card" style="padding:2.5rem;margin-bottom:3rem;">
            <div class="prose prose-invert prose-sky max-w-none text-slate-300" style="line-height:1.8;font-size:0.9375rem;">
                {!! nl2br(e($post->body)) !!}
            </div>
        </div>

        <div data-reveal class="flex items-center justify-between" style="padding-top:2rem;border-top:1px solid var(--border);flex-wrap:wrap;gap:1.5rem;">
            <a href="{{ route('blog.index') }}" class="nav-link" style="display:inline-flex;align-items:center;gap:0.5rem;font-size:0.875rem;text-decoration:none;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Artikel Lainnya
            </a>

            <div style="display:flex;align-items:center;gap:0.75rem;font-size:0.875rem;color:#64748b;">
                <span>Bagikan:</span>
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->url()) }}"
                   target="_blank" class="btn-sm btn-sm-primary" style="text-decoration:none;border-radius:99px;padding:0.25rem 0.75rem;">
                   Twitter
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}"
                   target="_blank" class="btn-sm btn-sm-primary" style="text-decoration:none;border-radius:99px;padding:0.25rem 0.75rem;">
                   LinkedIn
                </a>
            </div>
        </div>

    </article>
</section>
@endsection