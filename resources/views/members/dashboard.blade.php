@extends('layouts.member-app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
            Welcome, {{ Auth::user()->name }}!
        </h1>
        <p class="text-gray-600 dark:text-gray-300 mt-2">Your fitness journey at a glance</p>
    </div>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <!-- Health Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        @if($latestHealth)
            <div class="bg-white dark:bg-slate-600 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-700 dark:text-gray-300">BMI</p>
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $latestHealth->bmi }}</p>
                    </div>
                    <div class="p-3 bg-green-100  rounded-full">
                        <box-icon name='hourglass-bottom' type='solid' color='#17cfe9' ></box-icon>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-600 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-700 dark:text-gray-300">Blood Pressure</p>
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $latestHealth->blood_pressure }}</p>
                    </div>
                    <div class="p-3 bg-green-100  rounded-full">
                        <box-icon name='heart' type='solid' flip='horizontal' color='#e50b0b' ></box-icon>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-600 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-700 dark:text-gray-300">Heart Rate</p>
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $latestHealth->heart_rate }} BPM</p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full">
                        <box-icon name='donate-heart' color='#40e109' ></box-icon>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-600 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-700 dark:text-gray-300">Body Fat</p>
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $latestHealth->body_fat_percentage }}%</p>
                    </div>
                    <div class="p-3 bg-purple-100  rounded-full">
                        <box-icon name='body' color='#e38bd4' ></box-icon>
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
        <hr>
        <div class="overflow-x-auto rounded-lg border mt-6 border-gray-200 dark:border-gray-700">
            <table id="health-table" class="w-full">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-800">
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Height (cm)</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Weight (kg)</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Blood Pressure</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Heart Rate</th>
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
                            <td colspan="5" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
                                No health records found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        if ($('#health-table tbody tr').length > 1) {
            $('#health-table').DataTable({
                responsive: true,
                order: [[0, 'desc']],
                language: {
                    search: "Search records:",
                    emptyTable: "No health data available",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                }
            });
        }
    });
</script>


@endsection