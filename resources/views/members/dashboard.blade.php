@extends('layouts.member-app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Dashboard</h1>
            <p>Welcome to your dashboard {{Auth::user()->name}}. Here you can manage your activities and view your progress.</p>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="container mt-6">
                <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">

                
                <!-- Pricing Plans -->
                <div x-show="open" x-transition class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                @forelse ($plan as $planItem)
                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                <h3 class="mb-4 text-2xl font-semibold">{{ $planItem->name }}</h3>
                <span>{{ $planItem->validity }}</span>
                <div class="flex justify-center items-baseline my-8">
                <span class="mr-2 text-4xl font-extrabold">RS.{{ $planItem->amount }}</span>
                <span class="text-gray-500 dark:text-gray-400">/month</span>
                </div>
                <div class="mt-2">
                <p class="text-md text-white">{{ $planItem->description }}</p>
                </div>
                <a href="{{route('members.payments.create')}}" class="text-white bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white dark:focus:ring-primary-900">Get started</a>
                </div>
                @empty
                <p class="text-center text-gray-500 dark:text-gray-400 col-span-3">No plans available.</p>
                @endforelse
                </div>
                </div>
                </section>
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
