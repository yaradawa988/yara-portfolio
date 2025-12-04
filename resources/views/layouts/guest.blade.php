<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ darkMode: localStorage.getItem('dark') === 'true' }"
      x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
      x-bind:class="darkMode ? 'dark' : ''">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel Portfolio') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-b from-white dark:from-gray-900 to-slate-50 dark:to-gray-800 text-slate-800 dark:text-gray-100 transition-colors duration-300">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 py-6">

        <!-- Logo / Title -->
        <div class="mb-2 text-center reveal" data-delay="0">
            <a href="/" class="inline-flex flex-col items-center justify-center">
                <img src="{{ asset('images/qq.png') }}" alt="logo" class="h-20 w-20 drop-shadow dark:drop-shadow-lg">
            </a>
        </div>

        <!-- Page Content -->
        <div class="" data-delay="100">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <footer class="mt-12 text-xs text-slate-400 dark:text-gray-400 reveal" data-delay="200">
            &copy; {{ date('Y') }} {{ config('app.name', 'Portfolio') }} — All rights reserved.
        </footer>
    </div>

    <script>
        // Reveal animation for smooth entrance
        (function(){
            const reveals = document.querySelectorAll('.reveal');
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        const delay = parseInt(el.dataset.delay || '0', 10);
                        setTimeout(() => el.classList.add('reveal-show'), delay);
                        observer.unobserve(el);
                    }
                });
            }, { threshold: 0.15 });
            reveals.forEach(e => observer.observe(e));
        })();
    </script>
</body>
</html>
