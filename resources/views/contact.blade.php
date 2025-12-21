@extends('layouts.app')

@section('title', 'Contact Me')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-16">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div data-aos="fade-down"
             class="mb-6 p-4 rounded-xl bg-green-100 text-green-800 border border-green-300
                    dark:bg-green-800 dark:text-green-100 dark:border-green-700 flex items-center gap-3">
            <i data-lucide="check-circle" class="w-6 h-6"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- USER STATUS --}}
    <div data-aos="fade-down" data-aos-delay="100"
         class="mb-8 p-4 rounded-xl bg-blue-100 text-blue-800 border border-blue-300
                dark:bg-blue-900 dark:border-blue-700 dark:text-blue-200 flex items-center gap-3">
        <i data-lucide="user" class="w-6 h-6"></i>
        <span class="font-semibold">
            @auth
                Logged in as: {{ Auth::user()->name }} 
            @else
                You are contacting me as: <strong>Guest</strong>
            @endauth
        </span>
    </div>

    {{-- Header --}}
    <div class="text-center mb-12" data-aos="fade-up" data-aos-delay="150">
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
        <div data-aos="fade-right"
             class="bg-white dark:bg-gray-800 shadow-xl rounded-3xl p-8 space-y-6">

            <h2 class="text-xl font-semibold text-slate-800 dark:text-gray-200 mb-4 flex items-center gap-2">
                <i data-lucide="phone" class="w-5 h-5 text-sky-500"></i>
                Contact Info
            </h2>

            <div class="space-y-8">

                {{-- Email --}}
                <div class="flex items-center gap-3 transition hover:translate-x-1">
                    <i data-lucide="mail" class="w-6 h-6 text-sky-500"></i>
                    <a href="mailto:yara.mas484@gmail.com"
                       class="text-slate-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-400">
                        yara.mas484@gmail.com
                    </a>
                </div>

                {{-- WhatsApp --}}
                <div class="flex items-center gap-3 transition hover:translate-x-1">

                    <a href="https://wa.me/963997737851"
                       target="_blank"
                       class="flex items-center gap-3 group">

                        <svg class="w-10 h-10 text-sky-500 group-hover:text-green-600 transition ease-in-out duration-300"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 32 32" fill="currentColor">
                            fill="currentColor">
            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                        </svg>

                        <span class="text-slate-700 dark:text-gray-300 font-medium group-hover:text-green-600 transition duration-200">
                            Chat on WhatsApp
                        </span>

                    </a>

                </div>

                {{-- GitHub --}}
                <div class="flex items-center gap-3 transition hover:translate-x-1">
                    <i data-lucide="github" class="w-6 h-6"></i>
                    <a href="https://github.com/yaradawa988" target="_blank"
                       class="text-slate-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-400">
                       github.com/yaradawa988
                    </a>
                </div>

                {{-- LinkedIn --}}
                <div class="flex items-center gap-3 transition hover:translate-x-1">
                    <i data-lucide="linkedin" class="w-6 h-6 text-sky-600"></i>
                    <a href="https://www.linkedin.com/in/yara-dawa-9090ab296" target="_blank"
                       class="text-slate-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-400">
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
           <form data-aos="fade-left"
                 action="{{ route('contact.store') }}"
                 method="POST"
                 class="bg-white dark:bg-gray-800 shadow-xl rounded-3xl p-10 space-y-6">

                @csrf

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block mb-2">Full Name</label>
                        <input type="text" name="name" required
                            class="w-full border rounded-xl px-4 py-3 dark:bg-gray-700">
                    </div>

                    <div>
                        <label class="block mb-2">Email</label>
                        <input type="email" name="email" required
                            class="w-full border rounded-xl px-4 py-3 dark:bg-gray-700">
                    </div>
                </div>

                <div>
                    <label class="block mb-2">Message</label>
                    <textarea rows="6" name="message" required
                        class="w-full border rounded-xl px-4 py-3 dark:bg-gray-700"></textarea>
                </div>

                <div class="flex flex-wrap gap-4 justify-end mt-6">
                    <button type="submit"
                            class="px-8 py-3 bg-sky-600 text-white rounded-xl shadow-lg hover:bg-sky-700 transition flex items-center gap-2">
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
