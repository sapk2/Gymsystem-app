@extends('layouts.member-app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-sky-500 dark:text-gray-200">Your Workout Schedule</h1>
        <div class="bg-blue-100 dark:bg-sky-500 p-3 rounded-lg">
            <span class="text-slate-100 dark:text-white-200 text-sm">Current Week: {{ now()->format('M j, Y') }}</span>
        </div>
    </div>

    @if($routine->isEmpty())
    <div class="text-center py-12 bg-gray-50 dark:bg-gray-700 rounded-lg">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
        </svg>
        <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-gray-100">No scheduled workouts</h3>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Contact your trainer to set up your exercise schedule.</p>
    </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($routine as $schedule)
        <div class="relative bg-white dark:bg-gray-700 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-1">
                            {{ $schedule->exercise_name }}
                        </h3>
                        <span class="text-sm text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900 px-3 py-1 rounded-full">
                            {{ $schedule->day_of_week }}
                        </span>
                    </div>
                    <div class="bg-indigo-100 dark:bg-indigo-800 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>

                <div class="space-y-4 mt-6">
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-400 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="ml-3 text-gray-600 dark:text-gray-300">
                            Starts: <span class="font-medium">{{ $schedule->start_time }}</span>
                        </span>
                    </div>

                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-400 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="ml-3 text-gray-600 dark:text-gray-300">
                            Ends: <span class="font-medium">{{ $schedule->end_time }}</span>
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="absolute bottom-0 inset-x-0 h-2 bg-gradient-to-r from-blue-400 to-purple-500 rounded-b-xl"></div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection