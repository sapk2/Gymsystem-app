@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-bold mb-4">Health Status Details</h2>
                <hr class="border-gray-300 my-4">
                <table class="w-full border-collapse border border-gray-300 mt-7">
                    <tbody>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <td class="border px-4 py-2 font-semibold">Member</td>
                            <td class="border px-4 py-2">{{$health->user->name}}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Blood group</td>
                            <td class="border px-4 py-2">{{$health->blood_group}}</td>
                        </tr>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <td class="border px-4 py-2 font-semibold">Weight (kg)</td>
                            <td class="border px-4 py-2">{{$health->weight}}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Height (cm)</td>
                            <td class="border px-4 py-2">{{$health->height}}</td>
                        </tr>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <td class="border px-4 py-2 font-semibold">Blood Pressure</td>
                            <td class="border px-4 py-2">{{$health->blood_pressure}}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Heart Rate (BPM)</td>
                            <td class="border px-4 py-2">{{$health->heart_rate}}</td>
                        </tr>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <td class="border px-4 py-2 font-semibold">Body Fat (%)</td>
                            <td class="border px-4 py-2">{{$health->body_fat_percentage}}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">BMI</td>
                            <td class="border px-4 py-2 font-bold">
                                {{$health->bmi}} 
                                @if($health->bmi < 18.5)
                                <span class="text-blue-500">(Underweight)</span>
                            @elseif($health->bmi >= 18.5 && $health->bmi < 24.9)
                                <span class="text-green-500">(Healthy)</span>
                            @elseif($health->bmi >= 25 && $health->bmi < 29.9)
                                <span class="text-yellow-500">(Overweight)</span>
                            @elseif($health->bmi >= 30 && $health->bmi < 34.9)
                                <span class="text-orange-500">(Obesity Class I)</span>
                            @elseif($health->bmi >= 35 && $health->bmi < 39.9)
                                <span class="text-red-400">(Obesity Class II)</span>
                            @else
                                <span class="text-red-600">(Obesity Class III)</span>
                            @endif
                            
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Back Button -->
                <div class="mt-6">
                    <a href="{{ route('admin.healthstatus.index') }}" 
                       class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition-colors">
                        ← Back
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
