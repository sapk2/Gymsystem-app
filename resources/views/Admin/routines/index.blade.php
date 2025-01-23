@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-700 p-4 rounded-md mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-white">Manage Routine</h1>
                    <a href="{{route('admin.routines.create')}}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-800 transition">Add New</a>
                </div>
                <hr>
                <div class="container mt-3">
                    <div class="overflow-x-auto">
                        <table id="mytable" class="min-w-full border border-gray-300">
                            <thead class="bg-gray-200 dark:bg-gray-700 text-center">
                                <tr>
                                    <th class="px-6 py-3 border border-gray-300 text-center">SN</th>
                                    <th class="px-6 py-3 border border-gray-300 text-center">Trainer</th>
                                    <th class="px-6 py-3 border border-gray-300 text-center">Email</th>
                                    <th class="px-6 py-3 border border-gray-300 text-center">Routines</th>
                                    <th class="px-6 py-3 border border-gray-300 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($routine as $routine)
                                    <tr>
                                        <td class="px-4 py-2 border border-collapse">{{$loop->index +1}}</td>
                                        <td class="px-4 py-2 border border-collapse">{{$routine->user->name}}</td>
                                        <td class="px-4 py-2 border border-collapse">{{$routine->user->email}}</td>
                                        <td class="px-4 py-2 border border-collapse">
                                        <a href="{{route('admin.routines.show',$routine->id)}}" class="text-gray-300 hover:underline font-bold py-2 px-4">Show</a>
                                       </td>
                                        <td class="px-4 py-2 border border-collapse">
                                            <a href="{{route('admin.routines.edit',$routine->id)}}" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Edit</a>
                                           
                                            <a href="{{route('admin.routines.delete',$routine->id)}}"   onclick="return confirm('Are you sure to Delete?')"  class="  bg-red-500 hover:bg-red-700 text-white font-bold ml-2 py-2 px-4 rounded-full">Delete</a>
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
</div>
<script>
     document.addEventListener("DOMContentLoaded", function() {
        let table = new DataTable('#mytable');
    });
</script>
@endsection