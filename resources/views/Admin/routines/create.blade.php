@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-700 p-4 rounded-md mb-4 ">
                    <h1 class="text-2xl font-semibold text-white">create</h1>
                    <hr class="border">
                </div>
                <div class="container mt-4">
                    <form action="{{route('admin.routines.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="trainer_name" class="block mb-2 text-base font-semibold text-gray-900 dark:text-white">Trainer</label>
                                    <select name="user_id" id="" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        <option value="">Users</option>
                                        @foreach ($user as $user)
                                        <option value="{{$user->id}}">{{$user->name}}-{{$user->email}}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="exercise_name"  class="block mb-2 text-base font-semibold text-gray-900 dark:text-white">Exercise</label>
                                    <input type="text" name="exercise_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('exercise_name')
                                      <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="day_of_week"  class="block mb-2 text-base font-semibold text-gray-900 dark:text-white">Days</label>
                                    <select name="day_of_week" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                        @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)                          
                                            <option value="{{$day}}">{{$day}}</option>
                                        @endforeach
                                    </select>
                                    @error('day_of_week')
                                        <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                               <div>
                                    <label for="start_time"  class="block mb-2 text-base font-semibold text-gray-900 dark:text-white">start time</label>
                                    <input type="time" name="start_time" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('start_time')
                                        <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                               
                            </div>
                                <div>
                                    <label for="end_time"  class="block mb-2 text-base font-semibold text-gray-900 dark:text-white">End Time</label>
                                    <input type="time" name="end_time"  class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="">
                                    @error('end_time')
                                        <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                            <div class=" mt-4 flex justify-center">
                                <input type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                <a href="{{route('admin.routines.index')}}"  class="bg-gray-500 hover:bg-gray-400 text-white ml-4 font-bold py-2 px-4 border-b-4 border-gray-700 hover:border-gray-500 rounded">Back</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection