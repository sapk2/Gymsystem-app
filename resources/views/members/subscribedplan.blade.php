@extends('layouts.member-app')
@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h2 class="text-2xl font-bold text-white mb-6">Subscriptions</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($member as $subscription)
            <div class="bg-slate-500 rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-lg font-semibold text-white">
                        {{ $subscription->plan->name }}
                    </h3>
                    <span class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded">
                        #{{ $loop->index + 1 }}
                    </span>
                </div>
                
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-white">Joined Date</p>
                        <p class="text-gray-100 font-medium">
                            {{ \Carbon\Carbon::parse($subscription->joining_date)->format('M d, Y') }}
                        </p>
                    </div>
                    
                    <div>
                        <p class="text-sm text-gray-100">Expiry Date</p>
                        <p class="text-red-300 font-medium">
                            {{ \Carbon\Carbon::parse($subscription->expirydate)->format('M d, Y') }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection