@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg p-6">
            <h2 class="text-2xl  text-white font-bold mb-4">Payment Details</h2>
            <hr class="border-gray-300 my-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                    <p class="text-lg text-white font-semibold">Member</p>
                    <p class="text-gray-900 dark:text-gray-100">{{$payments->user->name}}</p>
                </div>
                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                    <p class="text-lg  text-white font-semibold">Amount</p>
                    <p class="text-gray-900 dark:text-gray-100">RS.{{$payments->amount}}</p>
                </div>
                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                    <p class="text-lg font-semibold text-white">Payment Method</p>
                    <p class="text-gray-900 dark:text-gray-100">{{$payments->payment_method}}</p>
                </div>
                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                    <p class="text-lg font-semibold text-white">Status</p>
                    <p class="text-gray-900 dark:text-gray-100">{{$payments->status}}</p>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-6">
                <a href="{{ route('admin.payments.index') }}" 
                   class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition-colors">
                    ← Back
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
