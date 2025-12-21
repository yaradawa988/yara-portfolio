@extends('layouts.app')

@section('title','Home - ' . config('app.name'))

@section('hero')
<section class="bg-gradient-to-b from-white dark:from-gray-900 to-slate-50 dark:to-gray-800 transition duration-300">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-14 items-center">

            {{-- Text Content --}}
            <div class="space-y-7">
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-tight fade-up">
                    Hello — I'm <span class="text-sky-600 dark:text-sky-400">Yara Dawa</span><br>
                    <span class="text-slate-800 dark:text-gray-200">
                        Software Engineer & Laravel Developer | Web & Mobile Backend Solutions
                    </span>
                </h1>

                <p class="text-lg text-slate-600 dark:text-gray-300 max-w-xl fade-up delay-100">
                    I develop modern scalable web apps, secure APIs, and backend systems.
                    I deliver clean architecture, optimized performance, and real business value.
                </p>

                {{-- Experience --}}
                <div class="text-sm text-slate-500 dark:text-gray-300 fade-up delay-200 leading-relaxed">
                    <div class="font-semibold text-slate-700 dark:text-gray-200">Experience</div>
                    <p>
                        2+ years of building Laravel platforms, API services & backend engineering.
                        Worked with <strong>SCIT – Dubai UAE</strong>, under <strong>CIC – Saudi Arabia</strong>
                        starting June 2024 as Laravel backend API developer.
                        <span class="ml-2 px-2 py-1 rounded-full border border-slate-300 dark:border-gray-600 text-slate-600 dark:text-gray-200 text-xs tracking-wide">
                            Remote
                        </span>
                    </p>
                </div>
            </div>

            {{-- Project Card --}}
            <div class="fade-up delay-200">
                <div class="rounded-2xl overflow-hidden bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-xl hover:shadow-2xl transform hover:scale-[1.03] transition duration-300">
                    <img src="{{ asset('images/portfolio-hero.jpg') }}" class="w-full h-64 object-cover" loading="lazy">

                    <div class="p-6 space-y-3">
                        <h3 class="font-semibold text-lg text-gray-900 dark:text-gray-100">
                            Featured Project
                        </h3>

                        <p class="text-sm text-slate-600 dark:text-gray-300">
                            A highlighted system showcasing backend engineering with Laravel,
                            secure APIs, and third-party integrations.
                        </p>

                        <div class="flex items-center gap-3 text-sm pt-2">
                            <a href="" class="flex items-center gap-1 text-sky-600 hover:text-sky-800 dark:text-sky-400 dark:hover:text-sky-300 font-medium">
                                <i data-lucide="eye" class="w-4 h-4"></i> Live Demo
                            </a>
 <a href=""
                               class="flex items-center gap-1 text-sky-600 hover:text-sky-800 font-medium transition">
                                <i data-lucide="eye" class="w-4 h-4"></i> View Project
                            </a>
                            <span class="text-xs text-gray-400 dark:text-gray-400">•</span>
                            <span class="text-xs text-gray-500 dark:text-gray-400">2025</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection


@section('content')
{{-- Projects Grid --}}
<section class="mt-16">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-semibold fade-up">Projects</h2>
        <a href="{{ route('projects.index') }}" class="text-sm text-sky-600 hover:underline fade-up delay-100">
            View all →
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 fade-up delay-200">
        @foreach($featuredProjects as $project)
            @include('partials._project-card', ['project' => $project])
        @endforeach
    </div>
</section>


{{-- Skills --}}
<section class="mt-20 fade-up delay-200">
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow p-8">
        <h3 class="text-lg font-semibold mb-6 text-gray-900 dark:text-gray-100">
            Core Technical Skills
        </h3>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">

            {{-- Backend Development --}}
            <div>
                <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-3">Backend Development</h4>
                <div class="flex flex-wrap gap-2">
                    <span class="skill-badge">Laravel Framework</span>
                    <span class="skill-badge">PHP 8+</span>
                    <span class="skill-badge">RESTful APIs</span>
                    <span class="skill-badge">Queues & Scheduling</span>
                </div>
            </div>

            {{-- Authentication & Security --}}
            <div>
                <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-3">Auth & Security</h4>
                <div class="flex flex-wrap gap-2">
                    <span class="skill-badge">JWT Authentication</span>
                    <span class="skill-badge">OAuth2 / SSO</span>
                    <span class="skill-badge">Laravel Sanctum</span>
                    <span class="skill-badge">Role & Permission Systems</span>
                </div>
            </div>

            {{-- Integrations & APIs --}}
            <div>
                <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-3">
                    Integrations & API Services
                </h4>
                <div class="flex flex-wrap gap-2">
                    <span class="skill-badge">Google APIs</span>
                    <span class="skill-badge">Payment Gateways</span>
                    <span class="skill-badge">Clockify</span>
                    <span class="skill-badge">DocuWare</span>
                    <span class="skill-badge">Keycloak</span>
                </div>
            </div>

            {{-- UI / Frontend --}}
            <div>
                <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-3">UI Development</h4>
                <div class="flex flex-wrap gap-2">
                    <span class="skill-badge">TailwindCSS</span>
                    <span class="skill-badge">Bootstrap</span>
                    <span class="skill-badge">Responsive UX</span>
                </div>
            </div>

            {{-- File Processing --}}
            <div>
                <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-3">Document Processing</h4>
                <div class="flex flex-wrap gap-2">
                    <span class="skill-badge">PDF / FPDI</span>
                    <span class="skill-badge">CSV Import/Export</span>
                    <span class="skill-badge">ZIP Archiving</span>
                    <span class="skill-badge">XML Parsing</span>
                </div>
            </div>

            {{-- Databases --}}
            <div>
                <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-3">Database Engineering</h4>
                <div class="flex flex-wrap gap-2">
                    <span class="skill-badge">MySQL</span>
                    <span class="skill-badge">PostgreSQL</span>
                    <span class="skill-badge">Migration Design</span>
                    <span class="skill-badge">Index Optimization</span>
                </div>
            </div>

            {{-- Software Principles --}}
            <div>
                <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-3">Software Principles</h4>
                <div class="flex flex-wrap gap-2">
                    <span class="skill-badge">SOLID</span>
                    <span class="skill-badge">OOP</span>
                    <span class="skill-badge">Clean Code</span>
                    <span class="skill-badge">Design Patterns</span>
                </div>
            </div>

            {{-- Tools --}}
            <div>
                <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-3">Tools & Testing</h4>
                <div class="flex flex-wrap gap-2">
                    <span class="skill-badge">Git / GitHub</span>
                    <span class="skill-badge">Postman</span>
                    <span class="skill-badge">Swagger</span>
                    <span class="skill-badge">PHPUnit</span>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection


@push('scripts')
<script src="https://unpkg.com/lucide@latest"></script>
<script>

document.addEventListener("DOMContentLoaded", () => {
    const reveals = document.querySelectorAll(".fade-up");
    reveals.forEach((el, i) => {
        setTimeout(() => el.classList.add("fade-show"), i * 100);
    });
});


lucide.createIcons();
</script>

<style>
.fade-up {
    opacity: 0;
    transform: translateY(25px);
    transition: all .7s ease;
}
.fade-show {
    opacity: 1 !important;
    transform: translateY(0) !important;
}
</style>
@endpush
