@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
               <div class="container">
                <h1 class="text-2xl text-white">Edit</h1>
                <hr class="border bg-green-400">
            
               </div>
               <div class="container mt-6">
                <form action="{{route('admin.plans.update',$plan->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label for="Plan name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plan Name</label>
                        <input type="text" value="{{$plan->name}}" name="name" id="Plan name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('name')
                         <span class="text-red-500">{{$message}}</span>   
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <input type="text" value="{{$plan->description}}" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('description')
                            <span class="text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="Plan Validity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">validaity</label>
                        <input type="number" value="{{$plan->validity}}" name="validity" id="Plan Validity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('validity')
                            <span class="text-red-500">{{$message}}</span>   
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="Plan rate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plan Rate</label>
                        <input type="number" name="rate" value="{{$plan->rate}}" id="Plan rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('rate')
                            <span class="text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex justify-center" >  
                        <input type="submit" value="update" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"> 
                        <a href="{{route('admin.plans.index')}}"  class="bg-gray-500 hover:bg-gray-400 text-white ml-4 font-bold py-2 px-4 border-b-4 border-gray-700 hover:border-gray-500 rounded">cancel</a>
                    </div>
                </form>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection