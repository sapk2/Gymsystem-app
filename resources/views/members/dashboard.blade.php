@extends('layouts.member-app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Dashboard</h1>
            <p>Welcome to your dashboard. Here you can manage your activities and view your progress.</p>
            
            <div class="card mt-4">
                <div class="card-header">
                    <h2>Recent Activities</h2>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Activity 1</li>
                        <li>Activity 2</li>
                        <li>Activity 3</li>
                    </ul>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h2>Progress Overview</h2>
                </div>
                <div class="card-body">
                    <p>Your progress overview will be displayed here.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
