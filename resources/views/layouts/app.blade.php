<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ darkMode: localStorage.getItem('dark') === 'true' }"
      x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
      x-bind:class="darkMode ? 'dark' : ''">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Portfolio - My projects and case studies')">

    <title>@yield('title', config('app.name', 'My Portfolio'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/qq.png') }}">

    {{-- Lucide Icons --}}
    <script src="https://cdn.jsdelivr.net/npm/lucide@latest"></script>
</head>
@php
    use App\Models\ConversationMessage;

    $userUnread = 0;

    if(session()->has('contact_id')) {
        $userUnread = ConversationMessage::where('contact_id', session('contact_id'))
                        ->where('sender_type', 'admin')
                        ->where('is_read', false)
                        ->count();
    }
@endphp

<body class="antialiased bg-gray-50 dark:bg-gray-900 dark:text-gray-100 text-slate-800 transition-colors duration-300">

<div id="app" class="min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    <header 
        x-data="{ scrolled: false, menuOpen: false, userMenu: false }"
        x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 20)"
        :class="scrolled 
    ? 'shadow-sm bg-white dark:bg-gray-800'
    : 'bg-white dark:bg-gray-800'"

        class="fixed top-0 left-0 w-full z-50 transition-all duration-300 ease-in-out">

        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- Logo --}}
                <div class="flex items-center gap-2">
                    <a href="{{ route('welcome') }}" class="flex items-center gap-2">
                        <img src="{{ asset('images/qq.png') }}" class="h-14 w-14">
                        <span :class="scrolled ? 'text-sky-600' : 'text-white'"
                              class="text-lg font-semibold transition">
                            My <span class="text-slate-400">Portfolio</span>
                        </span>
                    </a>

                    {{-- Dark Mode Toggle --}}
                    <button 
                        @click="darkMode = !darkMode"
                        class="ml-4 relative w-14 h-7 bg-gray-300 dark:bg-gray-700 rounded-full flex items-center transition-all duration-300">

                        {{-- Sun --}}
                        <i data-lucide="sun"
                           class="w-5 h-5 absolute left-1 text-yellow-400 transition-opacity duration-300"
                           :class="darkMode ? 'opacity-0' : 'opacity-100'"></i>

                        {{-- Moon --}}
                        <i data-lucide="moon"
                           class="w-5 h-5 absolute right-1 text-gray-200 transition-opacity duration-300"
                           :class="darkMode ? 'opacity-100' : 'opacity-0'"></i>

                        {{-- Round slider --}}
                        <div class="absolute w-6 h-6 bg-white dark:bg-gray-900 rounded-full shadow transform transition-all duration-300"
                             :class="darkMode ? 'translate-x-7' : 'translate-x-1'">
                        </div>
                    </button>
                </div>

                {{-- Desktop Navigation --}}
                <nav class="hidden md:flex items-center gap-6">
                    @php
                        $links = [
                            ['route' => 'welcome', 'label' => 'Home'],
                            ['route' => 'projects.index', 'label' => ' My Projects'],
                            ['route' => 'about', 'label' => 'About me'],
                            ['route' => 'contact', 'label' => 'Contact me'],
                        ];
                    @endphp

                    @foreach($links as $link)
                        <a href="{{ route($link['route']) }}"
                           :class="scrolled ? 'text-slate-700 hover:text-sky-600' : 'text-white hover:text-sky-200'"
                           class="text-sm font-medium transition-colors duration-200 
                           {{ request()->routeIs($link['route']) ? 'underline underline-offset-4 font-semibold' : '' }}">
                            {{ $link['label'] }}
                        </a>
                    @endforeach

    <div x-data="{ notify:false }" class="relative">
    <button @click="notify=!notify"
        class="relative p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition">
        <i data-lucide="bell" class="w-6 h-6 text-slate-700 dark:text-gray-200"></i>

        {{-- Counter --}}
        @php
            $userUnread = auth()->user() ? auth()->user()->unreadNotifications->count() : 0;
        @endphp

        @if($userUnread > 0)
        <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs px-1.5 py-0.5 rounded-full">
            {{ $userUnread }}
        </span>
        @endif
    </button>

    <div x-show="notify"
         @click.outside="notify=false"
         x-transition
         class="absolute right-0 mt-3 w-96 p-4 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-200 dark:border-gray-700 z-50">

        <h3 class="text-lg font-semibold text-slate-700 dark:text-gray-200 mb-3">
            Notifications
        </h3>

        @php
            $notifications = auth()->user() ? auth()->user()->notifications()->latest()->take(5)->get() : collect();
        @endphp

        @if($notifications->isEmpty())
            <p class="text-sm text-gray-500 dark:text-gray-400">No new notifications.</p>
        @else
            <ul class="space-y-3 max-h-80 overflow-y-auto">
                @foreach($notifications as $notif)
                <li class="p-3 bg-gray-100 dark:bg-gray-700 rounded-lg flex flex-col">
                    <p class="text-sm text-slate-700 dark:text-gray-200">
                        {{ $notif->data['message'] }}
                    </p>
                    <span class="text-xs text-gray-400 dark:text-gray-300 mt-1">
                        {{ $notif->created_at->format('d M, H:i') }}
                    </span>
                    <a href="{{ route('messages.chat', $notif->data['contact_id']) }}" 
                       class="text-xs text-sky-600 dark:text-sky-400 mt-1 hover:underline">
                        View conversation →
                    </a>
                </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>



