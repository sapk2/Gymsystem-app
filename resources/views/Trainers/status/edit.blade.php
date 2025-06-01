@extends('layouts.trainer-app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="container">
                    <h1 class="text-bold text-2xl trxt-white">Edit</h1>
                    <hr class="border border-gray-300 my-4"> 
                    <div class="mt-6">
                        <form action="{{route('Trainers.status.update',$status->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div class="mb-4">
                                    <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Users</label>
                                        <select name="user_id" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="">Member</option>
                                            @foreach($user as $user)
                                            <option value="{{$user->id}}"  {{$status->user_id==$user->id ? 'selected':''}}>{{$user->name}}-{{$user->email}}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                        <span class="text-red-500">{{$message}}</span>
                                        @enderror
                                
                                </div>
                                <div class="mb-4">
                                    <label for="blood_group" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Blood Group
                                    </label>
                                    <input type="text" name="blood_group" value="{{$status->blood_group}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('blood_group')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="height" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Height</label>
                                    <input type="number" name="height" value="{{$status->height}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('height')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">weight</label>
                                    <input type="number"name="weight" value="{{$status->weight}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('weight')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="blood_Pressure" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    blood Pressure  
                                    </label>
                                    <input type="text" name="blood_pressure" value="{{$status->blood_pressure}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('blood_pressure')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="heart_rate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Heart Rate</label>
                                    <input type="number" name="heart_rate" value="{{$status->heart_rate}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('heart_rate')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="body_fat_percentage" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body Fat</label>
                                    <input type="number" name="body_fat_percentage" value="{{$status->body_fat_percentage}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('body_fat_percentage')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="note"class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                                    <input type="text" name="notes" value="{{$status->notes}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('notes')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex justify-center mt-6">
                                <input type="submit" value="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <a href="{{route('Trainers.status.index')}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 ml-6 rounded">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection