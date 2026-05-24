@extends('layouts.admin')
@section('content')

<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:2rem;flex-wrap:wrap;gap:1rem;">
    <div>
        <h1 style="font-family:'Syne',sans-serif;font-size:1.5rem;font-weight:800;color:#f1f5f9;margin-bottom:0.25rem;">Pesan Masuk</h1>
        <p style="font-size:0.8125rem;color:#334155;">Total {{ $contacts->total() }} pesan diterima.</p>
    </div>
</div>

@if(session('success'))
<div class="alert-success">{{ session('success') }}</div>
@endif

<div class="admin-card" style="padding:0;overflow:hidden;">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td style="color:#60a5fa;">{{ $contact->email }}</td>
                <td>{{ Str::limit($contact->subject, 45) }}</td>
                <td style="white-space:nowrap;">{{ $contact->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('admin.contacts.show', $contact) }}" class="btn-sm btn-sm-primary">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        Detail
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center;padding:3rem 1rem;color:#1e3a5f;">
                    Belum ada pesan masuk.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($contacts->hasPages())
<div style="margin-top:1.5rem;display:flex;justify-content:flex-end;">
    {{ $contacts->links() }}
</div>
@endif

@endsection