</nav>

                {{-- Auth Menu --}}
                <div class="flex items-center gap-3">
                    @auth
                        <div class="relative" @click.away="userMenu = false">
                            <button 
                                @click="userMenu = !userMenu" 
                                class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-white/10">

                                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-sky-600 text-white font-semibold uppercase">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>

                                <span :class="scrolled ? 'text-slate-700' : 'text-white'"
                                      class="hidden sm:block text-sm font-medium">
                                    {{ Auth::user()->name }}
                                </span>
                            </button>

                            {{-- User Dropdown --}}
                            {{-- User Dropdown --}}
<div x-show="userMenu" x-transition
     class="absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 border dark:border-gray-700 rounded-xl shadow-lg py-2 z-50">

    <a href="{{ route('dashboard') }}" 
       class="block px-4 py-2 text-sm text-slate-700 dark:text-gray-200 hover:bg-slate-50 dark:hover:bg-gray-700">
        Dashboard
    </a>

    <a href="{{ route('profile.edit') }}" 
       class="block px-4 py-2 text-sm text-slate-700 dark:text-gray-200 hover:bg-slate-50 dark:hover:bg-gray-700">
        Profile
    </a>

    {{-- Messages Button (inside dropdown) --}}
    <div x-data="{ openChat:false }" class="relative">
        <button @click="openChat = !openChat"
                class="w-full text-left px-4 py-2 text-sm flex items-center gap-2 
                       text-slate-700 dark:text-gray-200 hover:bg-slate-50 dark:hover:bg-gray-700">

            Messages

            {{-- Unread Count --}}
            @if(isset($unreadMessages) && $unreadMessages > 0)
                <span class="ml-auto bg-red-600 text-white text-xs px-2 py-0.5 rounded-full">
                    {{ $unreadMessages }}
                </span>
            @endif
        </button>

        {{-- Chat Preview --}}
        <div x-show="openChat"
             @click.outside="openChat=false"
             x-transition
             class="absolute left-0 mt-2 w-80 p-4 bg-white dark:bg-gray-800 rounded-xl shadow-xl 
                    border border-gray-200 dark:border-gray-700 z-50">

            <h3 class="text-lg font-bold text-slate-800 dark:text-gray-200 mb-3">Messages</h3>

            @php
                $contact = \App\Models\Contact::where('user_id', Auth::id())->first();
                $lastMessages = $contact
                    ? $contact->messages()->latest()->take(5)->get()
                    : collect([]);
            @endphp

            @if($lastMessages->count() == 0)
                <p class="text-sm text-gray-500 dark:text-gray-400">No messages yet.</p>
            @else
            <div class="space-y-3 max-h-64 overflow-y-auto">

                @foreach($lastMessages as $msg)
                    <div class="p-3 rounded-lg 
                        {{ $msg->sender_type == 'admin'
                            ? 'bg-sky-100 dark:bg-sky-700/40 text-sky-900 dark:text-white'
                            : 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white'
                        }}">
                            <div class="flex justify-between items-center">
                                <span class="font-semibold text-sm">
                                    {{ $msg->sender_type == 'admin' ? 'Eng-Yara' : 'You' }}
                                </span>

                                <span class="text-xs text-gray-500 dark:text-gray-300">
                                    {{ $msg->created_at->format('d M, H:i') }}
                                </span>
                            </div>

                            <p class="text-sm mt-1">
                                {{ Str::limit($msg->message, 70) }}
                            </p>
                    </div>
                @endforeach

            </div>

            <a href="{{ route('messages.chat', $contact->id ?? 0) }}"
                class="mt-3 block text-center text-sky-600 dark:text-sky-400 hover:underline text-sm">
                Open full chat →
            </a>
            @endif
        </div>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" 
            class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900">
            Logout
        </button>
    </form>

</div>

                        </div>

                    @else
                        <a href="{{ route('login') }}"
                           class="px-4 py-2 rounded-md text-sm bg-sky-600 hover:bg-sky-700 text-white shadow transition">
                            Login
                        </a>
                    @endauth

                    {{-- Mobile Menu Button --}}
                    <button @click="menuOpen = !menuOpen" class="md:hidden p-2 rounded-md hover:bg-white/10">
                        <i data-lucide="menu"
                           :class="scrolled ? 'text-slate-700' : 'text-white'"
                           class="w-6 h-6"></i>
                    </button>
                </div>

            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="menuOpen" x-transition class="md:hidden bg-white dark:bg-gray-800 border-t shadow">
            <div class="px-4 py-3 space-y-2">
                @foreach($links as $link)
                    <a href="{{ route($link['route']) }}"
                       class="block text-sm font-medium text-slate-700 dark:text-gray-200">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </div>

    </header>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 pt-15">
        @yield('hero')
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
            @yield('content')
            
        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="bg-white dark:bg-gray-800 border-t dark:border-gray-700">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col md:flex-row items-center justify-between gap-4">

            <div class="text-sm text-slate-600 dark:text-gray-300">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </div>

            <div class="flex items-center gap-3">
                 <a href="{{ route('privacy') }}" class="text-sm hover:text-sky-600">Privacy</a>
                 <a href="{{ route('terms') }}" class="text-sm hover:text-sky-600">Terms</a>
                <a href="{{ route('contact') }}" class="text-sm hover:text-sky-600">Contact me</a>
            </div>

        </div>
    </footer>

</div>

{{-- Lucide Init --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
        lucide.createIcons();
    });
</script>

@stack('scripts')

</body>
</html>
