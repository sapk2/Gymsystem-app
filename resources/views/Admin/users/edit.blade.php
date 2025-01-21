@extends('layouts.app')
@section('content')
    
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
               <h1 class="text-white text-2xl">Edit Users</h1>
               <hr class="border border-green-500">
               <div class=" mt-2">
                    <form action="{{route('admin.users.update',$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                     <div class="mt-6">
                        <label for="name" class=" mt-2 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name"  value="{{ old('title', $user->name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('name')
                            <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</span>
                            
                        @enderror
                     </div>
                     <div class="mt-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                        <input type="email" name="email"  value="{{ old('title', $user->email) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required />
                        @error('email')
                            <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</span>
                        @enderror
                    </div> 
                    <div class="mt-6">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select name="roles" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="admin" {{ old('roles', $user->roles) == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="trainer" {{ old('roles', $user->roles) == 'trainer' ? 'selected' : '' }}>Trainer</option>
                            <option value="member" {{ old('roles', $user->roles) == 'member' ? 'selected' : '' }}>Member</option>
                        </select>
                        @error('roles')
                            <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex justify-center mt-6">
                        <input type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <a href="{{route('admin.users.index')}}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">close</a>
                    </div>

                    </form>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection