<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md dark:shadow-gray-700 hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden border border-slate-100 dark:border-gray-700 flex flex-col">
  
    @if($project->cover_image)
        <div class="relative">
            <img src="{{ $project->cover_image ? asset('storage/'.$project->cover_image) : asset('images/placeholder.png') }}" 
                 alt="{{ $project->title }}" 
                 class="w-full h-48 object-cover">
            
            {{-- إذا كان المشروع مميز --}}
            @if($project->featured)
                <span class="absolute top-3 left-3 bg-sky-500 text-white text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-1 shadow-md">
                    <i data-lucide="star" class="w-4 h-4"></i> Featured
                </span>
            @endif
        </div>
    @endif

     <div class="p-5 flex flex-col flex-grow">
        <h3 class="text-xl font-semibold text-slate-800 dark:text-gray-100 mb-1 flex items-center gap-2">
            <i data-lucide="folder-code" class="w-5 h-5 text-sky-600"></i>
            Title: {{ $project->title }}
        </h3>

        <p class="text-sm text-slate-600 dark:text-gray-300 leading-relaxed mb-4 line-clamp-3">
            Description : {{ $project->short_description ?? 'No description available.' }}
        </p>

        
        <div class="mt-auto pt-3 border-t border-slate-100 dark:border-gray-700 flex justify-between items-center text-sm">
            <a href="{{ route('projects.show', $project->slug) }}" 
               class="flex items-center gap-1 text-sky-600 hover:text-sky-800 font-medium transition">
                <i data-lucide="eye" class="w-4 h-4"></i> View Project
            </a>

            @if($project->started_at)
                <div class="flex items-center gap-1 text-slate-500 dark:text-gray-400">
                    <i data-lucide="calendar" class="w-4 h-4"></i>
                    <span>{{ $project->started_at->format('M Y') }}</span>
                </div>
            @endif
        </div>

        
        <div class="mt-4 flex items-center gap-4 text-slate-500 dark:text-gray-400 text-sm">
            @if($project->live_url)
                <a href="{{ $project->live_url }}" target="_blank" 
                   class="p-2 bg-sky-50 dark:bg-gray-700 text-sky-600 dark:text-sky-400 rounded-full hover:bg-sky-100 dark:hover:bg-gray-600 hover:text-sky-700 dark:hover:text-sky-200 transition"
                   title="View Live Project">
                    <i data-lucide="globe" class="w-5 h-5"></i>
                </a>
            @endif

            @if($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank" 
                   class="p-2 bg-sky-50 dark:bg-gray-700 text-sky-600 dark:text-sky-400 rounded-full hover:bg-sky-100 dark:hover:bg-gray-600 hover:text-sky-700 dark:hover:text-sky-200 transition"
                   title="View on GitHub">
                    <i data-lucide="github" class="w-5 h-5"></i>
                </a>
            @endif
        </div>
    </div>
</div>
