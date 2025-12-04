@extends('layouts.admin')

@section('page_title', 'Edit Project')

@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-2xl font-semibold text-slate-800 dark:text-slate-200 mb-6 flex items-center gap-2">
        <i data-lucide="pencil-line" class="w-6 h-6 text-sky-600"></i>
        Edit Project
    </h2>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="p-3 bg-green-100 dark:bg-green-200 text-green-700 dark:text-green-800 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="p-3 bg-red-100 dark:bg-red-200 text-red-700 dark:text-red-800 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 space-y-6">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div>
            <label for="title" class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-2">Project Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" required
                   class="w-full border border-slate-300 dark:border-gray-600 rounded-lg px-4 py-2 bg-white dark:bg-gray-700 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-sky-500 focus:outline-none">
        </div>

        {{-- Short Description --}}
        <div>
            <label for="short_description" class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-2">Short Description</label>
            <textarea name="short_description" id="short_description" rows="3"
                      class="w-full border border-slate-300 dark:border-gray-600 rounded-lg px-4 py-2 bg-white dark:bg-gray-700 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-sky-500 focus:outline-none">{{ old('short_description', $project->short_description) }}</textarea>
        </div>

        {{-- Full Description --}}
        <div>
            <label for="description" class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-2">Full Description</label>
            <textarea name="description" id="description" rows="6"
                      class="w-full border border-slate-300 dark:border-gray-600 rounded-lg px-4 py-2 bg-white dark:bg-gray-700 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-sky-500 focus:outline-none">{{ old('description', $project->description) }}</textarea>
        </div>

        {{-- Tech Stack --}}
        <div>
            <label for="tech_stack" class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-2 flex items-center gap-1">
                <i data-lucide="cpu" class="w-4 h-4 text-sky-500"></i> Tech Stack
            </label>
            @php
                $selectedStacks = is_array($project->tech_stack) ? $project->tech_stack : explode(',', $project->tech_stack);
            @endphp
            <select name="tech_stack[]" id="tech_stack" multiple
                    class="w-full border border-slate-300 dark:border-gray-600 rounded-lg px-4 py-2 bg-white dark:bg-gray-700 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-sky-500 focus:outline-none">
                @foreach(['Laravel','Tailwind','Bootstrap','Vue.js','React','MySQL','API'] as $tech)
                    <option value="{{ $tech }}" {{ in_array($tech, old('tech_stack', $selectedStacks)) ? 'selected' : '' }}>
                        {{ $tech }}
                    </option>
                @endforeach
            </select>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Hold <kbd>Ctrl</kbd> (or <kbd>Cmd</kbd> on Mac) to select multiple options</p>
            @error('tech_stack')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Links --}}
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="live_url" class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-2 flex items-center gap-1">
                    <i data-lucide="globe" class="w-4 h-4 text-sky-500"></i> Live Demo
                </label>
                <input type="url" name="live_url" id="live_url" value="{{ old('live_url', $project->live_url) }}"
                       class="w-full border border-slate-300 dark:border-gray-600 rounded-lg px-4 py-2 bg-white dark:bg-gray-700 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-sky-500 focus:outline-none">
            </div>
            <div>
                <label for="github_url" class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-2 flex items-center gap-1">
                    <i data-lucide="github" class="w-4 h-4 text-sky-500"></i> GitHub Repository
                </label>
                <input type="url" name="github_url" id="github_url" value="{{ old('github_url', $project->github_url) }}"
                       class="w-full border border-slate-300 dark:border-gray-600 rounded-lg px-4 py-2 bg-white dark:bg-gray-700 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-sky-500 focus:outline-none">
            </div>
        </div>

        {{-- Cover Image --}}
        <div>
            <label for="cover_image" class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-2 flex items-center gap-1">
                <i data-lucide="image" class="w-4 h-4 text-sky-500"></i> Project Cover Image
            </label>
            @if($project->cover_image)
                <img src="{{ asset('storage/'.$project->cover_image) }}" alt="Current Image"
                     class="w-40 h-28 object-cover rounded-md mb-3 shadow">
            @endif
            <input type="file" name="cover_image" id="cover_image"
                   class="w-full border border-slate-300 dark:border-gray-600 rounded-lg px-4 py-2 bg-white dark:bg-gray-700 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-sky-500 focus:outline-none">
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Leave empty to keep the current image.</p>
        </div>

        {{-- Featured --}}
        <div class="flex items-center gap-2">
            <input type="hidden" name="featured" value="0">
            <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured', $project->featured) ? 'checked' : '' }}
                   class="rounded text-sky-600 focus:ring-sky-500">
            <label for="featured" class="text-sm text-slate-700 dark:text-slate-200 flex items-center gap-1">
                <i data-lucide="star" class="w-4 h-4 text-yellow-400"></i> Mark as Featured Project
            </label>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.projects.index') }}" 
               class="px-6 py-2 border border-slate-300 dark:border-gray-600 text-slate-600 dark:text-slate-200 rounded-lg hover:bg-slate-50 dark:hover:bg-gray-700 transition flex items-center gap-1">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Cancel
            </a>
            <button type="submit" 
                    class="px-6 py-2 bg-sky-600 text-white rounded-lg hover:bg-sky-700 transition flex items-center gap-1">
                <i data-lucide="save" class="w-4 h-4"></i> Update Project
            </button>
        </div>
    </form>
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
