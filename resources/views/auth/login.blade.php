<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center 
                bg-gradient-to-b from-white dark:from-gray-900 to-slate-50 dark:to-gray-800 
                px-4 py-4 sm:px-6 lg:px-8 transition-colors duration-300">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-2xl shadow-lg dark:shadow-gray-700 p-8 md:p-10 reveal" data-delay="100">
            
            {{-- Header --}}
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-slate-800 dark:text-slate-100">Welcome👋</h1>
                <p class="text-slate-500 dark:text-gray-300 mt-2 text-sm">
                    Sign in to continue to my portfolio dashboard
                </p>
            </div>

            {{-- Session Status --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            {{-- Login Form --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                {{-- Email --}}
                <div>
                    <x-input-label for="email" :value="__('Email Address')" 
                        class="font-semibold text-slate-700 dark:text-gray-200" />
                    <x-text-input 
                        id="email" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required autofocus 
                        autocomplete="username" 
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                               bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 
                               focus:border-sky-500 focus:ring focus:ring-sky-200 dark:focus:ring-sky-500 focus:ring-opacity-50"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                {{-- Password --}}
                <div>
                    <x-input-label for="password" :value="__('Password')" 
                        class="font-semibold text-slate-700 dark:text-gray-200" />
                    <x-text-input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required autocomplete="current-password"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                               bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 
                               focus:border-sky-500 focus:ring focus:ring-sky-200 dark:focus:ring-sky-500 focus:ring-opacity-50"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                </div>

                {{-- Remember Me + Forgot Password --}}
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" 
                               class="rounded border-gray-300 dark:border-gray-600 text-sky-600 shadow-sm focus:ring-sky-500">
                        <span class="ms-2 text-sm text-slate-600 dark:text-gray-200">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" 
                           class="text-sm text-sky-600 dark:text-sky-400 hover:underline">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                {{-- Submit Button --}}
                <div>
                    <x-primary-button 
                        class="w-full justify-center bg-sky-600 hover:bg-sky-700 dark:bg-sky-500 dark:hover:bg-sky-600 
                               text-white font-medium py-3 rounded-md transition transform hover:-translate-y-0.5 hover:scale-[1.01]">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
<div class="mt-6">
    <a href="{{ route('google.redirect') }}"
       class="w-full flex items-center justify-center gap-3 py-3 px-4 border border-gray-300 dark:border-gray-600 
              rounded-md bg-white dark:bg-gray-700 text-slate-700 dark:text-gray-200 
              hover:bg-slate-50 dark:hover:bg-gray-600 transition">

        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg"
             class="w-5 h-5" />
        <span>Continue with Google</span>
    </a>
</div>

            {{-- Register Link --}}
            <p class="mt-8 text-center text-sm text-slate-600 dark:text-gray-300">
                {{ __("Don't have an account?") }}
                <a href="{{ route('register') }}" class="text-sky-600 dark:text-sky-400 font-semibold hover:underline">
                    {{ __('Create one') }}
                </a>
            </p>
        </div>
    </div>

    @push('scripts')
    <script>
        // Simple fade-up reveal animation
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
    @endpush
</x-guest-layout>
