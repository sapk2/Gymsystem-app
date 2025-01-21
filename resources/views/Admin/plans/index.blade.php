@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-700 p-4 rounded-md mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-white">Manage Subscriptions</h1>
                    <hr>
                    <a href="{{route('admin.plans.create')}}" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-800 transition">Add New</a>
                </div>
                <hr class="border border-green-200">
                <div class=" container mt-6">
                    <table id="mytable" class="display  border-collapse border border-slate-600">
                        <thead>
                            <tr>
                                <th class="border border-slate-500 px-2 py-3">SN</th>
                                <th class="border border-slate-500 px-2 py-3">Plan ID</th>
                                <th class="border border-slate-500 px-4 py-3"> plan Name</th>
                                <th class="border border-slate-500 px-2 py-3">Description</th>
                                <th class="border border-slate-500 px-2 py-3">Month</th>
                                <th class="border border-slate-500 px-2 py-3">Amount</th>
                                <th class="border border-slate-500 px-2 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plan as $plan)
                                <tr>
                                    <td class="border border-slate-700 px-2 py-4">{{$loop->index+1}}</td>
                                    <td class="border border-slate-700 px-2 py-4">{{$plan->plan_id}}</td>
                                    <td class="border border-slate-700 px-2 py-4">{{$plan->name}}</td>
                                    <td class="border border-slate-700 px-2 py-4">{{$plan->description}}</td>
                                    <td class="border border-slate-700 px-2 py-4">{{$plan->validity}}</td> 
                                    <td class="border border-slate-700 px-2 py-4">RS.{{$plan->amount}}</td>
                                    <td class="border border-slate-700 px-2 py-4">
                                        <a href="{{route('admin.plans.edit',$plan->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Edit</a>
                                        <a href="{{route('admin.plans.delete',$plan->id)}}"  onclick="return confirm('Are you sure?')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Delete</a>
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