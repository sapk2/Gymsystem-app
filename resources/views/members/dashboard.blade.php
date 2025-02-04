@extends('layouts.member-app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Welcome, {{ Auth::user()->name }}!</h1>
        <p class="text-gray-600 dark:text-gray-300 mt-2">Your fitness journey at a glance</p>
    </div>

    <!-- Health Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        @if($latestHealth)
        <div class="bg-white dark:bg-slate-500 p-6 rounded-lg shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-100 dark:text-gray-100">BMI</p>
                    @php
                        $bmi = $latestHealth->weight / (($latestHealth->height/100) ** 2);
                    @endphp
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ number_format($bmi, 1) }}</p>
                </div>
                <div class="p-3 bg-blue-100 dark:bg-sky-500 rounded-full">
                    📊
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-500 p-6 rounded-lg shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-100 dark:text-gray-100">Blood Pressure</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $latestHealth->blood_pressure }}</p>
                </div>
                <div class="p-3 bg-red-100 dark:bg-red-900 rounded-full">
                    ❤️
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-500 p-6 rounded-lg shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-100 dark:text-gray-100">Heart Rate</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $latestHealth->heart_rate }} BPM</p>
                </div>
                <div class="p-3 bg-green-100 dark:bg-green-900 rounded-full">
                    💓
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-500 p-6 rounded-lg shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-100 dark:text-gray-100">Body Fat</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $latestHealth->body_fat_percentage }}%</p>
                </div>
                <div class="p-3 bg-purple-100 dark:bg-purple-900 rounded-full">
                    ⚖️
                </div>
            </div>
        </div>
        @else
        <div class="col-span-4 text-center py-6">
            <p class="text-gray-500 dark:text-gray-400">No health data available</p>
        </div>
        @endif
    </div>

    <!-- Detailed Health Data Table -->
    <div class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Health History</h2>
        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
            <table id="health-table" class="w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Height (cm)</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Weight (kg)</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Blood Pressure</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Heart Rate</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($health as $record)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-white">{{ $record->created_at->format('M d, Y') }}</td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-white">{{ $record->height }}</td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-white">{{ $record->weight }}</td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-white">{{ $record->blood_pressure }}</td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-white">{{ $record->heart_rate }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">No health records found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Membership Plans Section -->
    <div class="py-8">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Available Plans</h2>
       <hr>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @forelse ($plan as $planItem)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-shadow p-6">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">{{ $planItem->name }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">{{ $planItem->validity }}</p>
                
                <div class="flex items-baseline mb-4">
                    <span class="text-3xl font-bold text-gray-800 dark:text-white">RS.{{ $planItem->amount }}</span>
                    <span class="ml-1 text-gray-500 dark:text-gray-400">/month</span>
                </div>

                <div class="mb-6">
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        {!! nl2br(e($planItem->description)) !!}
                    </p>
                </div>

                <a href="{{ route('members.payments.create') }}" 
                   class="block w-full text-center px-4 py-2 text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 rounded-lg transition-colors">
                    Choose Plan
                </a>
            </div>
            @empty
            <div class="col-span-3 text-center py-6">
                <p class="text-gray-500 dark:text-gray-400">No plans currently available</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#health-table').DataTable({
            responsive: true,
            order: [[0, 'desc']],
            language: {
                search: "Search records:",
                emptyTable: "No health data available",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
            }
        });
    });
</script>
@endsection