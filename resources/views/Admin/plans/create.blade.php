@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex mb-4">
                    <div class="w-full rounded-md px-2 bg-green-400 h-12">
                        <h1 class="text-2xl text-white mt-2">create</h1>
                        <hr>
                    </div>
                </div>
                <div class="container mt-6">
                    <form action="{{route('admin.plans.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-6">
                            <label for="Plan name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plan Name</label>
                            <input type="text" name="name" id="Plan name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('name')
                             <span class="text-red-500">{{$message}}</span>   
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <input type="text" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('description')
                                <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="Plan Validity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">validaity</label>
                            <input type="number" name="validity" id="Plan Validity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('validity')
                                <span class="text-red-500">{{$message}}</span>   
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="Plan rate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plan Rate</label>
                            <input type="number" name="rate" id="Plan rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('rate')
                                <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="flex justify-center">
                            <input type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            
                            <a href="{{route('admin.plans.index')}}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Back</a>
                        </div>
                       
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection