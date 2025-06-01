@extends('layouts.trainer-app')
@section('content')
<a href="{{ route('trainers.dashboard') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">dashboard</a>
<div class="py-12" x-data="{ showConfirm: false, deleteUrl: '' }">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-between mb-4">
                    <div class="text-2xl font-bold">Health Status</div>
                    <a href="{{ route('Trainers.status.create') }}" class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600">Add Health Status</a>
                </div>

                <div class="relative">
                    <table id="mytable">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Notes</th>
                                <th>Records</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->notes }}</td>
                                <td>
                                    <a href="{{ route('Trainers.status.show', $item->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Details</a>
                                </td>
                                <td class="mt-2 flex justify-center space-x-1">
                                    <a href="{{ route('Trainers.status.edit', $item->id) }}" class="bg-sky-500 text-white px-4 py-2 rounded-xl hover:bg-sky-600">Edit</a>

                                    <button 
                                        type="button" 
                                        @click="showConfirm = true; deleteUrl = '{{ route('Trainers.status.delete', $item->id) }}'" 
                                        class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-600">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Confirmation Modal -->
                <div 
                    x-show="showConfirm" 
                    x-cloak 
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                    <div class="bg-gray-600 p-6 rounded-lg shadow-lg w-full max-w-sm">
                        <h2 class="text-lg font-semibold mb-4 text-gray-100">Are you sure you want to delete?</h2>
                        <div class="flex justify-end space-x-4">
                            <button @click="showConfirm = false" class="px-4 py-2 bg-gray-600 rounded-full hover:bg-gray-400">Cancel</button>
                            <form :action="deleteUrl" method="get">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#mytable').DataTable();
    });
</script>
@endsection
