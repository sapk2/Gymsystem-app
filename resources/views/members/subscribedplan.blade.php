@extends('layouts.member-app')
@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h2 class="text-xl font-bold mb-4">Subscriptions</h2>
        <hr>
        <div class="container mt-6">
            <table id="example">
                <thead>
                    <tr>
                        <th >SN</th>
                        <th >Plan Name</th>
                        <th >Joined Date</th>
                        <th >Expiry Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($member as $member)
                    <tr>
                        <td >{{$loop-> index+1}}</td>
                        <td >{{$member->plan->name}}</td>
                        <td >{{$member->joining_date}}</td>
                        <td >{{$member->expirydate}}</td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let table = new DataTable('#example');
        });
    </script>
@endsection