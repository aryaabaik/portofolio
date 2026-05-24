<section id="contact" class="py-32 px-6 relative" style="background:rgba(255,255,255,0.012);">

    {{-- Decorative glow --}}
    <div class="glow-orb" style="width:600px;height:300px;background:#3b82f6;bottom:-100px;left:50%;transform:translateX(-50%);opacity:0.06;filter:blur(100px);border-radius:50%;pointer-events:none;"></div>

    <div class="max-w-3xl mx-auto relative z-10">

        <div class="text-center" style="margin-bottom:4rem;">
            <div data-reveal><span class="section-label" style="justify-content:center;">Contact</span></div>
            <h2 data-reveal data-delay="100" class="section-title" style="margin-top:0.5rem;">
                Mari <span class="gradient-text">bekerja sama</span>
            </h2>
            <p data-reveal data-delay="200" style="color:#475569;margin-top:1rem;font-size:0.9375rem;line-height:1.7;">
                Punya project menarik? Saya siap membantu mewujudkannya.
            </p>
        </div>

        <div data-reveal data-delay="150" class="glass-card" style="padding:2.5rem 2rem;">
            <form id="contact-form" novalidate>
                @csrf
                <div class="grid md:grid-cols-2 gap-4" style="margin-bottom:1rem;">
                    <div>
                        <label style="display:block;font-size:0.75rem;font-weight:600;color:#475569;text-transform:uppercase;letter-spacing:0.08em;margin-bottom:0.5rem;">Nama</label>
                        <input type="text" name="name" id="f-name" placeholder="Nama lengkap kamu" class="form-input" required>
                        <p class="field-error" id="err-name" style="font-size:0.75rem;color:#f87171;margin-top:0.375rem;display:none;"></p>
                    </div>
                    <div>
                        <label style="display:block;font-size:0.75rem;font-weight:600;color:#475569;text-transform:uppercase;letter-spacing:0.08em;margin-bottom:0.5rem;">Email</label>
                        <input type="email" name="email" id="f-email" placeholder="email@kamu.com" class="form-input" required>
                        <p class="field-error" id="err-email" style="font-size:0.75rem;color:#f87171;margin-top:0.375rem;display:none;"></p>
                    </div>
                </div>

                <div style="margin-bottom:1rem;">
                    <label style="display:block;font-size:0.75rem;font-weight:600;color:#475569;text-transform:uppercase;letter-spacing:0.08em;margin-bottom:0.5rem;">Subject</label>
                    <input type="text" name="subject" id="f-subject" placeholder="Perihal pesan kamu" class="form-input" required>
                    <p class="field-error" id="err-subject" style="font-size:0.75rem;color:#f87171;margin-top:0.375rem;display:none;"></p>
                </div>

                <div style="margin-bottom:1.75rem;">
                    <label style="display:block;font-size:0.75rem;font-weight:600;color:#475569;text-transform:uppercase;letter-spacing:0.08em;margin-bottom:0.5rem;">Pesan</label>
                    <textarea name="message" id="f-message" rows="5" placeholder="Ceritakan project atau kebutuhan kamu..." class="form-input" style="resize:vertical;min-height:130px;" required></textarea>
                    <p class="field-error" id="err-message" style="font-size:0.75rem;color:#f87171;margin-top:0.375rem;display:none;"></p>
                </div>

                <button type="submit" id="contact-btn" class="btn-primary" style="width:100%;justify-content:center;">
                    <span id="btn-text">Kirim Pesan</span>
                    <svg id="btn-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    <svg id="btn-spinner" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" style="display:none;animation:spin 0.8s linear infinite;"><circle cx="12" cy="12" r="10" stroke-opacity="0.25"/><path d="M12 2a10 10 0 0 1 10 10" stroke-opacity="1"/></svg>
                </button>

                <div id="form-result" style="margin-top:1.25rem;padding:0.875rem 1.25rem;border-radius:10px;font-size:0.875rem;font-weight:500;display:none;text-align:center;"></div>
            </form>
        </div>

        {{-- Contact info row --}}
        <div data-reveal data-delay="300" class="grid grid-cols-1 sm:grid-cols-3 gap-3" style="margin-top:1.5rem;">
            @foreach([
                ['Email', 'aryaadhitya158@gmail.com', 'M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z M22,6 L12,13 L2,6'],
                ['LinkedIn', 'linkedin.com/in/arya', 'M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z M2 9h4v12H2z M4 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4z'],
                ['GitHub', 'github.com/aryaabaik', 'M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22'],
            ] as [$label, $value, $icon])
            <div class="glass-card text-center" style="padding:1.25rem 0.75rem;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="1.75" stroke-linecap="round" style="margin:0 auto 0.625rem;">
                    <path d="{{ $icon }}"/>
                </svg>
                <p style="font-size:0.6875rem;font-weight:700;color:#334155;text-transform:uppercase;letter-spacing:0.08em;margin-bottom:0.25rem;">{{ $label }}</p>
                <p style="font-size:0.6875rem;color:#475569;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $value }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
