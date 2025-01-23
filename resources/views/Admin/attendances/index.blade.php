@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-700 p-4 rounded-md mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-white">Manage Attendances</h1>
                    <a href="{{route('admin.attendances.create')}}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-800 transition">Add New</a>
                </div>
                <hr>
                <div class=" container mt-6">
                    <table id="mytable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3 border border-gray-300 text-center">SN</th>
                                <th class="px-6 py-3 border border-gray-300 text-center">Member name</th>
                                <th class="px-6 py-3 border border-gray-300 text-center">Date</th>
                                <th class="px-6 py-3 border border-gray-300 text-center">Check-In</th>
                                <th class="px-6 py-3 border border-gray-300 text-center">Check-Out</th>
                                <th class="px-6 py-3 border border-gray-300 text-center">Status</th>
                                <th class="px-6 py-3 border border-gray-300 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendance as $attendance)
                                <td class="border px-2 py-4">{{$loop->index + 1}}</td>
                                <td class="border px-2 py-4">{{$attendance->user->name}}</td>
                                <td class="border px-2 py-4">{{$attendance->date}}</td>
                                <td class="border px-2 py-4">{{$attendance->check_in}}</td>
                                <td class="border px-2 py-4">{{$attendance->check_out}}</td>
                                <td class="border px-2 py-4">{{$attendance->status}}</td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let table = new DataTable('#mytable');
    });
</script>
@endsection