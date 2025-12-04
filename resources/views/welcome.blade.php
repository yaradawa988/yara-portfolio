@extends('layouts.app')

@section('title','Home - ' . config('app.name'))

@section('hero')
<section class="bg-gradient-to-b from-white dark:from-gray-900 to-slate-50 dark:to-gray-800 transition-colors duration-300">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            
            {{-- Text Content --}}
            <div class="space-y-6">
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-tight mb-2 reveal" data-delay="0">
                    Hello — I'm <span class="text-sky-600">Yara Dawa</span><br>
                    Software Engineer | Full-Stack Laravel Developer | Web & Mobile Backend Solutions
                </h1>

                <p class="text-lg text-slate-600 dark:text-gray-300 max-w-2xl reveal" data-delay="100">
                    I build professional web apps and APIs delivering scalable applications, secure systems, and reliable solutions that create real business value.
                </p>

              

                  

                <div class="mt-8 flex flex-col sm:flex-row items-start sm:items-center gap-6 reveal" data-delay="300">
                    <div class="text-sm text-slate-500 dark:text-gray-400">
                        <div class="font-semibold">Experience</div>
                         2+ years developing Laravel-based systems, REST APIs, and backend architectures.  
                            Worked with <strong>SCIT-Dubai (UAE)</strong>, operating under 
                            <strong>CIC – Saudi Arabia</strong>, starting June 2024 as a Web & API Developer for Android applications.
                            <span class="ml-2 px-2 py-1 rounded-full border border-slate-300 dark:border-gray-600
                                   text-slate-700 dark:text-gray-200 text-xs tracking-wide">
                                Remote
                            </span></div>

                    
                </div>
            </div>

            {{-- Project Card --}}
            <div class="order-first md:order-last reveal" data-delay="400">
                <div class="rounded-2xl shadow-lg overflow-hidden bg-white dark:bg-gray-800 transform transition hover:scale-105">
                    <img src="{{ asset('images/portfolio-hero.jpg') }}" alt="portfolio" class="w-full h-64 object-cover" loading="lazy">
                    <div class="p-6">
                        <h3 class="font-semibold text-lg text-gray-900 dark:text-gray-100">Project Highlight</h3>
                        <p class="mt-2 text-sm text-slate-600 dark:text-gray-300">A short summary of a featured project, the tech used, and the outcome.</p>
                        <div class="mt-4 flex items-center gap-3 text-sm">
                            <a href=""
                               class="flex items-center gap-1 text-sky-600 hover:text-sky-800 font-medium transition">
                                <i data-lucide="eye" class="w-4 h-4"></i> View Project
                            </a>
                            <span class="text-xs text-slate-400 dark:text-gray-400">•</span>
                            <span class="text-xs text-slate-400 dark:text-gray-400">Aug 2025</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('content')
    {{-- Projects preview grid --}}
    <div class="mb-10">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold reveal" data-delay="0">My Projects</h2>
            <a href="{{ route('projects.index') }}" class="text-sm text-sky-600 hover:underline reveal" data-delay="100">View all</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredProjects as $project)
                @include('partials._project-card', ['project' => $project])
            @endforeach
        </div>
    </div>

   {{-- Skills / badges --}}
<div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 reveal" data-delay="200">
    <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">
        Technical Skills
    </h3>

    <div class="space-y-5">

        {{-- Backend & Frameworks --}}
        <div>
            <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-2">
                Backend & Frameworks
            </h4>
            <div class="flex flex-wrap gap-3">
                <span class="skill-badge">Laravel</span>
                <span class="skill-badge">PHP</span>
                <span class="skill-badge">REST APIs</span>
            </div>
        </div>

        {{-- Authentication & Security --}}
        <div>
            <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-2">
                Authentication & Security
            </h4>
            <div class="flex flex-wrap gap-3">
                <span class="skill-badge">JWT</span>
                <span class="skill-badge">OAuth2</span>
                <span class="skill-badge">SSO (Keycloak)</span>
                <span class="skill-badge">Sanctum</span>
                <span class="skill-badge">Spatie Permissions</span>
            </div>
        </div>

        {{-- Integrations --}}
        <div>
            <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-2">
                Integrations & API Services
            </h4>
            <div class="flex flex-wrap gap-3">
                <span class="skill-badge">Google APIs</span>
                <span class="skill-badge">DocuWare</span>
                <span class="skill-badge">Weclapp</span>
                <span class="skill-badge">Clockify</span>
                <span class="skill-badge">Keycloak</span>
                <span class="skill-badge">Stripe</span>
                <span class="skill-badge">PayPal</span>
                <span class="skill-badge">Comgate</span>
                <span class="skill-badge">ZainCash</span>
                <span class="skill-badge">MyFatoorah</span>
            </div>
        </div>

        {{-- Notifications --}}
        <div>
            <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-2">
                Notifications
            </h4>
            <div class="flex flex-wrap gap-3">
                <span class="skill-badge">Firebase Cloud Messaging</span>
            </div>
        </div>
   <div>
            <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-2">
              Design modern UIs
            </h4>
            <div class="flex flex-wrap gap-3">
                <span class="skill-badge">TailwindCSS  Bootstrap</span>
            </div>
        </div>
        {{-- File Processing --}}
        <div>
            <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-2">
                File Processing
            </h4>
            <div class="flex flex-wrap gap-3">
                <span class="skill-badge">PDF (TCPDF / FPDI)</span>
                <span class="skill-badge">XML</span>
                <span class="skill-badge">CSV</span>
                <span class="skill-badge">ZIP Import/Export</span>
            </div>
        </div>

        {{-- Databases --}}
        <div>
            <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-2">
                Databases
            </h4>
            <div class="flex flex-wrap gap-3">
                <span class="skill-badge">MySQL</span>
                <span class="skill-badge">PostgreSQL</span>
                <span class="skill-badge">SQL Server</span>
                <span class="skill-badge">Indexing & Optimization</span>
                <span class="skill-badge">Migrations & Schema Design</span>
            </div>
        </div>

        {{-- Software Engineering --}}
        <div>
            <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-2">
                Software Engineering Principles
            </h4>
            <div class="flex flex-wrap gap-3">
                <span class="skill-badge">OOP</span>
                <span class="skill-badge">SOLID</span>
                <span class="skill-badge">Clean Code</span>
                <span class="skill-badge">Design Patterns</span>
                <span class="skill-badge">CI/CD</span>
            </div>
        </div>

        {{-- Tools --}}
        <div>
            <h4 class="text-sm font-semibold text-sky-600 dark:text-sky-400 mb-2">
                Tools & Testing
            </h4>
            <div class="flex flex-wrap gap-3">
                <span class="skill-badge">Git (GitHub/GitLab)</span>
                <span class="skill-badge">Postman</span>
                <span class="skill-badge">Swagger / OpenAPI</span>
                <span class="skill-badge">PHPUnit</span>
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
    // Staggered reveal on scroll using IntersectionObserver
    (function(){
        const revealElems = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const delay = parseInt(el.dataset.delay || '0', 10);
                    setTimeout(() => {
                        el.classList.add('reveal-show');
                        el.classList.remove('reveal');
                    }, delay);
                    observer.unobserve(el);
                }
            });
        }, { threshold: 0.12 });

        revealElems.forEach(e => observer.observe(e));
    })();
</script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        lucide.createIcons();
    });
</script>
@endpush
