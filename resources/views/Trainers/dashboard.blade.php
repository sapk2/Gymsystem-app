@extends('layouts.trainer-app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Dashboard Header -->
        <div class="bg-slate-700 rounded-xl shadow-lg p-6">
            <h2 class="text-3xl font-bold text-gray-100">Trainer Dashboard</h2>
            <p class="text-gray-300 mt-2">Welcome back, {{ Auth::user()->name }}!</p>
        </div>

        <!-- Summary Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-slate-700 p-6 rounded-xl shadow-lg transition-transform hover:scale-105">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400">Total Members</p>
                        <p class="text-3xl font-bold text-blue-400 mt-2">{{ $totalMembers }}</p>
                    </div>
                    <div class="bg-blue-500/20 p-4 rounded-full">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-slate-700 p-6 rounded-xl shadow-lg transition-transform hover:scale-105">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400">Attendance Rate</p>
                        <p class="text-3xl font-bold text-purple-400 mt-2">
                            {{ $totalMembers > 0 ? round(($presentMembers / $totalMembers) * 100, 2) : 0 }}%
                        </p>
                    </div>
                    <div class="bg-purple-500/20 p-4 rounded-full">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Bar Chart Container -->
            <div class="bg-slate-700 p-6 rounded-xl shadow-lg">
                <h3 class="text-lg font-semibold text-gray-300 mb-4">Attendance Trends</h3>
                <div class="relative h-48">
                    <canvas id="attendanceChart"></canvas>
                </div>
            </div>

            <!-- Pie Chart Container -->
            <div class="bg-slate-700 p-6 rounded-xl shadow-lg">
                <h3 class="text-lg font-semibold text-gray-300 mb-4">Attendance Distribution</h3>
                <div class="relative h-48">
                    <canvas id="memberAttendanceChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Attendance Table -->
        <div class="bg-slate-700 rounded-xl shadow-lg overflow-hidden">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-300 mb-4">Recent Attendance</h3>
                <div class="overflow-x-auto rounded-lg">
                    @if($demoTable->isEmpty())
                        <p class="text-gray-400 text-center py-6">No attendance records available.</p>
                    @else
                        <table class="w-full">
                            <thead class="bg-slate-800/50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-gray-400 font-medium">Member</th>
                                    <th class="px-4 py-3 text-left text-gray-400 font-medium">Date</th>
                                    <th class="px-4 py-3 text-left text-gray-400 font-medium">Check-in</th>
                                    <th class="px-4 py-3 text-left text-gray-400 font-medium">Check-out</th>
                                    <th class="px-4 py-3 text-left text-gray-400 font-medium">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-600">
                                @foreach($demoTable as $row)
                                <tr class="hover:bg-slate-600/20 transition-colors">
                                    <td class="px-4 py-3 text-gray-300">{{ $row->user->name }}</td>
                                    <td class="px-4 py-3 text-gray-400">{{ $row->date }}</td>
                                    <td class="px-4 py-3 text-gray-400">{{ $row->check_in ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-gray-400">{{ $row->check_out ?? 'N/A' }}</td>
                                    <td class="px-4 py-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $row->status == 'Present' ? 'bg-green-900/50 text-green-600' : 'bg-red-900/50 text-red-400' }}">
                                            {{ $row->status }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const attendanceData = @json($attendanceData);
    const totalMembers = {{ $totalMembers }};
    const presentMembers = {{ $presentMembers }};
    const lateMembers = {{ $lateMembers }};
    const absentMembers = {{ $absentMembers }};

    // Bar Chart (unchanged)
    if (Object.keys(attendanceData).length > 0) {
        new Chart(document.getElementById('attendanceChart'), {
            type: 'bar',
            data: {
                labels: Object.keys(attendanceData),
                datasets: [{
                    label: 'Check-ins',
                    data: Object.values(attendanceData),
                    backgroundColor: 'rgba(99, 102, 241, 0.6)',
                    borderColor: 'rgba(99, 102, 241, 1)',
                    borderWidth: 1,
                    borderRadius: 4,
                    categoryPercentage: 0.6,
                    barPercentage: 0.8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: true }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(255,255,255,0.1)' },
                        ticks: { color: '#CBD5E1' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#CBD5E1' }
                    }
                }
            }
        });
    }

    // Updated Pie Chart
    new Chart(document.getElementById('memberAttendanceChart'), {
        type: 'pie',
        data: {
            labels: ['Present', 'Late', 'Absent'],
            datasets: [{
                data: [presentMembers, lateMembers, absentMembers],
                backgroundColor: [
                    'rgba(74, 222, 128, 0.8)',  // Green - Present
                    'rgba(251, 191, 36, 0.8)',  // Yellow - Late
                    'rgba(248, 113, 113, 0.8)'  // Red - Absent
                ],
                borderColor: [
                    'rgba(74, 222, 128, 1)',
                    'rgba(251, 191, 36, 1)',
                    'rgba(248, 113, 113, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { color: '#CBD5E1' }
                }
            }
        }
    });
});
</script>

@endsection