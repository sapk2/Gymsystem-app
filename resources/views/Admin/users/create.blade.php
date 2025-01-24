@extends('layouts.app')
@section('content')
    
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
               <h1 class="text-white text-2xl">Create Users</h1>
               <hr class="border border-gray-200">
               <div class=" mt-2">
                    <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                     <div class="mt-6">
                        <label for="name" class=" mt-2 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('name')
                            <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</span>
                            
                        @enderror
                     </div>
                     <div class="mt-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                        <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required />
                        @error('email')
                            <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</span>
                        @enderror
                    </div> 
                    <div class="mt-6">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select name="roles" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="admin">Admin</option>
                            <option value="trainer">trainer</option>
                            <option value="member">member</option>
                        </select>
                        @error('roles')
                            <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex justify-center mt-6">
                        <input type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        <a href="{{route('admin.users.index')}}" class="bg-gray-500 hover:bg-gray-400 text-white ml-4 font-bold py-2 px-4 border-b-4 border-gray-700 hover:border-gray-500 rounded">close</a>
                    </div>

                    </form>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection