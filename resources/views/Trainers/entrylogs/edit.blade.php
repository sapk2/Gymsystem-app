@extends('layouts.trainer-app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-2xl font-bold">Edit Entry Log</h1>
                <hr class="border mb-4">

                <form action="{{ route('Trainers.entrylogs.update', $entrylog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="user_id" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Users</label>
                            <select name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                <option value="">Select User</option>
                                @foreach ($user as $u)
                                    <option value="{{ $u->id }}" {{ $entrylog->user_id == $u->id ? 'selected' : '' }}>
                                        {{ $u->name }} - {{ $u->email }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="date" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Date</label>
                            <input type="date" name="date" value="{{ $entrylog->date }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @error('date')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="check_in" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Check-In</label>
                            <input type="time" name="check_in" value="{{ $entrylog->check_in }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @error('check_in')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="check_out" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Check-Out</label>
                            <input type="time" name="check_out" value="{{ $entrylog->check_out }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @error('check_out')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="status" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Status</label>
                        <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="present" {{ $entrylog->status == 'present' ? 'selected' : '' }}>Present</option>
                            <option value="absent" {{ $entrylog->status == 'absent' ? 'selected' : '' }}>Absent</option>
                            <option value="late" {{ $entrylog->status == 'late' ? 'selected' : '' }}>Late</option>
                        </select>
                        @error('status')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-center mt-6">
                        <input type="submit" value="Update" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        <a href="{{ route('Trainers.entrylogs.index') }}" class="bg-gray-500 hover:bg-gray-400 text-white ml-4 font-bold py-2 px-4 border-b-4 border-gray-700 hover:border-gray-500 rounded">Back</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
