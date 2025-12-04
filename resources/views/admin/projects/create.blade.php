@extends('layouts.admin')

@section('page_title', 'Create Project')

@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-2xl font-semibold text-slate-800 dark:text-slate-200 mb-6 flex items-center gap-2">
        <i data-lucide="folder-plus" class="w-6 h-6 text-sky-600"></i>
        Create New Project
    </h2>

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

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" 
        class="bg-white dark:bg-gray-800 rounded-xl shadow p-8 space-y-6 text-slate-800 dark:text-gray-100">
        @csrf

        {{-- Title --}}
        <div>
            <label for="title" class="block text-sm font-semibold mb-2 flex items-center gap-2">
                <i data-lucide="type" class="w-4 h-4 text-sky-600"></i>
                Project Title
            </label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required
                class="w-full border border-slate-300 dark:border-gray-600 rounded-lg px-4 py-2 
                       focus:ring-2 focus:ring-sky-500 focus:outline-none dark:bg-gray-700 dark:text-gray-100">
            @error('title')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
        </div>

        {{-- Short Description --}}
        <div>
            <label for="short_description" class="block text-sm font-semibold mb-2 flex items-center gap-2">
                <i data-lucide="align-left" class="w-4 h-4 text-sky-600"></i>
                Short Description
            </label>
            <input type="text" name="short_description" id="short_description" value="{{ old('short_description') }}"
                class="w-full border border-slate-300 dark:border-gray-600 rounded-lg px-4 py-2 
                       focus:ring-2 focus:ring-sky-500 focus:outline-none dark:bg-gray-700 dark:text-gray-100">
            @error('short_description')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
        </div>

        {{-- Full Description --}}
        <div>
            <label for="description" class="block text-sm font-semibold mb-2 flex items-center gap-2">
                <i data-lucide="file-text" class="w-4 h-4 text-sky-600"></i>
                Full Description
            </label>
            <textarea name="description" id="description" rows="6"
                class="w-full border border-slate-300 dark:border-gray-600 rounded-lg px-4 py-2 
                       focus:ring-2 focus:ring-sky-500 focus:outline-none dark:bg-gray-700 dark:text-gray-100">{{ old('description') }}</textarea>
            @error('description')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
        </div>

        {{-- Tech Stack --}}
        <div>
            <label class="block text-sm font-semibold mb-2 flex items-center gap-2">
                <i data-lucide="layers" class="w-4 h-4 text-sky-600"></i>
                Tech Stack
            </label>
            <select name="tech_stack[]" multiple
                class="block w-full rounded-lg border border-slate-300 dark:border-gray-600 px-3 py-2 
                       focus:ring-2 focus:ring-sky-500 focus:outline-none dark:bg-gray-700 dark:text-gray-100">
                <option value="Laravel">Laravel</option>
                <option value="Tailwind">Tailwind CSS</option>
                <option value="Bootstrap">Bootstrap</option>
                <option value="Vue.js">Vue.js</option>
                <option value="React">React</option>
                <option value="MySQL">MySQL</option>
                <option value="API">API</option>
            </select>
            <p class="text-xs text-slate-500 dark:text-gray-400 mt-1">Hold Ctrl (or Cmd) to select multiple technologies.</p>
            @error('tech_stack')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
        </div>

        {{-- Cover Image --}}
        <div>
            <label class="block text-sm font-semibold mb-2 flex items-center gap-2">
                <i data-lucide="image" class="w-4 h-4 text-sky-600"></i>
                Cover Image
            </label>
            <input type="file" name="cover_image" accept="image/*" onchange="previewImage(event)"
                class="block w-full text-sm text-gray-600 dark:text-gray-300 border border-slate-300 dark:border-gray-600 rounded-lg cursor-pointer 
                       file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm 
                       file:font-semibold file:bg-sky-600 file:text-white hover:file:bg-sky-700">
            <img id="preview" class="mt-3 w-full max-h-60 object-cover rounded shadow hidden">
            @error('cover_image')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
        </div>

        {{-- Links --}}
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="live_url" class="block text-sm font-semibold mb-2 flex items-center gap-2">
                    <i data-lucide="globe" class="w-4 h-4 text-sky-600"></i>
                    Live Demo URL
                </label>
                <input type="url" name="live_url" id="live_url" value="{{ old('live_url') }}"
                    class="w-full border border-slate-300 dark:border-gray-600 rounded-lg px-4 py-2 
                           focus:ring-2 focus:ring-sky-500 focus:outline-none dark:bg-gray-700 dark:text-gray-100">
            </div>
            <div>
                <label for="github_url" class="block text-sm font-semibold mb-2 flex items-center gap-2">
                    <i data-lucide="github" class="w-4 h-4 text-sky-600"></i>
                    GitHub Repository
                </label>
                <input type="url" name="github_url" id="github_url" value="{{ old('github_url') }}"
                    class="w-full border border-slate-300 dark:border-gray-600 rounded-lg px-4 py-2 
                           focus:ring-2 focus:ring-sky-500 focus:outline-none dark:bg-gray-700 dark:text-gray-100">
            </div>
        </div>

        {{-- Role --}}
        <div>
            <label for="role" class="block text-sm font-semibold mb-2 flex items-center gap-2">
                <i data-lucide="user-check" class="w-4 h-4 text-sky-600"></i>
                Role
            </label>
            <input type="text" name="role" id="role" value="{{ old('role') }}" placeholder="e.g. Frontend Developer"
                class="w-full border border-slate-300 dark:border-gray-600 rounded-lg px-4 py-2 
                       focus:ring-2 focus:ring-sky-500 focus:outline-none dark:bg-gray-700 dark:text-gray-100">
        </div>

        {{-- Featured --}}
        <div class="flex items-center gap-2">
            <input type="checkbox" name="featured" id="featured" value="1"
                class="rounded text-sky-600 focus:ring-sky-500">
            <label for="featured" class="text-sm flex items-center gap-2 dark:text-gray-200">
                <i data-lucide="star" class="w-4 h-4 text-yellow-400"></i>
                Mark as Featured Project
            </label>
        </div>

        {{-- Started & Ended --}}
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="started_at" class="block text-sm font-semibold mb-2 flex items-center gap-2">
                    <i data-lucide="calendar" class="w-4 h-4 text-sky-600"></i>
                    Started At
                </label>
                <input type="date" name="started_at" id="started_at" value="{{ old('started_at') }}"
                    class="w-full border border-slate-300 dark:border-gray-600 rounded-lg px-4 py-2 
                           focus:ring-2 focus:ring-sky-500 focus:outline-none dark:bg-gray-700 dark:text-gray-100">
            </div>
            <div>
                <label for="ended_at" class="block text-sm font-semibold mb-2 flex items-center gap-2">
                    <i data-lucide="calendar-check" class="w-4 h-4 text-sky-600"></i>
                    Ended At
                </label>
                <input type="date" name="ended_at" id="ended_at" value="{{ old('ended_at') }}"
                    class="w-full border border-slate-300 dark:border-gray-600 rounded-lg px-4 py-2 
                           focus:ring-2 focus:ring-sky-500 focus:outline-none dark:bg-gray-700 dark:text-gray-100">
            </div>
        </div>

        {{-- Save --}}
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.projects.index') }}"
                class="px-6 py-2 border border-slate-300 dark:border-gray-600 text-slate-600 dark:text-gray-200 rounded-lg hover:bg-slate-50 dark:hover:bg-gray-700 transition flex items-center gap-2">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Cancel
            </a>
            <button type="submit"
                class="px-6 py-2 bg-sky-600 text-white rounded-lg hover:bg-sky-700 transition flex items-center gap-2">
                <i data-lucide="plus" class="w-5 h-5"></i>
                Create Project
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
    function previewImage(event) {
        const output = document.getElementById('preview');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.classList.remove('hidden');
    }
</script>
@endpush
@endsection
