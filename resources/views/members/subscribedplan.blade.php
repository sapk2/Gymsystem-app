@extends('layouts.member-app')
@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h2 class="text-2xl font-bold text-white mb-6">Subscriptions</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
            @if($member->isEmpty())
                <div class="text-white p-6 text-center bg-slate-600 rounded-lg col-span-full">
                    No subscriptions available.
                </div>
            @else
                @foreach ($member as $subscription)
                <div class="bg-slate-600 shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="bg-slate-500 p-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white">{{ $subscription->plan->name }}</h3>
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">
                            #{{ $loop->index + 1 }}
                        </span>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <p class="text-sm text-gray-100">Joined Date</p>
                            <p class="text-gray-100 font-medium">
                                {{ \Carbon\Carbon::parse($subscription->joining_date)->format('M d, Y') }}
                            </p>
                        </div>
        
                        <div>
                            <p class="text-sm text-gray-100">Expiry Date</p>
                            <p class="text-red-500 font-medium">
                                {{ \Carbon\Carbon::parse($subscription->expirydate)->format('M d, Y') }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        
        </div>
    </div>
@endsection