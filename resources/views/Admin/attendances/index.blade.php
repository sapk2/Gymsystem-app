@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-700 p-4 rounded-md mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-white">Manage Attendances</h1>
                    <a href="{{route('admin.attendances.create')}}" class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600">Add New</a>
                </div>
                <hr>
                <div class=" container mt-6">
                    <table id="mytable" class="w-full text-base text-left rtl:text-right text-gray-100 dark:text-gray-100">
                        <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
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
                                <tr>
                                    <td class="border px-2 py-4">{{$loop->index + 1}}</td>
                                    <td class="border px-2 py-4">{{$attendance->user->name}}</td>
                                    <td class="border px-2 py-4">{{$attendance->date}}</td>
                                    <td class="border px-2 py-4">{{$attendance->check_in}}</td>
                                    <td class="border px-2 py-4">{{$attendance->check_out}}</td>
                                    <td class="border px-2 py-4">{{$attendance->status}}</td>
                                    <td class=" px-2 py-4 flex mt-2 space-x-2 ">
                                        <a href="{{route('admin.attendances.edit',$attendance->id)}}" class="bg-sky-500 text-white px-4 py-2 rounded-xl hover:bg-sky-600" >Edit</a>
                                        <form action="{{route('admin.attendances.delete',$attendance->id)}}" method="get" class="inline-block">
                                            @csrf
                                            <button type="submit" onclick="return confirm('Are you sure to Delete!!?')" class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
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