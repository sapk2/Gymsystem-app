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
    <div class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 dark:bg-gray-600">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Exercise</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Day</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Start Time</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">End Time</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                @foreach ($routine as $schedule)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-base font-semibold text-gray-800 dark:text-gray-200">
                            {{ $schedule->exercise_name }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-sm text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900 px-3 py-1 rounded-full">
                            {{ $schedule->day_of_week }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <svg class="w-5 h-5 mr-2 text-gray-400 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $schedule->start_time }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <svg class="w-5 h-5 mr-2 text-gray-400 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $schedule->end_time }}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
</div>
@endsection