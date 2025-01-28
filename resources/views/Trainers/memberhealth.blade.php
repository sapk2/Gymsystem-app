@extends('layouts.trainer-app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
               <h1 class="text-2xl text-white">View Health Status</h1>
               <hr class="border">
               <div class="mt-6">
                <table id="mytable"> 
                    <thead >
                        <tr>
                            <th>Member</th>
                            <th>blood group</th>
                            <th>height</th>
                            <th>weight</th>
                            <th>blood Pressure</th>
                            <th>Heart Rate</th>
                            <th>Body Fat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($health as $health)
                            <tr>
                                <td>{{$health->user->name}}</td>
                                <td>{{$health->blood_group}}</td>
                                <td>{{$health->height}}</td>
                                <td>{{$health->weight}}</td>
                                <td>{{$health->blood_pressure}}</td>
                                <td>{{$health->heart_rate}}</td>
                                <td>{{$health->body_fat_percentage}}</td>
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