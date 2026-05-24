@extends('layouts.admin')
@section('content')

<div style="margin-bottom:2rem;">
    <a href="{{ route('admin.projects.index') }}" class="btn-sm btn-sm-primary" style="margin-bottom:1.5rem;display:inline-flex;">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="15 18 9 12 15 6"/></svg>
        Kembali
    </a>
    <h1 style="font-family:'Syne',sans-serif;font-size:1.5rem;font-weight:800;color:#f1f5f9;margin-bottom:0.25rem;">Edit Project</h1>
    <p style="font-size:0.8125rem;color:#334155;">Ubah detail project portfolio: {{ $project->title }}</p>
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
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="admin-card" style="display:flex;flex-direction:column;gap:1.25rem;margin-bottom:1rem;">
            <div>
                <label>Judul Project *</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" placeholder="Nama project kamu" required>
            </div>

            <div>
                <label>Deskripsi *</label>
                <textarea name="description" rows="4" placeholder="Deskripsi singkat project..." required>{{ old('description', $project->description) }}</textarea>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                <div>
                    <label>Category</label>
                    <select name="category">
                        <option value="web"    {{ old('category', $project->category) === 'web'    ? 'selected' : '' }}>Web App</option>
                        <option value="mobile" {{ old('category', $project->category) === 'mobile' ? 'selected' : '' }}>Mobile</option>
                        <option value="api"    {{ old('category', $project->category) === 'api'    ? 'selected' : '' }}>API</option>
                        <option value="other"  {{ old('category', $project->category) === 'other'  ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div>
                    <label>Urutan (Order)</label>
                    <input type="number" name="order" value="{{ old('order', $project->order) }}" min="0">
                </div>
            </div>

            <div>
                <label>Tech Stack * (pisah dengan koma)</label>
                <input type="text" name="tech_stack" value="{{ old('tech_stack', implode(', ', $project->tech_stack)) }}" placeholder="Laravel, Vue.js, MySQL, Docker" required>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                <div>
                    <label>Demo URL</label>
                    <input type="url" name="demo_url" value="{{ old('demo_url', $project->demo_url) }}" placeholder="https://demo.example.com">
                </div>
                <div>
                    <label>GitHub URL</label>
                    <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}" placeholder="https://github.com/user/repo">
                </div>
            </div>

            <div>
                <label>Thumbnail</label>
                @if($project->thumbnail)
                <div style="margin-bottom:0.75rem;padding:0.5rem;background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.05);border-radius:8px;display:inline-block;">
                    <img src="{{ Storage::url($project->thumbnail) }}" style="width:120px;border-radius:4px;display:block;">
                </div>
                @endif
                <input type="file" name="thumbnail" accept="image/*"
                       style="color:#64748b;cursor:pointer;padding:0.5rem 0.875rem;">
                <p style="font-size:0.6875rem;color:#334155;margin-top:0.25rem;">Kosongkan jika tidak ingin mengganti gambar thumbnail.</p>
            </div>

            <div style="display:flex;align-items:center;gap:0.75rem;padding:1rem;background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.05);border-radius:8px;">
                <input type="checkbox" name="is_featured" id="featured" value="1"
                       {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}
                       style="width:16px;height:16px;accent-color:#3b82f6;cursor:pointer;">
                <label for="featured" style="margin:0;text-transform:none;letter-spacing:normal;font-size:0.875rem;color:#94a3b8;font-weight:500;cursor:pointer;">
                    Tampilkan sebagai project featured di halaman utama
                </label>
            </div>
        </div>

        <div style="display:flex;gap:0.75rem;">
            <button type="submit" class="btn-primary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                Update Project
            </button>
            <a href="{{ route('admin.projects.index') }}" class="btn-outline">Batal</a>
        </div>
    </form>
</div>

@endsection