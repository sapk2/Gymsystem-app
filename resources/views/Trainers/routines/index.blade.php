@extends('layouts.trainer-app')
@section('content')
<a href="{{ route('trainers.dashboard') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">dashboard</a>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
               <h1 class="text-2xl text-bold text-white">Sessions</h1>
               <hr>
               <div class="container mt-6">
                <div class="overflow-x-auto">
                    <table id="mytable" >
                        <thead >
                            <tr>
                                <th>SN</th>
                                <th>Exercise</th>
                                <th>Days</th>
                                <th>start_time</th>
                                <th>End_time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($routine as $routine)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$routine->exercise_name}} </td>
                                    <td>{{$routine->day_of_week}} </td>
                                    <td>{{$routine->start_time}} </td>
                                    <td>{{$routine->end_time}} </td>
                                    <td>
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