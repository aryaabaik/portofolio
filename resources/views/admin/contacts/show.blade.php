@extends('layouts.admin')
@section('content')

<div style="margin-bottom:2rem;">
    <a href="{{ route('admin.contacts.index') }}" class="btn-sm btn-sm-primary" style="margin-bottom:1.5rem;display:inline-flex;">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="15 18 9 12 15 6"/></svg>
        Kembali
    </a>
    <h1 style="font-family:'Syne',sans-serif;font-size:1.5rem;font-weight:800;color:#f1f5f9;margin-bottom:0.25rem;">Detail Pesan</h1>
    <p style="font-size:0.8125rem;color:#334155;">Diterima pada {{ $contact->created_at->format('d M Y, H:i') }}</p>
</div>

@if(session('success'))
<div class="alert-success" style="margin-bottom:1.5rem; max-width:680px;">
    {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="alert-error" style="margin-bottom:1.5rem; max-width:680px;">
    <ul style="margin:0;padding-left:1rem;list-style:disc;">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div style="max-width:680px; display:flex; flex-direction:column; gap:1.5rem;">
    {{-- Message Detail Card --}}
    <div class="admin-card" style="display:flex;flex-direction:column;gap:1.5rem;">

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
            <div>
                <label>Nama Pengirim</label>
                <p style="font-size:0.9375rem;font-weight:600;color:#e2e8f0;">{{ $contact->name }}</p>
            </div>
            <div>
                <label>Email</label>
                <a href="mailto:{{ $contact->email }}" style="font-size:0.9375rem;color:#60a5fa;font-weight:500;text-decoration:none;">
                    {{ $contact->email }}
                </a>
            </div>
        </div>

        <div style="border-top:1px solid rgba(255,255,255,0.05);padding-top:1.5rem;">
            <label>Subject</label>
            <p style="font-size:0.9375rem;font-weight:600;color:#e2e8f0;">{{ $contact->subject }}</p>
        </div>

        <div style="border-top:1px solid rgba(255,255,255,0.05);padding-top:1.5rem;">
            <label>Pesan</label>
            <div style="background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.05);border-radius:10px;padding:1.25rem;font-size:0.875rem;line-height:1.8;color:#94a3b8;white-space:pre-wrap;margin-top:0.25rem;">{{ $contact->message }}</div>
        </div>

        <div style="border-top:1px solid rgba(255,255,255,0.05);padding-top:1.5rem;display:flex;gap:0.75rem;flex-wrap:wrap;">
            <button onclick="document.getElementById('reply-section').scrollIntoView({ behavior: 'smooth' }); document.getElementById('reply_message').focus();"
                    class="btn-sm btn-sm-primary" style="padding:0.5rem 1.25rem;">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                Balas via Email
            </button>
            <a href="{{ route('admin.contacts.index') }}" class="btn-sm btn-sm-danger">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="15 18 9 12 15 6"/></svg>
                Kembali ke Daftar
            </a>
        </div>
    </div>

    {{-- Reply Form Card --}}
    <div id="reply-section" class="admin-card">
        <h2 style="font-family:'Syne',sans-serif;font-size:1.125rem;font-weight:800;color:#f1f5f9;margin-bottom:0.25rem; display:flex; align-items:center; gap:0.5rem;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.5" stroke-linecap="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            Kirim Balasan via Email
        </h2>
        <p style="font-size:0.75rem;color:#64748b;margin-bottom:1.25rem;">Email balasan akan langsung dikirimkan ke {{ $contact->email }} via Mailtrap/SMTP.</p>

        <form action="{{ route('admin.contacts.reply', $contact) }}" method="POST">
            @csrf
            <div style="margin-bottom:1.25rem;">
                <label for="reply_message">Pesan Balasan *</label>
                <textarea id="reply_message" name="reply_message" rows="6" placeholder="Tulis isi pesan balasan email Anda di sini..." required style="line-height:1.6;"></textarea>
            </div>
            <div style="display:flex;gap:0.75rem;">
                <button type="submit" class="btn-sm btn-sm-success" style="padding:0.625rem 1.5rem; font-size:0.8125rem; border-radius:8px;">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" style="margin-right:0.25rem; display:inline-block; vertical-align:middle;"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    Kirim Balasan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
