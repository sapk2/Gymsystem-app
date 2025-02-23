@extends('layouts.app')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<span>
    <p class="text-2xl text-white">Welcome {{Auth::user()->name}}</p>
</span>
    <hr>
    <div class="contianer mt-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-4" >
        <div class="bg-red-500 shadow-md rounded-lg p-6 border border-red-500 flex flex-col">
            <h2 class="text-xl text-white flex justify-between items-center">
                Total Users
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </h2>  
            <div class="text-3xl font-bold text-white">{{$usercount}}</div>
        </div>
        <div class="bg-green-500 shadow-md rounded-lg p-6 border border-green-500 flex flex-col">
        <h2 class="text-xl text-white flex justify-between items-center">Total Attendance
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
            </svg>
              
        </h2>
        <div class="text-3xl font-bold text-white">{{$attendances}}</div>
        </div>
        <div class="bg-sky-500 shadow-md rounded-lg p-6 border border-blue-500 flex flex-col">
        <h2 class="text-xl text-white flex justify-between items-center ">Total Membership
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2h-5m0-4h5v-2h-5m-6 4h-5v-2h5m0-4h-5v-2h5m6-4h-5V4h5v4z" />
            </svg>              
        </h2>
        <div class="text-3xl font-bold text-white">{{$member}}</div>
        </div>
        <div class="bg-slate-500 shadow-md rounded-lg p-6 border border-slate-500 flex flex-col">
            <h2 class="text-xl text-white flex justify-between items-center">Total FAQ
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.422-2.87-3.085-2.87-1.358 0-2.39.617-3.085 1.519-.693-.902-1.726-1.519-3.085-1.519C5.422 3.767 4 5.017 4 6.637v4.282c0 1.235 1.022 2.14 2.186 2.186.48.03.96.062 1.44.096m9.344-8.334c.195.041.388.088.578.142.997.27 1.74 1.15 1.74 2.182 0 .893-.509 1.67-1.291 1.98M12 15.75a3 3 0 01-3-3m3 3a3 3 0 100 6 3 3 0 000-6zm0 0h1.5m-1.5 0H9" />
                </svg>
            </h2>
            <div class="text-3xl font-bold text-white">{{$contacts}}</div>
        </div>
        </div>
        </div>
        
        <!--Overview stat-->
<div  class="flex flex-col shadow-md rounded-lg p-2  mt-4">
    <h2 class="text-xl font-bold text-center text-white mb-4">Monthly User Logins</h2>
    <div class="w-full max-w-2xl mx-auto" style="height: 300px;">
    <canvas id="userLoginChart"></canvas>
    </div>
</div>   
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('userLoginChart').getContext('2d');
    const userLogins = @json($loginCounts);
    const labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    
    new Chart(ctx, {
    type: 'bar', // Change to 'line' for a line chart
    data: {
    labels: labels,
    datasets: [{
    label: 'User Logins',
    data: userLogins,
    backgroundColor: 'rgba(54, 162, 235, 0.5)',
    borderColor: 'rgba(54, 162, 235, 1)',
    borderWidth: 1
    }]
    },
    options: {
    responsive: true,
    scales: {
    y: { beginAtZero: true }
    }
    }
    });
    });
    </script>
<div class="w-full max-w-full mt-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6 shadow-sm">
    <section aria-labelledby="faq-heading">
        <h2 id="faq-heading" class="text-2xl font-bold text-gray-900 dark:text-white mb-8 text-center">
            Frequently Asked Questions
        </h2>
        <hr>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6" x-data="{ open: null }">
            @forelse ($faq as $index => $faq)
                <article 
                    class="group relative bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg transition-all hover:border-gray-300 dark:hover:border-gray-500"
                    x-data="{ id: {{ $index }} }"
                >
                    <button
                        @click="open = (open === id) ? null : id"
                        class="w-full text-left p-5 pr-12 focus:outline-none focus:ring-2 focus:ring-primary-500"
                        aria-expanded="false"
                        :aria-expanded="open === id"
                        aria-controls="answer-{{ $index }}"
                    >
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                            {{ $faq->name }}
                        </h3>
                        <svg 
                            class="absolute top-5 right-5 w-6 h-6 transform transition-transform"
                            :class="{ 'rotate-180': open === id }"
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div 
                        id="answer-{{ $index }}"
                        class="overflow-hidden transition-all duration-300"
                        x-show="open === id"
                        x-collapse
                        style="display: none"
                    >
                        <div class="px-5 pb-5 pt-2 border-t border-gray-100 dark:border-gray-600">
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                {{ $faq->message }}
                            </p>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-500 dark:text-gray-400">No FAQs available at the moment.</p>
                </div>
            @endforelse
        </div>
    </section>
</div>
@endsection