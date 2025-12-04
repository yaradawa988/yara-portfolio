@extends('layouts.app')

@section('title', 'Contact Me')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-16">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-green-100 text-green-800 border border-green-300
                    dark:bg-green-800 dark:text-green-100 dark:border-green-700 flex items-center gap-3">
            <i data-lucide="check-circle" class="w-6 h-6"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- USER STATUS --}}
    <div class="mb-8 p-4 rounded-xl bg-blue-100 text-blue-800 border border-blue-300
                dark:bg-blue-900 dark:border-blue-700 dark:text-blue-200 flex items-center gap-3">
        <i data-lucide="user" class="w-6 h-6"></i>
        <span class="font-semibold">
            @auth
                Logged in as: {{ Auth::user()->name }} (ID: {{ Auth::id() }})
            @else
                You are contacting me as: <strong>Guest</strong>
            @endauth
        </span>
    </div>

    {{-- Header --}}
    <div class="text-center mb-12">
        <h1 class="text-5xl font-bold text-sky-600 dark:text-sky-400 mb-4">
            Get in Touch
        </h1>
        <p class="text-lg text-slate-600 dark:text-slate-300">
            Let’s connect! Whether you have a project idea, a job opportunity,
            or simply want to say hello — feel free to reach out.
        </p>
    </div>

    <div class="grid md:grid-cols-3 gap-10">

        {{-- LEFT SIDE — CONTACT INFO --}}
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-3xl p-8 space-y-6">

            <h2 class="text-xl font-semibold text-slate-800 dark:text-gray-200 mb-4 flex items-center gap-2">
                <i data-lucide="phone" class="w-5 h-5 text-sky-500"></i>
                Contact Info
            </h2>

            <div class="space-y-8">
                {{-- Email --}}
                <div class="flex items-center gap-3">
                    <i data-lucide="mail" class="w-6 h-6 text-sky-500"></i>
                    <a href="mailto:yara.mas484@gmail.com"
                       class="text-slate-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-400 transition">
                        yara.mas484@gmail.com
                    </a>
                </div>

                {{-- Phone --}}
                <div class="flex items-center gap-3">
                    <i data-lucide="smartphone" class="w-6 h-6 text-sky-500"></i>
                    <span class="text-slate-700 dark:text-gray-200">
                        +963 997 737 851
                    </span>
                </div>

                {{-- GitHub --}}
                <div class="flex items-center gap-3">
                  <i data-lucide="github" class="w-6 h-6 text-slate-900 dark:text-gray-100"></i>



                 <a href="https://github.com/yaradawa988" target="_blank"
   class="text-slate-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-400 transition">
   github.com/yaradawa988
</a>

                </div>

                {{-- LinkedIn --}}
                <div class="flex items-center gap-3">
                    <i data-lucide="linkedin" class="w-6 h-6 text-sky-600"></i>
                    <a href="https://www.linkedin.com/in/yara-dawa-9090ab296" target="_blank"
                       class="text-slate-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-400 transition">
                        linkedin.com/in/yara-dawa-9090ab296
                    </a>
                </div>
            </div>

            <hr class="border-slate-300 dark:border-gray-700">

            <p class="text-sm text-slate-500 dark:text-gray-400">
                I usually reply within 24 hours.
            </p>
        </div>

        {{-- RIGHT SIDE — CONTACT FORM --}}
        <div class="md:col-span-2">
           <form action="{{ route('contact.store') }}" method="POST"

                  class="bg-white dark:bg-gray-800 shadow-xl rounded-3xl p-10 space-y-6">
                @csrf

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-700 dark:text-gray-200 mb-2">
                            Full Name
                        </label>
                        <input type="text" id="name" name="name" required
                               class="w-full border border-slate-300 dark:border-gray-700 rounded-xl px-4 py-3
                                      focus:outline-none focus:ring-2 focus:ring-sky-500
                                      dark:bg-gray-700 dark:text-gray-100">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 dark:text-gray-200 mb-2">
                            Email
                        </label>
                        <input type="email" id="email" name="email" required
                               class="w-full border border-slate-300 dark:border-gray-700 rounded-xl px-4 py-3
                                      focus:outline-none focus:ring-2 focus:ring-sky-500
                                      dark:bg-gray-700 dark:text-gray-100">
                    </div>
                </div>

                <div>
                    <label for="message" class="block text-sm font-semibold text-slate-700 dark:text-gray-200 mb-2">
                        Message
                    </label>
                    <textarea id="message" name="message" rows="6" required
                              class="w-full border border-slate-300 dark:border-gray-700 rounded-xl px-4 py-3
                                     focus:outline-none focus:ring-2 focus:ring-sky-500
                                     dark:bg-gray-700 dark:text-gray-100"></textarea>
                </div>

                <div class="flex flex-col md:flex-row gap-4 justify-end mt-6">
                    <button type="submit"
                            class="px-8 py-3 bg-sky-600 text-white rounded-xl shadow-lg hover:bg-sky-700
                                   transition font-semibold flex items-center gap-2">
                        <i data-lucide="send"></i> Send Message
                    </button>

                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=yara.mas484@gmail.com" target="_blank"
                       class="px-8 py-3 bg-red-500 text-white rounded-xl shadow-lg hover:bg-red-600 transition
                              font-semibold flex items-center justify-center gap-2">
                        <i data-lucide="mail"></i> Gmail
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        lucide.createIcons();
    });
</script>
@endpush
@endsection
