@extends('layouts.app')

@section('title', 'About Me')

@section('content')
<div class="max-w-5xl mx-auto text-center px-4 py-10">

    <!-- Title -->
    <h1 class="text-4xl font-bold text-sky-700 dark:text-sky-400 mb-8">
        About Me
    </h1>

    <!-- Intro -->
    <p class="text-lg text-slate-600 dark:text-slate-300 leading-relaxed mb-10">
        I’m a passionate <span class="font-semibold text-sky-600 dark:text-sky-400">Laravel Developer</span> 
        with over two years of experience building modern web applications and APIs 
        for Android and web platforms. My focus is on creating clean, scalable, and secure code.
        I worked as a backend developer in a collaborative team environment, responsible for building
        robust RESTful APIs, maintaining existing logic, and documenting endpoints using Swagger/OpenAPI.
        I also implemented multiple integrations with third-party APIs and services.
    </p>

    <!-- Grid -->
    <div class="grid md:grid-cols-2 gap-10 items-center">

        <!-- Profile Image -->
        <div class="flex justify-center md:justify-start -mt-10 md:-mt-16">
            <div class="w-80 h-80 rounded-full border-4 border-sky-300 dark:border-sky-500 
                        shadow-[0_0_25px_5px_rgba(56,189,248,0.5)]
                        dark:shadow-[0_0_25px_5px_rgba(56,189,248,0.3)]
                        overflow-hidden">
                <img src="{{ asset('images/ww.jpg') }}" 
                     alt="My Photo" 
                     class="w-full h-full object-cover">
            </div>
        </div>

        <!-- What I Do -->
        <div class="text-left space-y-4">
            <h2 class="text-2xl font-semibold text-slate-800 dark:text-slate-100">
                What I Do
            </h2>

            <ul class="list-disc pl-6 text-slate-600 dark:text-slate-300 space-y-2 leading-relaxed">
                <li>Develop and maintain secure, scalable APIs using Laravel, including authentication with JWT, Sanctum, and SSO (Keycloak).</li>
                <li>Build full-stack applications using Laravel & MySQL.</li>
                <li>Integrate and manage third-party APIs (Google services, DocuWare, Weclapp, Stripe, PayPal, Comgate, MyFatoorah).</li>
                <li>Ensure multilingual support with translation management and custom validation messages.</li>
                <li>Collaborate with frontend developers to provide reliable APIs and optimize UX.</li>
                <li>Implement notifications using Laravel and Firebase Cloud Messaging.</li>
                <li>Handle data transformation and exports for e-commerce integrations.</li>
                <li>Build dynamic PDFs and manage cloud document storage.</li>
                <li>Design modern UIs with TailwindCSS & Bootstrap.</li>
                <li>Integrate authentication & role systems (Breeze / Sanctum / ...).</li>
                <li>Deploy and maintain production-ready projects.</li>
            </ul>
        </div>

    </div>

    <!-- Call To Action -->
    <div class="mt-12">
        <a href="{{ route('projects.index') }}" 
           class="inline-block bg-sky-600 dark:bg-sky-500 text-white 
                  px-6 py-3 rounded-lg shadow-md hover:bg-sky-700 dark:hover:bg-sky-600 
                  transition">
            View My Projects
        </a>
    </div>

</div>
@endsection
