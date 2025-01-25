@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-700 p-4 rounded-md mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-white">Manage Payments</h1>
                    <hr>
                    <a href="{{route('admin.payments.create')}}" class="bg-teal-500 text-white px-4 py-2 rounded-xl hover:bg-teal-600">Add New</a>
                </div>
                <hr class="border border-green-200">
                <div class="container mt-6">
                    <table id="mytable" class="display  border-collapse border border-slate-600">
                        <thead class="bg-gray-200 dark:bg-gray-700 dark:text-gray-100">
                            <tr>
                                <th class="border border-slate-500 px-2 py-3">SN</th>
                                <th class="border border-slate-500 px-2 py-3">Member Name</th>
                                <th class="border border-slate-500 px-4 py-3">Payment Date</th>
                                <th class="border border-slate-500 px-2 py-3">Transaction id</th>
                                <th class="border border-slate-500 px-2 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td class="border border-slate-700 px-2 py-3">{{$loop->index+1}}</td>
                                    <td class="border border-slate-700 px-2 py-3">{{$payment->user->name}}</td>
                                    <td class="border border-slate-700 px-2 py-3">{{$payment->payment_date}}</td>
                                    <td class="border border-slate-700 px-2 py-3">{{$payment->transaction_id}}</td>
                                    <td class="border border-slate-700 px-2 py-3 flex space-x-1">
                                        <a href="{{route('admin.payments.edit',$payment->id)}}" class="bg-sky-500 text-white px-4 py-2 rounded-xl hover:bg-sky-600">Edit</a>
                                        <a href="{{route('admin.payments.show',$payment->id)}}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Details</a>
                                        <a href="{{route('admin.payments.delete',$payment->id)}}"  onclick="return confirm('Are you sure?')" class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-600">Delete</a>
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