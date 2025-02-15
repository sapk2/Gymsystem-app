@extends('layouts.app')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<span>
    <p class="text-2xl text-white">welcome {{Auth::user()->name}}</p>
</span>
    <hr>
    <div class="contianer mt-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-4" >
        <div class="bg-red-500 shadow-md rounded-lg p-6 border border-red-500 flex flex-col">
        <h2 class="text-xl text-white">Total Users</h2>
        <div class="text-3xl font-bold text-white">{{$usercount}}</div>
        </div>
        <div class="bg-green-500 shadow-md rounded-lg p-6 border border-green-500 flex flex-col">
        <h2 class="text-xl text-white">Total Attendance</h2>
        <div class="text-3xl font-bold text-white">{{$attendances}}</div>
        </div>
        <div class="bg-sky-500 shadow-md rounded-lg p-6 border border-blue-500 flex flex-col">
        <h2 class="text-xl text-white">Total Membership</h2>
        <div class="text-3xl font-bold text-white">{{$member}}</div>
        </div>
        <div class="bg-slate-500 shadow-md rounded-lg p-6 border border-slate-500 flex flex-col">
        <h2 class="text-xl text-white">Total FAQ</h2>
        <div class="text-3xl font-bold text-white">{{$contacts}}</div>
        </div>
        </div>
        </div>
        
        <!--Overview stat-->
<div  class="flex flex-col shadow-md rounded-lg p-2  mt-4">
    <h2 class="text-xl font-bold text-center text-white mb-4">Monthly User Logins</h2>
    <div class="w-full max-w-2xl mx-auto" style="height: 300px;">
    <canvas id="userLoginChart"></canvas>
    </div>
</div>
    
    
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('userLoginChart').getContext('2d');
    const userLogins = @json($loginCounts);
    const labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    
    new Chart(ctx, {
    type: 'bar', // Change to 'line' for a line chart
    data: {
    labels: labels,
    datasets: [{
    label: 'User Logins',
    data: userLogins,
    backgroundColor: 'rgba(54, 162, 235, 0.5)',
    borderColor: 'rgba(54, 162, 235, 1)',
    borderWidth: 1
    }]
    },
    options: {
    responsive: true,
    scales: {
    y: { beginAtZero: true }
    }
    }
    });
    });
    </script>
    

   

@endsection