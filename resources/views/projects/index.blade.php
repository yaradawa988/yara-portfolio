@extends('layouts.app')

@section('title', 'Projects - ' . config('app.name'))

@section('content')
<section class="py-12">
    <div class="text-center mb-10">
        <h1 class="text-4xl font-extrabold tracking-tight text-slate-800 mb-3">
            My Projects
        </h1>
        <p class="text-slate-500 text-lg">
            Here’s a selection of my recent work — each project built with care and modern tools.
        </p>
    </div>

    {{-- Projects Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

        @forelse ($projects as $project)

            <div class="relative group">

                {{-- Project Card Partial --}}
                @include('partials._project-card', ['project' => $project])

                

            </div>

        @empty
            <p class="col-span-3 text-center text-slate-500">
                No projects yet. Stay tuned!
            </p>
        @endforelse

    </div>

    {{-- Pagination --}}
    <div class="mt-10">
        {{ $projects->links() }}
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
