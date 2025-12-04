@extends('layouts.admin')

@section('page_title', 'Projects Management')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h2 class="text-3xl font-bold text-slate-800 dark:text-slate-200 flex items-center gap-2">
        <i data-lucide="folder-cog" class="w-6 h-6 text-sky-600"></i>
        Manage Projects
    </h2>
    <a href="{{ route('admin.projects.create') }}" 
       class="px-5 py-2.5 bg-sky-600 text-white rounded-lg shadow hover:bg-sky-700 transition flex items-center gap-2">
        <i data-lucide="plus-circle" class="w-5 h-5"></i> 
        Add New Project
    </a>
</div>

@if(session('success'))
    <div class="p-4 bg-green-100 dark:bg-green-200 text-green-700 dark:text-green-800 rounded-lg mb-6 border border-green-300 dark:border-green-700 flex items-center gap-2">
        <i data-lucide="check-circle" class="w-5 h-5"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

@if($projects->isEmpty())
    <div class="text-center py-16 text-slate-500 dark:text-slate-400">
        <i data-lucide="inbox" class="w-12 h-12 mx-auto mb-4 text-slate-400 dark:text-slate-500"></i>
        <p class="text-lg">No projects found. Start by adding one!</p>
    </div>
@else
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($projects as $project)
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden border border-slate-100 dark:border-gray-700">
        <div class="relative">
            <img src="{{ $project->cover_image ? asset('storage/'.$project->cover_image) : asset('images/placeholder.png') }}" 
                 alt="{{ $project->title }}" 
                 class="w-full h-44 object-cover">
            @if($project->featured)
                <span class="absolute top-3 left-3 bg-yellow-400 text-white text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-1">
                    <i data-lucide="star" class="w-4 h-4"></i> Featured
                </span>
            @endif
        </div>
        <div class="p-5">
            <h3 class="font-bold text-lg text-slate-800 dark:text-slate-200">{{ $project->title }}</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-2 line-clamp-2">{{ $project->short_description ?? 'No description available.' }}</p>

            <div class="mt-4 flex justify-between items-center">
                <a href="{{ route('admin.projects.edit', $project) }}" 
                   class="flex items-center gap-1 text-sky-600 hover:text-sky-800 dark:text-sky-400 dark:hover:text-sky-300 text-sm font-medium transition">
                    <i data-lucide="pencil-line" class="w-4 h-4"></i> Edit
                </a>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this project?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="flex items-center gap-1 text-red-600 hover:text-red-800 dark:text-red-500 dark:hover:text-red-400 text-sm font-medium transition">
                        <i data-lucide="trash-2" class="w-4 h-4"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-10">
    {{ $projects->links() }}
</div>
@endif
@endsection
