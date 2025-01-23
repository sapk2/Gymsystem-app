@extends('layouts.app')
@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="text-gray-900 dark:text-gray-100">
                <h1 class="text-2xl font-bold mb-4">Routine Details</h1>
                <hr class="mb-4">
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        <p class="text-sm text-gray-600 dark:text-gray-300 font-semibold">Trainer</p>
                        <p class="text-lg font-bold">{{ $routine->user->name }}</p>
                    </div>
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
                </div>

                <div class="mt-6">
                    <a href="{{ route('admin.routines.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to Routines</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
