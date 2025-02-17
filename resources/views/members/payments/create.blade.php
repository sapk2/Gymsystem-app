@extends('layouts.member-app')
@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="bg-gradient-to-r from-blue-600 to-blue-400 p-4 rounded-t-lg text-white flex justify-between items-center">
                    <h1 class="text-xl font-semibold">Add Payment</h1>
                </div>
                <div class="p-6">
                    <form action="{{route('members.payments.initiate')}}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Member Name</label>
                                <input type="text" value="{{ $user->name }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed" readonly>
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Plan</label>
                                <select name="plan" id="plan" class="w-full p-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @foreach ($plan as $plan)
                                        <option value="{{$plan->id}}" 
                                            data-price="{{$plan->amount}}" >{{$plan->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="payment_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Payment Date</label>
                                <input type="date" name="payment_date" id="payment_date" class="w-full p-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @error('payment_date')
                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Amount</label>
                                <input type="number" name="amount" id="amount" class="w-full p-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white" readonly>
                                @error('amount')
                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <input type="hidden" name="payment_method" value="khalti">
                            </div>
                            <div>
                                <label for="transaction_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Transaction ID</label>
                                <input type="text" name="transaction_id" id="transaction_id" class="w-full p-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @error('transaction_id')
                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-center space-x-4">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-6 rounded-lg shadow-md">proceed to payment</button>
                            <a href="{{route('members.dashboard')}}" class="bg-gray-500 hover:bg-gray-400 text-white font-bold py-2 px-6 rounded-lg shadow-md">Back</a>
                        </div>
                    </form>
                    @error('error')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
            $('#plan').change(function() {
                var price = $(this).find(':selected').data('price'); // Get selected plan price
                $('#amount').val(price ? price : ''); // Update amount field
            });
        });
</script>
@endsection
