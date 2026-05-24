@component('mail::message')
# Halo {{ $recipientName }},

Terima kasih telah menghubungi saya. Berikut adalah balasan untuk pesan Anda:

---

{{ $replyMessage }}

---

### Detail Pesan Anda Sebelumnya:
**Subject:** {{ $originalSubject }}

*{{ $originalMessage }}*

Salam hangat,  
**{{ config('app.name') }}**
@endcomponent
