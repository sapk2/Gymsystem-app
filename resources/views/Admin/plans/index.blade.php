@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-700 p-4 rounded-md mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-white">Manage Subscriptions</h1>
                    <hr>
                    <a href="{{route('admin.plans.create')}}" class="bg-teal-500 text-white px-4 py-2 rounded-xl hover:bg-teal-600">Add New</a>
                </div>
                <hr class="border border-green-200">
                <div class=" container mt-6">
                    <table id="mytable" >
                        <thead >
                            <tr>
                                <th >SN</th>
                                <th >Plan ID</th>
                                <th> plan Name</th>
                                <th >Description</th>
                                <th >Month</th>
                                <th >Amount</th>
                                <th >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plan as $plan)
                                <tr>
                                    <td >{{$loop->index+1}}</td>
                                    <td >{{$plan->plan_id}}</td>
                                    <td >{{$plan->name}}</td>
                                    <td >{{strip_tags($plan->description)}}</td>
                                    <td >{{$plan->validity}}</td> 
                                    <td >RS.{{$plan->amount}}</td>
                                    <td class=" flex space-x-1">
                                        <a href="{{route('admin.plans.edit',$plan->id)}}" class="bg-sky-500 text-white px-4 py-2 rounded-xl hover:bg-sky-600">Edit</a>
                                        <a href="{{route('admin.plans.delete',$plan->id)}}"  onclick="return confirm('Are you sure to delete ?')" class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-600">Delete</a>
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