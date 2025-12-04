@extends('layouts.app')

@section('title', $project->title . ' - ' . config('app.name'))

@section('content')
<section class="py-12">
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-lg dark:shadow-gray-700 p-6 lg:p-10 transition-colors duration-300">

        {{-- Project Cover --}}
        <div class="relative mb-8">
            <img src="{{ $project->cover_image ? asset('storage/'.$project->cover_image) : asset('images/placeholder.png') }}" 
                 alt="{{ $project->title }}" 
                 class="w-full h-72 object-cover rounded-2xl shadow-lg dark:shadow-gray-600 transition-shadow duration-300">
            @if($project->featured)
                <span class="absolute top-3 right-3 flex items-center gap-1 px-3 py-1 bg-sky-100 dark:bg-sky-700/20 text-sky-700 dark:text-sky-400 text-xs font-semibold rounded-full shadow dark:shadow-gray-700">
                    <i data-lucide="star" class="w-3 h-3"></i> Featured
                </span>
            @endif
        </div>

        {{-- Project Title & Short Description --}}
        <div class="mb-6">
            <h1 class="text-3xl font-extrabold text-slate-800 dark:text-gray-100 mb-3 flex items-center gap-2">
                <i data-lucide="folder" class="w-6 h-6 text-sky-500"></i> {{ $project->title }}
            </h1>
            <p class="text-slate-600 dark:text-gray-300 flex items-center gap-2">
                <i data-lucide="info" class="w-4 h-4 text-slate-400 dark:text-gray-400"></i> {{ $project->short_description }}
            </p>
        </div>

        {{-- Detailed Description --}}
        <div class="prose prose-slate dark:prose-invert max-w-none mb-10">
            {!! nl2br(e($project->description)) !!}
        </div>

        {{-- Tech Stack --}}
        @if ($project->tech_stack)
            @php
                $techs = is_array($project->tech_stack) 
                            ? $project->tech_stack 
                            : json_decode($project->tech_stack, true) ?? [];
            @endphp

            @if(count($techs) > 0)
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-2 flex items-center gap-2 text-slate-800 dark:text-gray-100">
                        <i data-lucide="code" class="w-5 h-5 text-sky-500"></i> Tech Stack
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($techs as $tech)
                            <span class="px-3 py-1 border rounded-full text-sm text-slate-700 dark:text-gray-200 bg-slate-50 dark:bg-gray-700 shadow-sm hover:bg-slate-100 dark:hover:bg-gray-600 transition">
                                {{ $tech }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif

        {{-- Project Links --}}
        <div class="flex flex-wrap gap-4 mb-10">
            @if ($project->live_url)
                <a href="{{ $project->live_url }}" target="_blank" 
                   class="flex items-center gap-2 px-5 py-2 rounded-md bg-sky-600 text-white font-medium hover:bg-sky-700 shadow transition">
                   <i data-lucide="globe" class="w-4 h-4"></i> Live Demo
                </a>
            @endif

            @if ($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank" 
                   class="flex items-center gap-2 px-5 py-2 rounded-md border border-slate-300 dark:border-gray-600 text-slate-700 dark:text-gray-200 hover:bg-slate-50 dark:hover:bg-gray-700 font-medium shadow-sm transition">
                   <i data-lucide="github" class="w-4 h-4"></i> View Code
                </a>
            @endif
        </div>

        {{-- Additional Info --}}
        <div class="mt-6 text-sm text-slate-500 dark:text-gray-400 space-y-1">
            <div class="flex items-center gap-2">
                <i data-lucide="user" class="w-4 h-4 text-slate-400 dark:text-gray-400"></i>
                <span class="font-semibold text-slate-700 dark:text-gray-200">Role:</span> {{ $project->role ?? 'N/A' }}
            </div>
            <div class="flex items-center gap-2">
                <i data-lucide="calendar" class="w-4 h-4 text-slate-400 dark:text-gray-400"></i>
                <span class="font-semibold text-slate-700 dark:text-gray-200">Duration:</span> 
                {{ $project->started_at ? \Carbon\Carbon::parse($project->started_at)->format('M Y') : 'N/A' }} 
                — 
                {{ $project->ended_at ? \Carbon\Carbon::parse($project->ended_at)->format('M Y') : 'Present' }}
            </div>
        </div>

    </div>
</section>

@push('scripts')
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        lucide.createIcons();
    });
</script>
@endpush
@endsection
