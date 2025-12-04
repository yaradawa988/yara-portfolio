@extends('layouts.app')

@section('title', 'My Portfolio Dashboard')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight flex items-center gap-2">
                <i data-lucide="layout-dashboard" class="w-6 h-6 text-sky-500"></i>
                {{ __('My Portfolio Dashboard') }}
            </h2>
            <a href="{{ route('projects.index') }}" 
               class="inline-flex items-center gap-2 px-4 py-2 bg-sky-600 text-white text-sm font-medium rounded-lg hover:bg-sky-700 transition">
                <i data-lucide="folder"></i> Browse My Projects
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Welcome Card --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-8 text-gray-800 dark:text-gray-100">
                <h3 class="text-2xl font-semibold mb-2">👋 Welcome, {{ Auth::user()->name }}!</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    You’ve successfully logged into <strong>my personal portfolio</strong>.  
                    Here, you can explore my latest and featured projects, discover what technologies I use,  
                    and see how my work has evolved over time.  
                    Thanks for visiting — let’s build something amazing together!
                </p>
            </div>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow flex items-center justify-between hover:shadow-lg transition">
                    <div>
                        <h2 class="text-gray-500 text-sm">Total Projects</h2>
                        <p class="text-3xl font-semibold mt-2">{{ $projectCount ?? 0 }}</p>
                    </div>
                    <i data-lucide="folder" class="w-10 h-10 text-sky-500"></i>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow flex items-center justify-between hover:shadow-lg transition">
                    <div>
                        <h2 class="text-gray-500 text-sm">Featured Projects</h2>
                        <p class="text-3xl font-semibold mt-2">{{ $featuredCount ?? 0 }}</p>
                    </div>
                    <i data-lucide="star" class="w-10 h-10 text-yellow-400"></i>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow flex items-center justify-between hover:shadow-lg transition">
                   <div>
        <h2 class="text-gray-500 text-sm">Latest Project</h2>
        <p class="text-3xl font-semibold mt-2">📂 {{ $latestProject->title ?? 'No Projects' }}</p>
        <span class="text-sm text-gray-400">{{ $latestProject->short_description ?? 'Stay tuned for updates!' }}</span>
    </div>
    <i data-lucide="folder" class="w-10 h-10 text-sky-500"></i>
                </div>
            </div>

            {{-- Featured Projects Section --}}
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow">
                <h3 class="text-xl font-semibold mb-6 flex items-center gap-2 text-gray-700 dark:text-gray-200">
                    <i data-lucide="sparkles" class="w-5 h-5 text-yellow-400"></i>
                    Highlighted Projects
                </h3>

                @php
                    $featuredProjects = \App\Models\Project::where('featured', true)->take(3)->get();
                @endphp

                @if($featuredProjects->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($featuredProjects as $project)
                            <div class="bg-gray-50 dark:bg-gray-900 p-5 rounded-lg shadow hover:shadow-lg transition">
                                @if($project->cover_image)
                                    <img src="{{ asset('storage/' . $project->cover_image) }}" 
                                         alt="{{ $project->title }}" 
                                         class="w-full h-40 object-cover rounded-md mb-4">
                                @endif
                                <h4 class="text-lg font-semibold mb-1">{{ $project->title }}</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-3 line-clamp-3">
                                    {{ $project->short_description ?? 'No description available.' }}
                                </p>
                                <div class="flex justify-between items-center">
                                    <a href="{{ route('projects.show', $project->slug) }}" 
                                       class="text-sky-600 text-sm font-medium hover:underline">
                                       View Details
                                    </a>
                                    <i data-lucide="external-link" class="w-4 h-4 text-sky-500"></i>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 dark:text-gray-400">No featured projects have been added yet. Stay tuned!</p>
                @endif
            </div>

           
        </div>
    </div>

@endsection
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            lucide.createIcons();

            const ctx = document.getElementById('userProjectsChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Laravel', 'Tailwind', 'Vue', 'React', 'MySQL', 'API'],
                    datasets: [{
                        label: 'Projects by Tech Stack',
                        data: [5, 3, 2, 4, 1, 6], 
                        backgroundColor: '#0ea5e9',
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: true }
                    },
                    plugins: {
                        legend: { display: false }
                    }
                }
            });
        });
    </script>
    @endpush