@keyframes spin { to { transform: rotate(360deg); } }
</style>

<script>
document.getElementById('contact-form').addEventListener('submit', async function(e) {
    e.preventDefault();

    // Clear previous errors
    document.querySelectorAll('.field-error').forEach(el => { el.style.display = 'none'; el.textContent = ''; });
    document.getElementById('form-result').style.display = 'none';

    const btn     = document.getElementById('contact-btn');
    const btnText = document.getElementById('btn-text');
    const btnIcon = document.getElementById('btn-icon');
    const spinner = document.getElementById('btn-spinner');
    const result  = document.getElementById('form-result');

    const formData = {
        name:    this.querySelector('[name=name]').value.trim(),
        email:   this.querySelector('[name=email]').value.trim(),
        subject: this.querySelector('[name=subject]').value.trim(),
        message: this.querySelector('[name=message]').value.trim(),
        _token:  this.querySelector('[name=_token]').value,
    };

    // Client-side validation
    let hasError = false;
    if (!formData.name)    { showFieldError('err-name', 'Nama wajib diisi.'); hasError = true; }
    if (!formData.email)   { showFieldError('err-email', 'Email wajib diisi.'); hasError = true; }
    if (!formData.subject) { showFieldError('err-subject', 'Subject wajib diisi.'); hasError = true; }
    if (!formData.message) { showFieldError('err-message', 'Pesan wajib diisi.'); hasError = true; }
    if (hasError) return;

    // Loading state
    btn.disabled = true;
    btnText.textContent = 'Mengirim...';
    btnIcon.style.display = 'none';
    spinner.style.display = 'block';

    try {
        const res  = await fetch('/contact', {
            method: 'POST',
            headers: {
                'Content-Type':  'application/json',
                'Accept':        'application/json',
                'X-CSRF-TOKEN':  formData._token,
            },
            body: JSON.stringify(formData),
        });

        const data = await res.json();

        if (!res.ok) {
            if (data.errors) {
                Object.entries(data.errors).forEach(([field, msgs]) => {
                    showFieldError('err-' + field, msgs[0]);
                });
            } else {
                showResult(data.message || 'Terjadi kesalahan.', false);
            }
        } else {
            showResult(data.message, true);
            this.reset();
        }
    } catch (err) {
        showResult('Koneksi gagal. Silakan coba lagi.', false);
    }

    btn.disabled = false;
    btnText.textContent = 'Kirim Pesan';
    btnIcon.style.display = 'block';
    spinner.style.display = 'none';
});

function showFieldError(id, msg) {
    const el = document.getElementById(id);
    if (!el) return;
    el.textContent = msg;
    el.style.display = 'block';
}

function showResult(msg, success) {
    const el = document.getElementById('form-result');
    el.textContent = msg;
    el.style.display = 'block';
    el.style.background  = success ? 'rgba(16,185,129,0.08)' : 'rgba(239,68,68,0.08)';
    el.style.border      = success ? '1px solid rgba(16,185,129,0.2)' : '1px solid rgba(239,68,68,0.2)';
    el.style.color       = success ? '#34d399' : '#f87171';
}
</script>