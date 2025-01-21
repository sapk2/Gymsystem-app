@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-700 p-4 rounded-md mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-white">Memberships</h1>
            
                    <a href="{{route('admin.managemembers.create')}}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-800 transition">Add New</a>
                </div>
                <hr class="border border-green-200">
                <div class="container mt-6">
                    <table id="mytable" class="display table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700">
                                <th class="px-4 py-2 border border-gray-300">SN</th>
                                <th class="px-4 py-2 border border-gray-300">user</th>
                                <th class="px-4 py-2 border border-gray-300">Plan</th>
                                <th class="px-4 py-2 border border-gray-300">city</th>
                                <th class="px-4 py-2 border border-gray-300">province</th>
                                <th class="px-4 py-2 border border-gray-300">Email</th>
                                <th class="px-4 py-2 border border-gray-300">Gender</th>
                                <th class="px-4 py-2 border border-gray-300">Date of Birth</th>
                                <th class="px-4 py-2 border border-gray-300">phone</th>
                                <th class="px-4 py-2 border border-gray-300">Joining</th>
                                <th class="px-4 py-2 border border-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($mem as $mem)
                              <tr>
                                <td class="border px-2 py-4">{{$loop-> index+1}}</td>
                                <td class="border px-2 py-4">{{$mem->$user->name}}</td>
                                <td class="border px-2 py-4">{{$mem->$plan->name}}</td>
                                <td class="border px-2 py-4">{{$mem->city_name}}</td>
                                <td class="border px-2 py-4">{{$mem->state}}</td>
                                <td class="border px-2 py-4">{{$mem->$user->email}}</td>
                                <td class="border px-2 py-4">{{$mem->gender}}</td>
                                <td class="border px-2 py-4">{{$mem->dob}}</td>
                                <td class="border px-2 py-4">{{$mem->phone_no}}</td>
                                <td class="border px-2 py-4">{{$mem->joining_date}}</td>
                                <td class="border px-2 py-4">
                                    <a href="{{route('admin.managemembers.edit',$mem->id)}}" class="text-white bg-blue-700 rounded-md text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700  hover:bg-blue-800">edit</a>
                                    <a href="{{route('admin.managemembers.delete',$mem->id)}}" onclick="return confirm('Are you sure?')" class="text-white bg-red-700 rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700  hover:bg-red-800">Delete</a>
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