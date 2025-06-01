@extends('layouts.trainer-app')
@section('content')

<a href="{{ route('trainers.dashboard') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">dashboard</a>

<div class="py-12">
    <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-700 p-4 rounded-md mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-white">Membership</h1>
                </div>
                <hr class="border border-green-200">
                <div class="container mt-6">
                    <table id="mytable">
                        <thead>
                            <tr >
                                <th>SN</th>
                                <th>user</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Specialization</th>
                                <th>joining</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($trainer as $trainers)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$trainers->user->name}}</td>
                                <td>{{$trainers->user->email}}</td>
                                <td>{{$trainers->phone_no}}</td>
                                <td>{{$trainers->specialization}}</td>
                                <td>{{$trainers->created_at}}</td>
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