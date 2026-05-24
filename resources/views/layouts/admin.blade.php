<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Syne:wght@700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        body { background:#050b18; color:#e2e8f0; font-family:'Inter',sans-serif; min-height:100vh; cursor:default; }
        * { box-sizing:border-box; }
        ::selection { background:rgba(59,130,246,0.25); color:#fff; }

        /* Input overrides for admin */
        input, select, textarea {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 8px;
            padding: 0.625rem 0.875rem;
            font-size: 0.875rem;
            color: #e2e8f0;
            outline: none;
            width: 100%;
            font-family: 'Inter', sans-serif;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        input:focus, select:focus, textarea:focus {
            border-color: rgba(59,130,246,0.5);
            box-shadow: 0 0 0 3px rgba(59,130,246,0.08);
        }
        input::placeholder, textarea::placeholder { color: #1e3a5f; }
        label { font-size:0.75rem; font-weight:600; color:#64748b; text-transform:uppercase; letter-spacing:0.08em; display:block; margin-bottom:0.4rem; }

        /* Table */
        .admin-table { width:100%; border-collapse:collapse; font-size:0.8125rem; }
        .admin-table thead tr { border-bottom:1px solid rgba(255,255,255,0.06); }
        .admin-table th { padding:0.75rem 1rem; text-align:left; font-size:0.6875rem; font-weight:700; text-transform:uppercase; letter-spacing:0.1em; color:#334155; }
        .admin-table tbody tr { border-bottom:1px solid rgba(255,255,255,0.04); transition:background 0.15s; }
        .admin-table tbody tr:hover { background:rgba(255,255,255,0.02); }
        .admin-table td { padding:0.875rem 1rem; color:#94a3b8; vertical-align:middle; }
        .admin-table td:first-child { color:#e2e8f0; font-weight:500; }

        /* Buttons */
        .btn-sm { display:inline-flex; align-items:center; gap:0.375rem; font-size:0.75rem; font-weight:600; padding:0.375rem 0.875rem; border-radius:7px; transition:all 0.2s; border:none; cursor:pointer; text-decoration:none; }
        .btn-sm-primary { background:rgba(59,130,246,0.15); color:#60a5fa; border:1px solid rgba(59,130,246,0.2); }
        .btn-sm-primary:hover { background:rgba(59,130,246,0.25); }
        .btn-sm-danger  { background:rgba(239,68,68,0.1);  color:#f87171; border:1px solid rgba(239,68,68,0.2); }
        .btn-sm-danger:hover  { background:rgba(239,68,68,0.2); }
        .btn-sm-success { background:rgba(16,185,129,0.1); color:#34d399; border:1px solid rgba(16,185,129,0.2); }
        .btn-sm-success:hover { background:rgba(16,185,129,0.2); }

        /* Alert */
        .alert-success { background:rgba(16,185,129,0.08); border:1px solid rgba(16,185,129,0.2); color:#34d399; padding:0.75rem 1rem; border-radius:10px; font-size:0.875rem; margin-bottom:1.5rem; }
        .alert-error   { background:rgba(239,68,68,0.08);  border:1px solid rgba(239,68,68,0.2);  color:#f87171; padding:0.75rem 1rem; border-radius:10px; font-size:0.875rem; margin-bottom:1.5rem; }

        /* Badge */
        .badge { display:inline-flex; align-items:center; font-size:0.6875rem; font-weight:600; padding:0.2rem 0.6rem; border-radius:6px; }
        .badge-blue   { background:rgba(59,130,246,0.1);  color:#60a5fa;  border:1px solid rgba(59,130,246,0.2); }
        .badge-green  { background:rgba(16,185,129,0.1);  color:#34d399;  border:1px solid rgba(16,185,129,0.2); }
        .badge-gray   { background:rgba(255,255,255,0.05); color:#64748b; border:1px solid rgba(255,255,255,0.08); }
    </style>
</head>
<body>
<div style="display:flex;min-height:100vh;">

    {{-- Sidebar --}}
    <aside class="admin-sidebar" style="position:sticky;top:0;height:100vh;overflow-y:auto;">

        {{-- Logo --}}
        <div style="padding:1.5rem 1.25rem;border-bottom:1px solid rgba(255,255,255,0.05);">
            <a href="{{ route('admin.dashboard') }}" style="text-decoration:none;">
                <p style="font-family:'Syne',sans-serif;font-size:0.9375rem;font-weight:800;background:linear-gradient(135deg,#3b82f6,#06b6d4);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">
                    {{ config('app.name') }}
                </p>
                <p style="font-size:0.6875rem;color:#1e3a5f;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;margin-top:0.15rem;">Admin Panel</p>
            </a>
        </div>

        {{-- Nav --}}
        <nav style="padding:1rem 0.75rem;flex:1;">
            <p style="font-size:0.625rem;font-weight:700;color:#1e3a5f;text-transform:uppercase;letter-spacing:0.12em;padding:0 0.25rem;margin-bottom:0.5rem;">Menu</p>

            <a href="{{ route('admin.dashboard') }}"
               class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                Dashboard
            </a>

            <a href="{{ route('admin.projects.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                Projects
            </a>

            <a href="{{ route('admin.posts.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.posts*') ? 'active' : '' }}">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                Blog Posts
            </a>

            <a href="{{ route('admin.contacts.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.contacts*') ? 'active' : '' }}">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                Pesan Masuk
            </a>

            <div style="margin-top:1rem;padding-top:1rem;border-top:1px solid rgba(255,255,255,0.04);">
                <a href="/" target="_blank" class="admin-nav-link">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    Lihat Website
                </a>
            </div>
        </nav>

        {{-- User & Logout --}}
        <div style="padding:1rem 0.75rem;border-top:1px solid rgba(255,255,255,0.05);">
            <div style="display:flex;align-items:center;gap:0.75rem;padding:0.75rem;border-radius:10px;background:rgba(255,255,255,0.02);margin-bottom:0.75rem;">
                <div style="width:32px;height:32px;border-radius:50%;background:rgba(59,130,246,0.15);border:1px solid rgba(59,130,246,0.2);display:flex;align-items:center;justify-content:center;font-size:0.75rem;font-weight:700;color:#60a5fa;flex-shrink:0;">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div style="min-width:0;">
                    <p style="font-size:0.8125rem;font-weight:600;color:#e2e8f0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <p style="font-size:0.6875rem;color:#334155;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ auth()->user()->email ?? '' }}</p>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="admin-nav-link" style="width:100%;text-align:left;background:none;border:none;cursor:pointer;color:#475569;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- Main content --}}
    <main style="flex:1;padding:2.5rem;min-width:0;overflow:auto;">
        @yield('content')
    </main>

</div>
</body>
</html>