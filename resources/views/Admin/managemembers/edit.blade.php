@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
               <h1 class="text-2xl text-white px-2 py-2">Edit Member</h1>
               <hr>

               <div class="container mt-4">
                <form action="{{ route('admin.managemembers.update', $mem->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="mb-4">
                            <label class="block text-gray-100 text-sm font-bold mb-2">Select Name</label>
                            <select name="payment_id" id="payment_id" class="bg-slate-600 shadow appearance-none border rounded w-full py-2 px-3 text-gray-100 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="">{{ $mem->user->name }} | Plan: {{ $mem->plan->name }}</option>
                                @foreach($payment as $pay)
                                    <option value="{{ $pay->id }}" 
                                            data-user-id="{{ $pay->user_id }}" 
                                            data-plan-id="{{ $pay->plan_id }}" 
                                            {{ $pay->id == $mem->payment_id ? 'selected' : '' }}>
                                         {{ $pay->user->name }} | Plan: {{ $pay->plan->name }}
                                    </option>
                                @endforeach
                            </select>
                            <p id="selectedPlan" class="mt-2 text-gray-300">{{ $mem->user->name }} | Plan: {{ $mem->plan->name }}</p>
                            @error('payment_id')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="hidden" name="user_id" id="user_id" value="{{ $mem->user_id }}">
                        <input type="hidden" name="plan_id" id="plan_id" value="{{ $mem->plan_id }}"> 
                        <div>
                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                            <input type="text" id="city" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" name="city_name" value="{{ $mem->city_name }}" required/>
                        </div> 
                        <div>
                            <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Province</label>
                            <input type="text" name="state" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" value="{{ $mem->state }}" required />
                        </div>
                        <div>
                            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender:</label>
                            <select name="gender" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="">Please select one</option>
                                <option value="male" {{ $mem->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $mem->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div>
                            <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birth Date:</label>
                            <input type="date" name="dob" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" value="{{ $mem->dob }}" required />
                        </div>
                        <div>
                            <label for="phone_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone no:</label>
                            <input type="number" name="phone_no" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" value="{{ $mem->phone_no }}" required />
                        </div>
                        <div>
                            <label for="joining_date">Join Date:</label>
                            <input type="date" name="joining_date" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" value="{{ $mem->joining_date }}" required />
                        </div>
                    </div>
                    <div>
                        <label for="expiry_date">Expiry Date:</label>
                        <input type="date" name="expirydate" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" value="{{ $mem->expirydate }}" required />
                    </div>
                    <div class="flex justify-center mt-6">
                        <input type="submit" value="Update" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        <a href="{{route('admin.managemembers.index')}}" class="bg-gray-500 hover:bg-gray-400 text-white ml-4 font-bold py-2 px-4 border-b-4 border-gray-700 hover:border-gray-500 rounded">Back</a>
                    </div>
                </form>
             </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('payment_id').addEventListener('change', function () {
        let selectedOption = this.options[this.selectedIndex];
        document.getElementById('user_id').value = selectedOption.getAttribute('data-user-id') || '';
        document.getElementById('plan_id').value = selectedOption.getAttribute('data-plan-id') || '';
    });
</script>
@endsection
