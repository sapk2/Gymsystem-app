@extends('layouts.member-app')
@section('content')
    <div class="container mt-6">
        <div class="mt-6 flex ">
            <h1 class="text-2xl">My Payments Details</h1>
            <hr>
            <a href="{{route('members.payments.create')}}">click</a>
        </div>
                    <table id="mytable">
                        <thead>
                            <tr>
                                <th >SN</th>
                                <th >Member Name</th>
                                <th >Payment Date</th>
                                <th >amount</th>
                                <th >Payment Method</th>
                                <th >Transaction id</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userpayments as $payment)
                                <tr>
                                    <td >{{$loop->index+1}}</td>
                                    <td >{{$payment->user->name}}</td>
                                    <td >{{$payment->payment_date}}</td>
                                    <td>{{$payment->amount}}</td>
                                    <td>{{$payment->payment_method}}</td>
                                    <td >{{$payment->transaction_id}}</td>
                                    <td>{{$payment->status}}</td>
                                    
                                    
                                </tr>                                
                            @endforeach
                        </tbody>
                    </table>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
          let table = new DataTable('#mytable');
      });
    </script>
@endsection