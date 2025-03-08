@extends('layouts.app')
@section('content')
    <div class="container mt-6">
        <div class="max-w-4xl mx-auto bg-gray-600 p-8 shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold mb-6 text-white">Manage Hero and Feature</h2>
            
            <form action="{{route('admin.herofeature.update')}}" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-6" enctype="multipart/form-data">
                @csrf
                <!-- hero section -->
               <div class="mt-3">
                    <div>
                        <h3 class=" text-white text-xl font-semibold mb-4">Hero section</h3>
                        <label class="block text-gray-100 mt-4" for="tagline">Tagline</label>
                        <input type="text" name="tagline" class="w-full p-2 border rounded-md" value="{{ $hero->tagline ?? '' }}" placeholder="#tagline" required>
                        @error('tagline')
                           <span class="text-red-500">{{$message}}</span>    
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="heading" class="block text-gray-100 mt-4">Heading</label>
                        <input type="text" name="heading" class="w-full p-2 border rounded-md" value="{{ $hero->heading ?? '' }}" placeholder="#heading" required >
                        @error('heading')
                        <span class="text-red-500">{{$message}}</span>    
                     @enderror
                    </div>
                    <div class="mb-4">
                        <label for="startlink" class="block text-gray-100 mt-4"> Get Start </label>
                        <input type="text" name="startlink" id="" class="w-full p-2 border rounded-md" value="{{ $hero->startlink ?? '' }}" placeholder="#feature" required>
                        @error('starlink')
                        <span class="text-red-500">{{$message}}</span>    
                     @enderror
                    </div>
               </div>
               <!-- Feature Section Fields -->

               <div class="mb-2">
                    <h3 class="text-xl text-white font-semibold mb-4">Feature Section</h3>
                    
                    <div class="mt-2">
                        <label for="title" class="block text-gray-100">Feature Title </label>
                        <input type="text" name="feature_title" value="{{ $hero->feature_title ?? '' }}" class="w-full p-2 border rounded-md" placeholder="New to the gymso?" required>
                        @error('feature_title')
                        <span class="text-red-500">{{$message}}</span>    
                     @enderror
                    </div>
                    <div class="mt-2">
                        <label for="offer" class="block text-gray-100 mt-4" >Feature Offer</label>
                        <input type="text" name="feature_offer"value="{{ $hero->feature_offer ?? '' }}" class="w-full p-2 border rounded-md" placeholder="Your membership is up to 2 months FREE ($62.50 per month)" required>
                        @error('feature_offer')
                        <span class="text-red-500">{{$message}}</span>    
                     @enderror
                    </div>
                    <div>
                        <label for="membership" class="block text-gray-100 mt-4">Feature Link</label>
                        <input type="text" name="feature_link" value="{{ $hero->feature_link?? '' }}" class="w-full p-2 border rounded-md" placeholder="register" required>
                        @error('feature_link')
                        <span class="text-red-500">{{$message}}</span>    
                     @enderror
                    </div>
                    
                </div>
                <div>
                    <label for="hours" class="block text-gray-100 mt-4">Working Hours (sunday - Friday)</label>
                    <input type="text" name="hours_week" value="{{ $hero->hours_week ?? '' }}" class="w-full p-2 border rounded-md" placeholder="7:00 AM - 10:00 PM" required>
                    @error('hours_week')
                    <span class="text-red-500">{{$message}}</span>    
                 @enderror
                </div>
                <div>
                    <label for="hours" class="block text-gray-100 mt-4" >Working Hours (Saturday)</label>
                    <input type="text" name="hours_sat" value="{{ $hero->hours_sat ?? '' }}" class="w-full p-2 border rounded-md" placeholder="6:00 AM - 4:00 PM" required>
                    @error('hours_sat')
                    <span class="text-red-500">{{$message}}</span>    
                 @enderror
                </div>
                <div>
                    <label for="status" class="block text-gray-100 mt-4">Status</label>
                    <select name="status" id="status" class="text-black">
                        <option value="">Select</option>
                        <option value="open" {{ (isset($hero) && $hero->status == 'open') ? 'selected' : '' }}>open</option>
                        <option value="closed" {{ (isset($hero) && $hero->status == 'closed') ? 'selected' : '' }}>closed</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="image" class="block text-gray-100 mt-2 font-medium">Image</label>
                    <input type="file" name="image" id="image" class="w-full">
                    @if(isset($hero) && $hero->image)
                        <img src="{{ asset('storage/' . $hero->image) }}" alt="bg-image" class="w-32 h-32 rounded mb-2">
                    @endif
                </div>
                <div>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection