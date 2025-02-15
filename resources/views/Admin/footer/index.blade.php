@extends('layouts.app')
@section('content')
<div class="container mb-2">
    <h1 class="text-xl font-base text-white">Footers</h1>
    <hr>
</div>
<div class=" container">
    <form action="{{route('admin.footer.update')}}" method="post">
        @csrf
        <div class="px-3 py-4 text-white grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="map_heading" class="block text-sm font-medium text-gray-100">Map Heading</label>
                <input type="text" name="map_heading"  value="{{ $footer->map_heading ?? '' }}" id="map_heading" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="location" class="block text-sm font-medium text-gray-100">Location</label>
                <input type="text" name="location"  value="{{ $footer->location ?? '' }}" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="link" class="block text-sm font-medium text-gray-700">Link</label>
                <input type="text" name="link" id="link"  value="{{ $footer->link ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <input type="text" name="content" id="content"  value="{{ $footer->content ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="copyright" class="block text-sm font-medium text-gray-700">Copyright</label>
                <input type="text" name="copyright" id="copyright"  value="{{ $footer->copyright ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="text" name="date" id="date"  value="{{ $footer->date ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </div>  
        <div>
            <label for="describe" class="block text-sm font-medium text-gray-700">Describe</label>
            <input type="text" name="describe"  value="{{ $footer->describe ?? '' }}" id="describe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="flex justify-center mt-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection