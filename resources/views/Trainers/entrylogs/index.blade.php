@extends('layouts.trainer-app')
@section('content')
<a href="{{ route('trainers.dashboard') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">dashboard</a>
<div class="py-12" x-data="{ showConfirm: false, deleteUrl: '' }">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-700 p-4 rounded-md mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-white">Manage Attendances</h1>
                    <a href="{{ route('Trainers.entrylogs.create') }}" class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600">Add New</a>
                </div>
                <hr>
                <div class="container mt-6">
                    <table id="mytable">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Member name</th>
                                <th>Date</th>
                                <th>Check-In</th>
                                <th>Check-Out</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entrylogs as $attendance)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $attendance->user->name }}</td>
                                    <td>{{ $attendance->date }}</td>
                                    <td>{{ $attendance->check_in }}</td>
                                    <td>{{ $attendance->check_out }}</td>
                                    <td>{{ $attendance->status }}</td>
                                    <td class="flex mt-2 space-x-2">
                                        <a href="{{ route('Trainers.entrylogs.edit', $attendance->id) }}" class="bg-sky-500 text-white px-4 py-2 rounded-xl hover:bg-sky-600">Edit</a>
                                        <button 
                                            @click="showConfirm = true; deleteUrl = '{{ route('Trainers.entrylogs.delete', $attendance->id) }}'" 
                                            class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-600">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Confirm Delete Modal -->
                    <div x-show="showConfirm" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                        <div class="bg-gray-600 p-6 rounded-md shadow-md">
                            <h2 class="text-lg font-semibold mb-4 text-gray-800">Are you sure you want to delete this entry?</h2>
                            <div class="flex justify-end space-x-4">
                                <button @click="showConfirm = false" class="px-4 py-2 bg-gray-600 rounded-full hover:bg-gray-300">Cancel</button>
                                <form :action="deleteUrl" method="GET">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white  hover:bg-red-600 rounded-full">Yes, Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let table = new DataTable('#mytable');
    });
</script>
@endsection
