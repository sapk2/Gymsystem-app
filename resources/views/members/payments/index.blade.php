@extends('layouts.member-app')
@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Payment History</h1>
    </div>
    <hr class="border-t border-gray-300 dark:border-gray-100 w-full">
    <div class=" mt-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($userPayments as $payment)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-500 dark:text-gray-300">SN: {{$loop->index+1}}</span>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium {{ $payment->status == 'completed' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                        {{ ucfirst($payment->status) }}
                    </span>
                </div>
                <p class="text-sm text-gray-700 dark:text-gray-300"><strong>Name: {{$payment->plan->name}}</strong></p>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-200">RS.{{ number_format($payment->amount, 2) }}</p>
                <p class="text-sm text-gray-700 dark:text-gray-300">Date: {{$payment->payment_date}}</p>
                <p class="text-sm font-mono text-blue-600 dark:text-blue-400 hover:underline">Transaction ID: {{$payment->transaction_id}}</p>
            </div>
        @endforeach
    </div>
    
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let table = new DataTable('#mytable', {
            responsive: true,
            autoWidth: false,
            language: {
                search: "Search payments:",
                searchPlaceholder: "Type to filter..."
            },
            dom: '<"flex justify-between items-center mb-4"lf>rt<"flex justify-between items-center mt-4"ip>'
        });
    });
</script>
@endsection