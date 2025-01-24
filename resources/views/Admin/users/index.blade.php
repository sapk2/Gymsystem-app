@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-700 p-4 rounded-md mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-white">Manage Users</h1>
            
                    <a href="{{route('admin.users.create')}}" class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600">Add New</a>
                </div>
                <hr class="border border-green-200">
                <div class="container mt-6">
                    <table id="mytable" class="display table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700">
                                <th class="px-4 py-2 border border-gray-300">SN</th>
                                <th class="px-4 py-2 border border-gray-300">Name</th>
                                <th class="px-4 py-2 border border-gray-300">Email</th>
                                <th class="px-4 py-2 border border-gray-300">Roles</th>
                                <th class="px-4 py-2 border border-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($user as $user)
                              <tr>
                                <td class="border px-2 py-4">{{$loop-> index+1}}</td>
                                <td class="border px-2 py-4">{{$user->name}}</td>
                                <td class="border px-2 py-4">{{$user->email}}</td>
                                <td class="border px-2 py-4">{{$user->roles}}</td>
                                <td class="border px-2 py-4 flex space-x-2 ">
                                    <a href="{{route('admin.users.edit',$user->id)}}"class="bg-sky-500 text-white px-4 py-2 rounded-md hover:bg-sky-600">edit</a>
                                    <a href="{{route('admin.users.delete',$user->id)}}" onclick="return confirm('Are you sure?')" class="bg-red-600 text-white px-4 py-2  rounded-lg">Delete</a>
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