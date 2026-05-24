@extends('layouts.admin')
@section('content')

<div style="margin-bottom:2rem;">
    <h1 style="font-family:'Syne',sans-serif;font-size:1.5rem;font-weight:800;color:#f1f5f9;margin-bottom:0.25rem;">Dashboard</h1>
    <p style="font-size:0.8125rem;color:#334155;">Selamat datang kembali, {{ auth()->user()->name ?? 'Admin' }}.</p>
</div>

{{-- Stats --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4" style="margin-bottom:2.5rem;">
    @foreach([
        ['Projects', $total_projects, '#3b82f6', 'M2 3h20v14H2z M8 21h8 M12 17v4'],
        ['Blog Posts', $total_posts, '#06b6d4', 'M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z M14 2v6h6 M16 13H8 M16 17H8'],
        ['Kontak', $total_contacts, '#8b5cf6', 'M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z M22,6 L12,13 L2,6'],
        ['Pesan Baru', $unread, '#f59e0b', 'M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9 M13.73 21a2 2 0 0 1-3.46 0'],
    ] as [$label, $value, $color, $icon])
    <div class="admin-card" style="display:flex;align-items:flex-start;gap:1rem;">
        <div style="width:40px;height:40px;border-radius:10px;background:{{ $color }}18;border:1px solid {{ $color }}30;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="{{ $color }}" stroke-width="2" stroke-linecap="round">
                <path d="{{ $icon }}"/>
            </svg>
        </div>
        <div>
            <p style="font-size:0.6875rem;font-weight:600;color:#334155;text-transform:uppercase;letter-spacing:0.08em;margin-bottom:0.25rem;">{{ $label }}</p>
            <p style="font-family:'Syne',sans-serif;font-size:1.75rem;font-weight:800;color:{{ $color }};line-height:1;">{{ $value }}</p>
        </div>
    </div>
    @endforeach
</div>

{{-- Quick actions --}}
<div class="admin-card">
    <h2 style="font-size:0.75rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:#334155;margin-bottom:1.25rem;">Aksi Cepat</h2>
    <div style="display:flex;flex-wrap:wrap;gap:0.75rem;">
        <a href="{{ route('admin.projects.create') }}" class="btn-sm btn-sm-primary">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Tambah Project
        </a>
        <a href="{{ route('admin.posts.create') }}" class="btn-sm btn-sm-success">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Tulis Artikel
        </a>
        <a href="{{ route('admin.contacts.index') }}" class="btn-sm" style="background:rgba(139,92,246,0.1);color:#a78bfa;border:1px solid rgba(139,92,246,0.2);">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            Lihat Pesan Masuk
        </a>
    </div>
</div>

@endsection