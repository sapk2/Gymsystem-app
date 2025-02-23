@extends('layouts.app')
@section('content')
    <div class="container mt-6">
        <h1 class="text-2xl text-white font-bold">ABOUT US</h1>
        <hr>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-800">
                        <form action="{{ route('admin.aboutus.update') }}" method="post" enctype="multipart/form-data" onsubmit="return setQuillContent()">
                            @csrf
                            
                            <div class="mb-4">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-800">Title</label>
                                <input type="text" name="title" id="title" value="{{ $aboutus->title ?? '' }}" class="input-field" required>
                                @error('title')
                                    <span class="text-red-500 font-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="subtitle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subtitle</label>
                                <input type="text" name="subtitle" id="subtitle" value="{{ $aboutus->subtitle ?? '' }}" class="input-field" required>
                                @error('subtitle')
                                    <span class="text-red-500 font-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                                <div id="editor" class="bg-white dark:bg-gray-700 text-gray-900 dark:text-white p-2 rounded">{!! $aboutus->description ?? '' !!}</div>
                                <input type="hidden" name="description" id="description" value="{{ $aboutus->description ?? '' }}" required>
                                @error('description')
                                    <span class="text-red-500 font-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" name="email" id="email" value="{{ $aboutus->email ?? '' }}" class="input-field" required>
                                @error('email')
                                    <span class="text-red-500 font-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                @if(isset($aboutus) && $aboutus->image)
                                    <img src="{{ asset('storage/' . $aboutus->image) }}" alt="About Us Image" class="w-32 h-32 rounded mb-2">
                                @endif
                                <input type="file" name="image" id="image" class="input-field">
                            </div>
                            
                            <div class="mb-4">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize Quill editor
        const quill = new Quill('#editor', {
            theme: 'snow'
        });
        
        // Set initial content from hidden input
        quill.root.innerHTML = document.getElementById('description').value;

        // Copy Quill content to hidden input before submitting
        function setQuillContent() {
            document.getElementById('description').value = quill.root.innerHTML;
            if (quill.getText().trim() === "") {
                alert("Please enter content in the editor.");
                return false;
            }
            return true;
        }
    </script>

    <style>
        .input-field {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: rgb(17, 24, 39); /* gray-900 */
            color: white
        }
    </style>
@endsection
