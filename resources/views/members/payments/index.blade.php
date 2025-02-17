@extends('layouts.member-app')
@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Payment History</h1>
    
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-x-auto">
        <table id="mytable" class="w-full">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">SN</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Member</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Date</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Amount</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Method</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Transaction ID</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($userPayments as $payment)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300">{{$loop->index+1}}</td>
                    <td class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-gray-200">{{$payment->user->name}}</td>
                    <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300">{{$payment->payment_date}}</td>
                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-200 font-medium">RS.{{number_format($payment->amount, 2)}}</td>
                    <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300 capitalize">{{$payment->payment_method}}</td>
                    <td class="px-4 py-3 text-sm font-mono text-blue-600 dark:text-blue-400 hover:underline">{{$payment->transaction_id}}</td>
                    <td class="px-4 py-3">
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-medium 
                            @if($payment->status === 'complete')
                                bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100
                            @else
                                bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100
                            @endif">
                            {{ucfirst($payment->status)}}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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