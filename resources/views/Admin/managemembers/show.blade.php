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
                    <table id="mytable" class="display table-auto w-full border-collapse border border-gray-900">
                        <thead>
                            <tr class=" dark:bg-gray-700">
                                <th>SN</th>
                                <th>Plan</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>phone</th>
                                <th>Joining</th>
                                <th>expiry</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($mem as $mem)
                              <tr>
                                <td>{{$loop-> index+1}}</td>
                                <td>{{$mem->plan->name }}</td>
                                <td>{{$mem->gender}}</td>
                                <td>{{$mem->dob}}</td>
                                <td>{{$mem->phone_no}}</td>
                                <td>{{$mem->joining_date}}</td>
                                <td>{{$mem->expirydate}}</td>
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