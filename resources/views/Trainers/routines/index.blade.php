@extends('layouts.trainer-app')
@section('content')
 
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
               <h1 class="text-2xl text-bold text-white">Sessions</h1>
               <hr>
               <div class="container mt-6">
                <div class="overflow-x-auto">
                    <table id="mytable" class="min-w-full border border-gray-300">
                        <thead class="bg-gray-200 dark:bg-gray-700 text-center">
                            <tr>
                                <th class="px-6 py-3 border border-gray-300 text-center">SN</th>
                                <th class="px-6 py-3 border border-gray-300 text-center">Exercise</th>
                                <th class="px-6 py-3 border border-gray-300 text-center">Days</th>
                                <th class="px-6 py-3 border border-gray-300 text-center">start_time</th>
                                <th class="px-6 py-3 border border-gray-300 text-center">End_time</th>
                                <th class="px-6 py-3 border border-gray-300 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($routine as $routine)
                                <tr>
                                    <td class="px-4 py-2 border border-collapse">{{$loop->index +1}}</td>
                                    <td class="px-4 py-2 border border-collapse ">{{$routine->exercise_name}} </td>
                                    <td class="px-4 py-2 border border-collapse ">{{$routine->day_of_week}} </td>
                                    <td class="px-4 py-2 border border-collapse ">{{$routine->start_time}} </td>
                                    <td class="px-4 py-2 border border-collapse ">{{$routine->end_time}} </td>
                                    <td class="px-4 py-2 border border-collapse ">
                                        <a href="{{route('trainers.routines.edit',$routine->id)}}" class="bg-sky-500 text-white px-4 py-2 rounded-xl hover:bg-sky-600">Edit</a>
                                       
                                        
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