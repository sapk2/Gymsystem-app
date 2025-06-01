@extends('layouts.trainer-app')
@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Profile') }}
    </h2>
    <a href="{{ route('trainers.dashboard') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
        Dashboard
    </a>
</div>
<hr>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('trainers.profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('trainers.profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('trainers.profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
@endsection
