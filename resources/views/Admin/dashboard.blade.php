@extends('layouts.app')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<span>
    <p class="text-2xl text-white">Welcome {{ Auth::user()->name }}</p>
</span>
<hr>

<!-- Dashboard Stats -->
<div class="container mt-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-4">
        <!-- Total Users -->
        <div class="bg-red-500 shadow-md rounded-lg p-6 border border-red-500 flex flex-col">
            <h2 class="text-xl text-white flex justify-between items-center">
                Total Users
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </h2>  
            <div class="text-3xl font-bold text-white">{{ $usercount }}</div>
        </div>

        <!-- Total Attendance -->
        <div class="bg-green-500 shadow-md rounded-lg p-6 border border-green-500 flex flex-col">
            <h2 class="text-xl text-white flex justify-between items-center">
                Total Attendance
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
            </h2>
            <div class="text-3xl font-bold text-white">{{ $attendances }}</div>
        </div>

        <!-- Total Membership -->
        <div class="bg-sky-500 shadow-md rounded-lg p-6 border border-blue-500 flex flex-col">
            <h2 class="text-xl text-white flex justify-between items-center">
                Total Membership
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                  </svg>
                  
            </h2>
            <div class="text-3xl font-bold text-white">{{ $member }}</div>
        </div>

        <!-- Total FAQ -->
        <div class="bg-slate-500 shadow-md rounded-lg p-6 border border-slate-500 flex flex-col">
            <h2 class="text-xl text-white flex justify-between items-center">
                Total FAQ
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                  </svg>
                  
            </h2>
            <div class="text-3xl font-bold text-white">{{ $contacts }}</div>
        </div>
    </div>
</div>

<!-- Grid Layout for Bar Graph & FAQ -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
    <!-- Left Side: Bar Graph -->
    <div class="flex flex-col shadow-md rounded-lg p-4 bg-white dark:bg-gray-800">
        <h2 class="text-xl font-bold text-center text-gray-900 dark:text-white mb-4">Monthly User Logins</h2>
        <div class="w-full max-w-2xl mx-auto" style="height: 300px;">
            <canvas id="userLoginChart"></canvas>
        </div>
    </div>

    <!-- Right Side: FAQ Section -->
    <div class="w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6 shadow-sm">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-8 text-center">Frequently Asked Questions</h2>
        <hr>
        <div class="grid grid-cols-1 gap-4 mt-6" x-data="{ open: null }">
            @forelse ($faq as $index => $faq)
                <article class="group relative bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg transition-all hover:border-gray-300 dark:hover:border-gray-500" x-data="{ id: {{ $index }} }">
                    <button @click="open = (open === id) ? null : id" class="w-full text-left p-5 pr-12 focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $faq->name }}</h3>
                        <svg class="absolute top-5 right-5 w-6 h-6 transform transition-transform" :class="{ 'rotate-180': open === id }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="answer-{{ $index }}" class="overflow-hidden transition-all duration-300" x-show="open === id" x-collapse>
                        <div class="px-5 pb-5 pt-2 border-t border-gray-100 dark:border-gray-600">
                            <p class="text-gray-600 dark:text-gray-300">{{ $faq->message }}</p>
                        </div>
                    </div>
                </article>
            @empty
                <p class="text-gray-500 dark:text-gray-400 text-center">No FAQs available at the moment.</p>
            @endforelse
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('userLoginChart').getContext('2d');
    const userLogins = @json($loginCounts);
    new Chart(ctx, {
        type: 'bar',
        data: { labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], datasets: [{ label: 'User Logins', data: userLogins, backgroundColor: 'rgba(54, 162, 235, 0.5)', borderColor: 'rgba(54, 162, 235, 1)', borderWidth: 1 }] },
        options: { responsive: true, scales: { y: { beginAtZero: true } } }
    });
});
</script>

@endsection
