@extends('layouts.member-app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Welcome Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
            Welcome, {{ $user->name }}!
        </h1>
        <p class="text-gray-600 dark:text-gray-300 mt-2">Your fitness journey at a glance</p>
    </div>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <!-- Health Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        @if($latestHealth)
            <!-- BMI -->
            <div class="bg-white dark:bg-slate-600 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-700 dark:text-gray-300">BMI</p>
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $latestHealth->bmi }}</p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full">
                        <box-icon name='hourglass-bottom' type='solid' color='#17cfe9'></box-icon>
                    </div>
                </div>
            </div>
            <!-- Blood Pressure -->
            <div class="bg-white dark:bg-slate-600 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-700 dark:text-gray-300">Blood Pressure</p>
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $latestHealth->blood_pressure }}</p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full">
                        <box-icon name='heart' type='solid' flip='horizontal' color='#e50b0b'></box-icon>
                    </div>
                </div>
            </div>
            <!-- Heart Rate -->
            <div class="bg-white dark:bg-slate-600 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-700 dark:text-gray-300">Heart Rate</p>
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $latestHealth->heart_rate }} BPM</p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full">
                        <box-icon name='donate-heart' color='#40e109'></box-icon>
                    </div>
                </div>
            </div>
            <!-- Body Fat -->
            <div class="bg-white dark:bg-slate-600 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-700 dark:text-gray-300">Body Fat</p>
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $latestHealth->body_fat_percentage }}%</p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-full">
                        <box-icon name='body' color='#e38bd4'></box-icon>
                    </div>
                </div>
            </div>
        @else
            <div class="col-span-4 text-center py-6">
                <p class="text-gray-500 dark:text-gray-400">No health data available</p>
            </div>
        @endif
    </div>

    <!-- Health Goal Progress -->
    @if ($goal && $latestHealth)
    <div class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Your Progress</h2>

        @php
            $targetWeight = $goal->target_weight;
            $targetBMI = $goal->target_bmi;
            $targetFat = $goal->target_body_fat;

            $weightProgress = ($targetWeight && $latestHealth->weight)
                ? min(100, max(0, (1 - abs($latestHealth->weight - $targetWeight) / $targetWeight) * 100))
                : 0;

            $bmiProgress = ($targetBMI && $latestHealth->bmi)
                ? min(100, max(0, (1 - abs($latestHealth->bmi - $targetBMI) / $targetBMI) * 100))
                : 0;

            $fatProgress = ($targetFat && $latestHealth->body_fat_percentage)
                ? min(100, max(0, (1 - abs($latestHealth->body_fat_percentage - $targetFat) / $targetFat) * 100))
                : 0;
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white dark:bg-slate-600 p-5 rounded shadow-md">
                <p class="text-sm text-gray-500 dark:text-gray-300 mb-1">Weight Goal</p>
                <div class="w-full bg-gray-200 dark:bg-gray-700 h-4 rounded-full overflow-hidden">
                    <div class="h-4 bg-green-500 rounded-full transition-all duration-500" style="width: {{ $weightProgress }}%"></div>
                </div>
                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Target: {{ $targetWeight }}kg | Current: {{ $latestHealth->weight }}kg</p>
            </div>

            <div class="bg-white dark:bg-slate-600 p-5 rounded shadow-md">
                <p class="text-sm text-gray-500 dark:text-gray-300 mb-1">BMI Goal</p>
                <div class="w-full bg-gray-200 dark:bg-gray-700 h-4 rounded-full overflow-hidden">
                    <div class="h-4 bg-blue-500 rounded-full transition-all duration-500" style="width: {{ $bmiProgress }}%"></div>
                </div>
                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Target: {{ $targetBMI }} | Current: {{ $latestHealth->bmi }}</p>
            </div>

            <div class="bg-white dark:bg-slate-600 p-5 rounded shadow-md">
                <p class="text-sm text-gray-500 dark:text-gray-300 mb-1">Body Fat % Goal</p>
                <div class="w-full bg-gray-200 dark:bg-gray-700 h-4 rounded-full overflow-hidden">
                    <div class="h-4 bg-purple-500 rounded-full transition-all duration-500" style="width: {{ $fatProgress }}%"></div>
                </div>
                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Target: {{ $targetFat }}% | Current: {{ $latestHealth->body_fat_percentage }}%</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Detailed Health Data Table -->
    <div class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Health History</h2>
        <hr>

        <div class="w-full overflow-x-auto mt-6 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200 dark:scrollbar-thumb-gray-600 dark:scrollbar-track-gray-800">
            <div class="min-w-max">
                <table id="health-table" class="w-full text-sm">
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
                                <td class="px-4 py-3 text-gray-900 dark:text-white">{{ $record->created_at->format('M d, Y') }}</td>
                                <td class="px-4 py-3 text-gray-900 dark:text-white">{{ $record->height }}</td>
                                <td class="px-4 py-3 text-gray-900 dark:text-white">{{ $record->weight }}</td>
                                <td class="px-4 py-3 text-gray-900 dark:text-white">{{ $record->blood_pressure }}</td>
                                <td class="px-4 py-3 text-gray-900 dark:text-white">{{ $record->heart_rate }}</td>
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
</div>

<!-- DataTable Script -->
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
