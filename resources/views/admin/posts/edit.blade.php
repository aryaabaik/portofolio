@extends('layouts.admin')
@section('content')

<div style="margin-bottom:2rem;">
    <a href="{{ route('admin.posts.index') }}" class="btn-sm btn-sm-primary" style="margin-bottom:1.5rem;display:inline-flex;">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="15 18 9 12 15 6"/></svg>
        Kembali
    </a>
    <h1 style="font-family:'Syne',sans-serif;font-size:1.5rem;font-weight:800;color:#f1f5f9;margin-bottom:0.25rem;">Edit Artikel</h1>
    <p style="font-size:0.8125rem;color:#334155;">Ubah detail artikel blog: {{ $post->title }}</p>
</div>

@if($errors->any())
<div class="alert-error" style="margin-bottom:1.5rem;">
    <ul style="margin:0;padding-left:1rem;list-style:disc;">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div style="max-width:720px;">
    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="admin-card" style="display:flex;flex-direction:column;gap:1.25rem;margin-bottom:1rem;">
            <div>
                <label>Judul Artikel *</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}" placeholder="Judul artikel blog kamu" required>
            </div>

            <div>
                <label>Kategori *</label>
                <input type="text" name="category" value="{{ old('category', $post->category) }}" placeholder="Laravel, Vue.js, Tips & Tricks, Career" required>
            </div>

            <div>
                <label>Excerpt (Ringkasan singkat) *</label>
                <textarea name="excerpt" rows="2" placeholder="Ringkasan singkat untuk tampilan kartu blog..." required>{{ old('excerpt', $post->excerpt) }}</textarea>
            </div>

            <div>
                <label>Isi Artikel *</label>
                <textarea name="body" rows="12" placeholder="Tulis isi artikel lengkap di sini..." required style="font-family:monospace;line-height:1.6;">{{ old('body', $post->body) }}</textarea>
            </div>

            <div>
                <label>Thumbnail</label>
                @if($post->thumbnail)
                <div style="margin-bottom:0.75rem;padding:0.5rem;background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.05);border-radius:8px;display:inline-block;">
                    <img src="{{ Storage::url($post->thumbnail) }}" style="width:120px;border-radius:4px;display:block;">
                </div>
                @endif
                <input type="file" name="thumbnail" accept="image/*"
                       style="color:#64748b;cursor:pointer;padding:0.5rem 0.875rem;">
                <p style="font-size:0.6875rem;color:#334155;margin-top:0.25rem;">Kosongkan jika tidak ingin mengganti gambar thumbnail.</p>
            </div>

            <div style="display:flex;align-items:center;gap:0.75rem;padding:1rem;background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.05);border-radius:8px;">
                <input type="checkbox" name="is_published" id="published" value="1"
                       {{ old('is_published', $post->is_published) ? 'checked' : '' }}
                       style="width:16px;height:16px;accent-color:#3b82f6;cursor:pointer;">
                <label for="published" style="margin:0;text-transform:none;letter-spacing:normal;font-size:0.875rem;color:#94a3b8;font-weight:500;cursor:pointer;">
                    Publish sekarang (artikel akan langsung terlihat publik)
                </label>
            </div>
        </div>

        <div style="display:flex;gap:0.75rem;">
            <button type="submit" class="btn-primary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                Update Artikel
            </button>
            <a href="{{ route('admin.posts.index') }}" class="btn-outline">Batal</a>
        </div>
    </form>
</div>

@endsection