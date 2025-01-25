@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-700 p-4 rounded-md mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-white">Add Payment</h1>
                    <hr>
                   
                </div>
                <hr class="border border-green-200">
                <div class="container mt-6">
                    <form action="{{route('admin.payments.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2" >
                            <div class="mb-4">
                                <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Member Name</label>
                                <select name="user_id" id="user_id"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="disable">Member</option>
                                    @foreach ($user as $user)
                                        <option value="{{$user->id}}">{{$user->name}}-{{$user->email}}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="payment_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment Date</label>   
                                <input type="date" name="payment_date" id="payment_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('payment_date')
                                    <span class="text-red-500 text-base">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                                <input type="text" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('amount')
                                    <span class="text-red-500 text-base">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="payment_method" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment Method</label>
                                <select name="payment_method" id="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="Cash">Cash</option>
                                    <option value="Bank">Bank</option>
                                    <option value="Cheque">Cheque</option>
                                </select>
                                @error('payment_method')
                                    <span class="text-red-500 text-base">{{$message}}</span>
                                @enderror
                            </div>
                            
                                <div class="mb-4">
                                <label for="transaction_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transaction ID</label>
                                <input type="text" name="transaction_id" id="transaction_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('transaction_id')
                                    <span class="text-red-500 text-base">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                status
                                </label>
                                <select name="status" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="complete">complete</option>
                                    <option value="pending">pending</option>
                                </select>
                                @error('status')
                                    <span class="text-red-500 text-base">{{$message}}</span>
                                @enderror

                            </div>
                         </div>
                         <div class="flex justify-center">
                            <input type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                            
                            <a href="{{route('admin.payments.index')}}" class="bg-gray-500 hover:bg-gray-400 text-white ml-4 font-bold py-2 px-4 border-b-4 border-gray-700 hover:border-gray-500 rounded">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection