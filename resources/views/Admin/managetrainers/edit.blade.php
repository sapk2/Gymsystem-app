@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="container mt-2">
                    <h1 class="text-2xl text-white">Create</h1>
                    <hr class="border">

                    <form action="{{route('admin.managetrainers.update',$trainer->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-6">
                            <label for="user_id" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">user</label>
                            <select name="user_id" id="" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="">Users</option>
                                @foreach ($user as $user)
                                <option value="{{$user->id}}"{{$trainer->user_id==$user->id ? 'selected' : ''}}>{{$user->name}}-{{$user->email}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <label for="specialization" class="block mb-2 text-xl font-medium text-white-700 dark:text-white-500" >Specialization</label>
                            <input type="text" name="specialization" value="{{$trainer->specialization}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            @error('specialization')
                                <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <label for="phone_no" class="block mb-2 text-sm font-medium text-white-700 dark:text-white-500" >Phone</label>
                            <input type="tel" name="phone_no" value="{{$trainer->phone_no}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50  focus:ring-blue-500 focus:border-blue-500 text-base dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            @error('phone_no')
                            <span class="text-red-500">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="flex justify-center mt-6">
                            <input type="submit" class="text-white-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-white-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" value="submit">
                            <a href="{{route('admin.managetrainers.index')}}" class="text-white-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 text-white-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection