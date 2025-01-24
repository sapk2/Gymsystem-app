@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-700 p-4 rounded-md mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-white">Memberships</h1>
            
                    <a href="{{route('admin.managemembers.create')}}" class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600">Add New</a>
                </div>
                <hr class="border border-green-200">
                <div class="container mt-6">
                    <table id="mytable" class="display table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700">
                                <th class="px-4 py-2 border border-gray-300">SN</th>
                                <th class="px-4 py-2 border border-gray-300">user</th>
                                <th class="px-4 py-2 border border-gray-300">city</th>
                                <th class="px-4 py-2 border border-gray-300">Email</th>
                                <th class="px-4 py-2 border border-gray-300">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($mem as $mem)
                              <tr>
                                <td class="border px-2 py-4">{{$loop-> index+1}}</td>
                                <td class="border px-2 py-4">{{$mem->user->name }}</td>
                                <td class="border px-2 py-4">{{$mem->city_name}}</td>
                                <td class="border px-2 py-4">{{$mem->user->email}}</td>
                                <td class="border px-2 py-4 flex space-x-1 ">
                                    <a href="{{route('admin.managemembers.show',$mem->id)}}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Details</a>
                                    <a href="{{route('admin.managemembers.edit',$mem->id)}}" class="bg-sky-500 text-white px-4 py-2 rounded-md hover:bg-sky-600">edit</a>
                                    <a href="{{route('admin.managemembers.delete',$mem->id)}}" class="bg-red-600 text-white px-4 py-2  rounded-lg" onclick="return confirm('Are you sure?')">Delete</a>
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