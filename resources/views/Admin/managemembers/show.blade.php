@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-700 p-4 rounded-md mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-white">Memberships</h1>
                </div>
                <hr class="border border-green-200">
                <div class="container mt-9">
                    <table id="mytable" class="display table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700">
                                <th class="px-4 py-2 border border-gray-300">SN</th>
                                <th class="px-4 py-2 border border-gray-300">Plan</th>
                                <th class="px-4 py-2 border border-gray-300">Gender</th>
                                <th class="px-4 py-2 border border-gray-300">Date of Birth</th>
                                <th class="px-4 py-2 border border-gray-300">phone</th>
                                <th class="px-4 py-2 border border-gray-300">Joining</th>
                                <th class="px-4 py-2 border border-gray-300">expiry</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($mem as $mem)
                              <tr>
                                <td class="border px-2 py-4">{{$loop-> index+1}}</td>
                                <td class="border px-2 py-4">{{$mem->plan->plan_id }}</td>
                                <td class="border px-2 py-4">{{$mem->gender}}</td>
                                <td class="border px-2 py-4">{{$mem->dob}}</td>
                                <td class="border px-2 py-4">{{$mem->phone_no}}</td>
                                <td class="border px-2 py-4">{{$mem->joining_date}}</td>
                                <td class="border px-2 py-4 ">{{$mem->expirydate}}</td>
                              </tr>
                          @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('admin.managemembers.index')}}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition-colors">Back</a>
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