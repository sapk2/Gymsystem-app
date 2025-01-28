
@extends('layouts.trainer-app')
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
                    <form action="{{route('trainers.routines.update',$routine->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="exercise_name"  class="block mb-2 text-base font-semibold text-gray-900 dark:text-white">Exercise</label>
                                    <input type="text" name="exercise_name" value="{{old('exercise_name',$routine->exercise_name)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('exercise_name')
                                        <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="day_of_week"  class="block mb-2 text-base font-semibold text-gray-900 dark:text-white">Days</label>
                                    <select name="day_of_week" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                        @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)                           <option value="{{ $day }}">{{ $day }}</option>
                                            <option value="{{$day}}"{{old('day_of_week', $routine->day_of_week)}} >{{$day}}</option>
                                        @endforeach
                                    </select>
                                </div>
                               <div>
                                <label for="start_time"  class="block mb-2 text-base font-semibold text-gray-900 dark:text-white">start time</label>
                                <input type="time" name="start_time" value="{{old('start_time',$routine->start_time)}}" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                               </div>
                               
                            </div>
                            <div>
                                <label for="end_time"  class="block mb-2 text-base font-semibold text-gray-900 dark:text-white">End Time</label>
                                <input type="time" name="end_time" value="{{old('end_time',$routine->end_time)}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="">
                               </div>
                            <div class=" mt-6 flex justify-center">
                                <input type="submit" value="update" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                <a href="{{route('trainers.routines.index')}}" class="bg-gray-500 hover:bg-gray-400 text-white ml-4 font-bold py-2 px-4 border-b-4 border-gray-700 hover:border-gray-500 rounded">Back</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection