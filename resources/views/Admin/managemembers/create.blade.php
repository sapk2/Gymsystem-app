@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
               <h1 class="text-2xl text-white px-2 py-2">Create </h1>
               <hr>

               <div class="container mt-4">
                <form action="{{route('admin.managemembers.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">user</label>
                            <select name="user_id" id="" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="">Users</option>
                                @foreach ($user as $user)
                                <option value="{{$user->id}}">{{$user->name}} - {{$user->email}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="plan_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plan</label>
                            <select name="plan_id" id="plan_id" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                                <option value="">Plans</option>
                                    @foreach($plan as $plan)
                                    <option value="{{$plan->id}}">{{$plan->name}}</option>
                                    @endforeach
                            </select>
                            @error('plan')
                                <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>   
                        <div>
                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >City</label>
                            <input type="text" id="city" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"   name="city_name"required/>
                        </div> 
                        <div>
                            <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" > province</label>
                            <input type="text" name="state" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required />
                        </div>
                        <div>
                            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender:</label>
                            <select name="gender" id="" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="">please select one</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div>
                            <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birth Date:</label>
                            <input type="date" name="dob" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required />
                        </div>
                        <div>
                            <label for="phone_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Phone no:</label>
                            <input type="number" name="phone_no" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required />
                        </div>
                        <div>
                            <label for="joiningdate">Join Date:</label>
                            <input type="date" name="joining_date" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required />
                        </div>
                    </div>
                    <div>
                        <label for="expirydate">Expiry Date:</label>
                        <input type="date" name="expirydate" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required />
                    </div>
                    <div class="flex justify-center mt-6">
                        <input type="submit" value="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        <a href="{{route('admin.managemembers.index')}}" class="bg-gray-500 hover:bg-gray-400 text-white ml-4 font-bold py-2 px-4 border-b-4 border-gray-700 hover:border-gray-500 rounded" >Back</a>
                    </div>
                </form>
             </div>
            
            </div>
        </div>
    </div>
</div>
@endsection