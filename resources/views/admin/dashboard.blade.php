@extends('layouts.admin')

@section('content')
<div class="space-y-8 animate-fadeIn">

    {{-- Dashboard Header --}}
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-slate-800 dark:text-gray-200">Admin Dashboard</h1>
        <div class="flex gap-3">
            <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 bg-sky-600 text-white rounded-lg hover:bg-sky-700 dark:bg-sky-500 dark:hover:bg-sky-600 flex items-center gap-2 shadow transition-all duration-300 hover:scale-105">
                <i data-lucide="plus"></i> New Project
            </a>
            <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 bg-gray-100 text-slate-700 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 rounded-lg hover:bg-gray-200 flex items-center gap-2 shadow transition-all duration-300 hover:scale-105">
                <i data-lucide="folder"></i> Manage Projects
            </a>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
        <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow dark:shadow-gray-700 hover:shadow-lg dark:hover:shadow-gray-600 transition transform hover:-translate-y-1 duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 dark:text-gray-400 text-sm">Total Projects</h2>
                    <p class="text-3xl font-semibold mt-2 text-slate-800 dark:text-gray-200">{{ $projectCount }}</p>
                </div>
                <i data-lucide="folder" class="w-10 h-10 text-sky-500"></i>
            </div>
        </div>

        <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow dark:shadow-gray-700 hover:shadow-lg dark:hover:shadow-gray-600 transition transform hover:-translate-y-1 duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 dark:text-gray-400 text-sm">Total Users</h2>
                    <p class="text-3xl font-semibold mt-2 text-slate-800 dark:text-gray-200">{{ $userCount }}</p>
                </div>
                <i data-lucide="users" class="w-10 h-10 text-green-500"></i>
            </div>
        </div>

        <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow dark:shadow-gray-700 hover:shadow-lg dark:hover:shadow-gray-600 transition transform hover:-translate-y-1 duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 dark:text-gray-400 text-sm">Featured Projects</h2>
                    <p class="text-3xl font-semibold mt-2 text-slate-800 dark:text-gray-200">{{ $featuredCount }}</p>
                </div>
                <i data-lucide="star" class="w-10 h-10 text-yellow-400"></i>
            </div>
        </div>
    </div>

    {{-- Charts Section --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

        {{-- Tech Stack Chart --}}
        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow dark:shadow-gray-700 flex flex-col animate-slideUp">
            <h3 class="text-lg font-semibold text-slate-700 dark:text-gray-200 mb-4">Projects by Tech Stack</h3>
            <div class="relative h-72 w-full">
                <canvas id="techStackChart"></canvas>
            </div>
        </div>

        {{-- Featured vs Regular Chart --}}
        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow dark:shadow-gray-700 flex flex-col animate-slideUp delay-200">
            <h3 class="text-lg font-semibold text-slate-700 dark:text-gray-200 mb-4">Featured vs Regular Projects</h3>
            <div class="relative h-72 w-full">
                <canvas id="featuredChart"></canvas>
            </div>
        </div>

    </div>

</div>
@endsection

@push('scripts')

<script>
document.addEventListener("DOMContentLoaded", function() {

    const isDark = document.documentElement.classList.contains('dark');

    // Tech Stack Chart
    const ctx1 = document.getElementById('techStackChart').getContext('2d');
    new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: @json($techLabels),
            datasets: [{
                data: @json($techCounts),
                backgroundColor: ['#0ea5e9','#22c55e','#facc15','#f97316','#8b5cf6','#ec4899','#f43f5e'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 15,
                        padding: 15,
                        color: isDark ? '#E5E7EB' : '#374151' // نصوص Legend
                    }
                }
            },
            layout: { padding: 10 }
        }
    });

    // Featured vs Regular Chart
    const ctx2 = document.getElementById('featuredChart').getContext('2d');
    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Featured', 'Regular'],
            datasets: [{
                data: [{{ $featuredCount }}, {{ $projectCount - $featuredCount }}],
                backgroundColor: ['#facc15','#94a3b8'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 15,
                        padding: 15,
                        color: isDark ? '#E5E7EB' : '#374151'
                    }
                }
            },
            layout: { padding: 10 }
        }
    });

    if (window.Lucide) { Lucide.replace(); }
});
</script>



{{-- Animations --}}
<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes slideUp {
    from { opacity: 0; transform: translateY(25px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fadeIn {
    animation: fadeIn 0.6s ease-out;
}
.animate-slideUp {
    animation: slideUp 0.8s ease-out;
}
.delay-200 {
    animation-delay: 0.2s;
}
</style>
@endpush
