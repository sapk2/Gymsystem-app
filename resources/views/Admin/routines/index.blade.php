@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-700 p-4 rounded-md mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-white">Manage Routine</h1>
                    <a href="{{route('admin.routines.create')}}" class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600">Add New</a>
                </div>
                <hr>
                <div class="container mt-3">
                    <div class="overflow-x-auto">
                        <table id="mytable">
                            <thead >
                                <tr>
                                    <th>SN</th>
                                    <th>Trainer</th>
                                    <th>Email</th>
                                    <th>Routines</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($routine as $routine)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$routine->user->name}}</td>
                                        <td>{{$routine->user->email}}</td>
                                        <td>
                                        <a href="{{route('admin.routines.show',$routine->id)}}" class="text-gray-300 hover:underline font-bold py-2 px-4">Show</a>
                                       </td>
                                        <td class="flex space-x-1">
                                            <a href="{{route('admin.routines.edit',$routine->id)}}" class="bg-sky-500 text-white px-4 py-2 rounded-xl hover:bg-sky-600">Edit</a>
                                           
                                            <a href="{{route('admin.routines.delete',$routine->id)}}"   onclick="return confirm('Are you sure to Delete?')"  class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-600">Delete</a>
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