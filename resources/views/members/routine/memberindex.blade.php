@extends('layouts.member-app')
@section('content')
<div class="container mt-3">
    <h1 class="text-xl">Schedules </h1>
    <hr>
</div>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($routine as $routine)
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        <p class="text-sm text-gray-600 dark:text-gray-300 font-semibold">Exercise</p>
                        <p class="text-lg font-bold">{{ $routine->exercise_name }}</p>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        <p class="text-sm text-gray-600 dark:text-gray-300 font-semibold">Days</p>
                        <p class="text-lg font-bold">{{ $routine->day_of_week }}</p>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        <p class="text-sm text-gray-600 dark:text-gray-300 font-semibold">Start Time</p>
                        <p class="text-lg font-bold">{{ $routine->start_time }}</p>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        <p class="text-sm text-gray-600 dark:text-gray-300 font-semibold">End Time</p>
                        <p class="text-lg font-bold">{{ $routine->end_time }}</p>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection