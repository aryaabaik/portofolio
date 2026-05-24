@extends('layouts.admin')

@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:2rem;flex-wrap:wrap;gap:1rem;">
    <div>
        <h1 style="font-family:'Syne',sans-serif;font-size:1.5rem;font-weight:800;color:#f1f5f9;margin-bottom:0.25rem;">Blog Posts</h1>
        <p style="font-size:0.8125rem;color:#334155;">Kelola artikel blog portfolio kamu.</p>
    </div>
    <a href="{{ route('admin.posts.create') }}" class="btn-sm btn-sm-primary">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Tulis Artikel
    </a>
</div>

@if(session('success'))
<div class="alert-success">
    {{ session('success') }}
</div>
@endif

<div class="admin-card" style="padding:0;overflow:hidden;">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th style="text-align:right;padding-right:1.5rem;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>
                    <span class="badge badge-gray">{{ $post->category }}</span>
                </td>
                <td>
                    @if($post->is_published)
                    <span class="badge badge-green">Published</span>
                    @else
                    <span class="badge badge-gray">Draft</span>
                    @endif
                </td>
                <td>
                    <span style="font-size:0.75rem;color:#475569;">{{ $post->published_at?->format('d M Y') ?? '-' }}</span>
                </td>
                <td>
                    <div style="display:flex;gap:0.5rem;justify-content:flex-end;padding-right:1rem;">
                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn-sm btn-sm-primary">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                            Edit
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                              onsubmit="return confirm('Hapus artikel ini?')" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-sm btn-sm-danger">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center;padding:3rem 1rem;color:#334155;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" style="margin-bottom:0.75rem;color:#1e3a5f;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    <p style="margin:0;font-size:0.875rem;">Belum ada artikel.</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection