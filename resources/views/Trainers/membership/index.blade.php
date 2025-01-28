@extends('layouts.trainer-app')
@section('content')
<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-700 p-4 rounded-md mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-white">Membership</h1>
                </div>
                <hr class="border border-green-200">
                <div class="container mt-6">
                    <table id="mytable" class="display table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700">
                                <th class="px-4 py-2 border border-gray-300">SN</th>
                                <th class="px-4 py-2 border border-gray-300">user</th>
                                <th class="px-4 py-2 border border-gray-300">Email</th>
                                <th class="px-4 py-2 border border-gray-300">Phone</th>
                                <th class="px-4 py-2 border border-gray-300">Specialization</th>
                                <th class="px-4 py-2 border border-gray-300">joining</th>
                                <th class="px-4 py-2 border border-gray-300">Expiry on</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($trainer as $trainer)
                              <tr>
                                <td class="border px-2 py-4">{{$loop-> index+1}}</td>
                                <td class="border px-2 py-4">{{$trainer->user->name }}</td>
                                <td class="border px-2 py-4">{{$trainer->user->email }}</td>
                                <td class="border px-2 py-4">{{$trainer->phone_no}}</td>
                                <td class="border px-2 py-4">{{$trainer->specialization}}</td>
                                <td class="border px-2 py-4">{{$trainer->created_at}}</td>
                                <td class="border px-2 py-4">{{$trainer->end_at}}</td>
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