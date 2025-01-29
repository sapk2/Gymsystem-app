@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-between mb-4">
                    <div class="text-2xl font-bold">Health Status</div>
                   
                    <a href="{{route('admin.healthstatus.create')}}" class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600">Add Health Status</a>
                </div>
               
               <div class="relative">
                <table id="mytable" >
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Notes</th>
                            <th>Records</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($health as $item)
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$item->user->name}}</td>
                            <td>{{$item->notes}}</td>
                            <td><a href="{{route('admin.healthstatus.show',$item->id)}}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Details</a></td>
                            <td class="mt-2 flex justify-center space-x-1">
                                <a href="{{route('admin.healthstatus.edit',$item->id)}}" class="bg-sky-500 text-white px-4 py-2 rounded-xl hover:bg-sky-600">Edit</a>
                                <form action="{{route('admin.healthstatus.delete',$item->id)}}" method="get">
                                    @csrf
                                    @method('get')
                                    <button type="submit" onclick="return confirm('Are you sure to Delete!!?')" class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
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
    $(document).ready( function () {
        $('#mytable').DataTable();
    } );
</script>
@endsection