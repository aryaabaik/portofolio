<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Syne:wght@700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                background: #030712;
                color: #e2e8f0;
                font-family: 'Inter', sans-serif;
                overflow-x: hidden;
            }
            .glass-card {
                background: rgba(255, 255, 255, 0.025);
                border: 1px solid rgba(255, 255, 255, 0.06);
                border-radius: 16px;
                backdrop-filter: blur(8px);
            }
            /* Style inputs inside guest forms */
            input[type="text"], input[type="email"], input[type="password"] {
                background: rgba(255, 255, 255, 0.04) !important;
                border: 1px solid rgba(255, 255, 255, 0.08) !important;
                color: #f1f5f9 !important;
                border-radius: 8px !important;
            }
            input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
                border-color: rgba(59, 130, 246, 0.5) !important;
                box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.08) !important;
            }
            label {
                color: #94a3b8 !important;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative px-4">
            
            {{-- Glow orb --}}
            <div class="glow-orb" style="width:400px;height:200px;background:#3b82f6;top:20%;left:50%;transform:translate(-50%,-50%);opacity:0.08;filter:blur(100px);position:absolute;pointer-events:none;"></div>
            
            <div class="z-10 mb-6">
                <a href="/" style="text-decoration:none;">
                    <p style="font-family:'Syne',sans-serif;font-size:1.5rem;font-weight:800;background:linear-gradient(135deg,#3b82f6,#06b6d4);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;margin:0;">
                        {{ config('app.name') }}
                    </p>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-2 px-8 py-8 glass-card z-10 shadow-2xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
