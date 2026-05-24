@extends('layouts.admin')
@section('content')

<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:2rem;flex-wrap:wrap;gap:1rem;">
    <div>
        <h1 style="font-family:'Syne',sans-serif;font-size:1.5rem;font-weight:800;color:#f1f5f9;margin-bottom:0.25rem;">Projects</h1>
        <p style="font-size:0.8125rem;color:#334155;">Kelola semua project portfolio kamu.</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn-sm btn-sm-primary" style="padding:0.5rem 1.25rem;">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Tambah Project
    </a>
</div>

@if(session('success'))
<div class="alert-success">{{ session('success') }}</div>
@endif

<div class="admin-card" style="padding:0;overflow:hidden;">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Tech Stack</th>
                <th>Featured</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $p)
            <tr>
                <td>{{ $p->title }}</td>
                <td><span class="badge badge-blue">{{ $p->category }}</span></td>
                <td>
                    <div style="display:flex;gap:0.25rem;flex-wrap:wrap;">
                        @foreach(array_slice($p->tech_stack, 0, 3) as $tech)
                        <span class="badge badge-gray">{{ $tech }}</span>
                        @endforeach
                        @if(count($p->tech_stack) > 3)
                        <span class="badge badge-gray">+{{ count($p->tech_stack) - 3 }}</span>
                        @endif
                    </div>
                </td>
                <td>
                    @if($p->is_featured)
                    <span class="badge badge-green">Featured</span>
                    @else
                    <span class="badge badge-gray">Tidak</span>
                    @endif
                </td>
                <td>
                    <div style="display:flex;gap:0.5rem;align-items:center;">
                        <a href="{{ route('admin.projects.edit', $p) }}" class="btn-sm btn-sm-primary">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                            Edit
                        </a>
                        <form action="{{ route('admin.projects.destroy', $p) }}" method="POST"
                              onsubmit="return confirm('Hapus project ini?')" style="margin:0;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-sm btn-sm-danger">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6 M14 11v6"/></svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center;padding:3rem 1rem;color:#1e3a5f;">
                    Belum ada project. <a href="{{ route('admin.projects.create') }}" style="color:#60a5fa;">Tambah sekarang</a>.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection