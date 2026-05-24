@component('mail::message')
# Pesan dari {{ $senderName }}

**Email:** {{ $senderEmail }}
**Subject:** {{ $contactSubject }}

---

{{ $body }}

---
*Pesan ini dikirim melalui form kontak portofolio.*
@endcomponent
