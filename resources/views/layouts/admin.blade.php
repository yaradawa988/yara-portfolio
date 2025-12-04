<!doctype html>
<html lang="en"
      x-data="{ darkMode: localStorage.getItem('dark') === 'true' }"
      x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
      x-bind:class="darkMode ? 'dark' : ''">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>
    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
@php
 use App\Models\Contact;


$unread = Contact::where('status', 'pending')->count();


$messages = Contact::latest()->take(5)->get();


@endphp

<body class="bg-gray-100 dark:bg-gray-900 text-slate-800 dark:text-gray-200 transition-colors duration-300">

    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-white dark:bg-gray-800 shadow-lg dark:shadow-gray-700 flex flex-col p-5 transition-colors duration-300">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-sky-600 dark:text-sky-400">My <span class="text-slate-400 dark:text-gray-400">Portfolio</span></h2>
                {{-- Dark Mode Toggle --}}
                <button @click="darkMode = !darkMode" class="p-2 rounded hover:bg-slate-200 dark:hover:bg-gray-700 transition">
                    <i x-show="!darkMode" data-lucide="moon" class="w-5 h-5"></i>
                    <i x-show="darkMode" data-lucide="sun" class="w-5 h-5"></i>
                </button>
            </div>

            <nav class="flex-1 space-y-3">
                <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-sky-50 dark:hover:bg-sky-600/20 {{ request()->is('admin/dashboard') ? 'bg-sky-100 dark:bg-sky-700/20 text-sky-700 dark:text-sky-300 font-semibold' : '' }} transition-colors">
                    <i data-lucide="home" class="w-5 h-5 inline mr-2"></i> Dashboard
                </a>
                <a href="{{ route('admin.projects.index') }}" class="block px-3 py-2 rounded hover:bg-sky-50 dark:hover:bg-sky-600/20 transition-colors">
                    <i data-lucide="folder" class="w-5 h-5 inline mr-2"></i> Projects
                </a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-sky-50 dark:hover:bg-sky-600/20 transition-colors">
                    <i data-lucide="users" class="w-5 h-5 inline mr-2"></i> Users
                </a>
                 <a href="{{ route('admin.messages.index') }}" class="block px-3 py-2 rounded hover:bg-sky-50 dark:hover:bg-sky-600/20 transition-colors">
                    <i data-lucide="message-circle" class="w-5 h-5 inline mr-2"></i> Messages
                </a>
            </nav>

            <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                @csrf
                <button class="w-full px-3 py-2 bg-sky-600 dark:bg-sky-500 text-white rounded hover:bg-sky-700 dark:hover:bg-sky-600 flex items-center justify-center gap-2 transition-colors">
                    <i data-lucide="log-out"></i> Logout
                </button>
            </form>
        </aside>

        {{-- MAIN CONTENT --}}
       <main class="flex-1 p-8 bg-gray-100 dark:bg-gray-900 transition-colors duration-300">

    {{-- TOP BAR WITH NOTIFICATIONS --}}
    <div class="flex justify-end mb-6">

        <div x-data="{ open:false }" class="relative">

            {{-- Bell Button --}}
            <button @click="open=!open"
                class="relative p-2 rounded-full hover:bg-sky-100 dark:hover:bg-gray-800 transition">
                <i data-lucide="bell" class="w-6 h-6 text-slate-700 dark:text-gray-200"></i>

                {{-- Notification Counter --}}
                @if($unread > 0)
                <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs px-1.5 py-0.5 rounded-full">
                    {{ $unread }}
                </span>
                @endif
            </button>

            {{-- Dropdown --}}
            <div x-show="open"
                 @click.outside="open=false"
                 class="absolute right-0 mt-2 w-80 bg-white dark:bg-gray-800 rounded-xl shadow-lg p-4 z-50">
<h3 class="text-lg font-semibold text-slate-700 dark:text-gray-200 mb-3">
    Notifications
</h3>

@if($unread == 0)
    <p class="text-sm text-gray-500 dark:text-gray-400">No new messages.</p>
@else
    <ul class="space-y-3">
        @foreach($messages as $msg)
            <li class="border-b border-gray-200 dark:border-gray-700 pb-2">
                <div class="flex justify-between">
                    <p class="font-semibold text-slate-700 dark:text-gray-200">
                        {{ $msg->name ?? 'Guest User' }}
                    </p>
                </div>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ Str::limit($msg->message, 40) }}
                </p>

                <a href="{{ route('admin.messages.show', $msg->id) }}"
                   class="text-sky-600 dark:text-sky-400 text-xs hover:underline">
                    View message →
                </a>
            </li>
        @endforeach
    </ul>
@endif


            </div>
        </div>

    </div>

    
    @yield('content')

</main>


    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            lucide.createIcons();
        });
    </script>

    @stack('scripts')
</body>
</html>
