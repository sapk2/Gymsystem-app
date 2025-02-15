@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-2xl font-extrabold text-white">FaQs</div>
                <hr>
                <div class="card-body text-white mt-9">
                    <table id="mytable" class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Messages</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td class="flex space-x-1">
                                        <a href="{{route('admin.contacts.reply',$contact->id)}}" class="bg-sky-500 text-white px-4 py-2 rounded-xl hover:bg-sky-600">Reply</a>
                                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="get" style="display:inline;">
                                            @csrf
                                            @method('get')
                                            <button type="submit" onclick="return confirm('Are you sure to Delete!!?')" class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-600">Delete</button>
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
    document.addEventListener("DOMContentLoaded", function() {
        let table = new DataTable('#mytable');
    });
</script>
@endsection
