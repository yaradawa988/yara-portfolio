<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center 
                bg-gradient-to-b from-white to-slate-50 dark:from-gray-900 dark:to-gray-800 
                px-4 py-12 sm:px-6 lg:px-8 transition-colors duration-300">
        
        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 md:p-10 reveal transition-colors duration-300" data-delay="100">
            
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-slate-800 dark:text-white">Create Your Account 🚀</h1>
                <p class="text-slate-500 dark:text-gray-300 mt-2 text-sm">
                    Join and showcase my projects in my portfolio
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Full Name')" class="font-semibold text-slate-700 dark:text-gray-300" />
                    <x-text-input 
                        id="name" 
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        required autofocus autocomplete="name"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 focus:border-sky-500 focus:ring focus:ring-sky-200 dark:focus:ring-sky-500 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white"
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email Address')" class="font-semibold text-slate-700 dark:text-gray-300" />
                    <x-text-input 
                        id="email" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required autocomplete="username"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 focus:border-sky-500 focus:ring focus:ring-sky-200 dark:focus:ring-sky-500 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="font-semibold text-slate-700 dark:text-gray-300" />
                    <x-text-input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required autocomplete="new-password"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 focus:border-sky-500 focus:ring focus:ring-sky-200 dark:focus:ring-sky-500 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="font-semibold text-slate-700 dark:text-gray-300" />
                    <x-text-input 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation" 
                        required autocomplete="new-password"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 focus:border-sky-500 focus:ring focus:ring-sky-200 dark:focus:ring-sky-500 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white"
                    />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Submit -->
                <div>
                    <x-primary-button class="w-full justify-center bg-sky-600 hover:bg-sky-700 focus:ring-sky-300 text-white font-medium py-3 rounded-md transition transform hover:-translate-y-0.5 hover:scale-[1.01]">
                        {{ __('Create Account') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Login link -->
            <p class="mt-8 text-center text-sm text-slate-600 dark:text-gray-400">
                {{ __('Already have an account?') }}
                <a href="{{ route('login') }}" class="text-sky-600 dark:text-sky-400 font-semibold hover:underline">
                    {{ __('Sign in here') }}
                </a>
            </p>
        </div>
    </div>

    @push('scripts')
    <script>
        // Simple reveal animation
        (function(){
            const reveals = document.querySelectorAll('.reveal');
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        const delay = parseInt(el.dataset.delay || '0', 10);
                        setTimeout(() => {
                            el.classList.add('reveal-show');
                        }, delay);
                        observer.unobserve(el);
                    }
                });
            }, { threshold: 0.15 });
            reveals.forEach(e => observer.observe(e));
        })();
    </script>
    @endpush
</x-guest-layout>
