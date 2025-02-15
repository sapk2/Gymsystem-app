<!-- About Section -->
<section id="about" data-aos="fade-right" class="bg-gray-100 text-black py-16">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-10">
            
            <!-- About Content -->
            <div class="lg:w-1/2 text-center lg:text-left" data-aos="fade-right" data-aos-delay="300">
                <h2 class="text-3xl font-bold mb-4">{{ $aboutus->title }}</h2>
                <p class="text-gray-900 mb-4" data-aos="fade-right" data-aos-delay="400">
                    {!! $aboutus->description !!}
                </p>
            </div>

            <!-- Trainers Section -->
            <div class="flex flex-wrap justify-center gap-6">
                @foreach($trainer as $t)
                    <div class="bg-white p-6 rounded-lg shadow-lg text-center w-72" data-aos="fade-up" data-aos-delay="500">
                        <img src="{{ asset('storage/' . $t->image) }}" class="rounded-lg w-full h-48 object-cover mb-4" alt="Trainer">
                        <h3 class="text-xl font-semibold">{{ $t->user->name }}</h3>
                        <span class="text-red-500 block">{{ $t->specialization }}</span>
                        <p class="mt-2 text-gray-600">Phone: {{ $t->phone_no }}</p>
                        
                        <!-- Social Icons
                        <div class="mt-4 flex justify-center space-x-4">
                            <a href="#" class="hover:text-red-400 transition duration-150 ease-in-out">
                                <svg class="w-8 h-8 text-gray-800" fill="#1DA1F2" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z" clip-rule="evenodd"/>
                                </svg>
                            </a>
                            <a href="#" class="hover:text-red-400 transition duration-150 ease-in-out">
                                <svg class="w-8 h-8" viewBox="0 0 24 24">
                                    <linearGradient id="insta-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#feda75"/>
                                        <stop offset="25%" stop-color="#fa7e1e"/>
                                        <stop offset="50%" stop-color="#d62976"/>
                                        <stop offset="75%" stop-color="#962fbf"/>
                                        <stop offset="100%" stop-color="#4f5bd5"/>
                                    </linearGradient>
                                    <path fill="url(#insta-gradient)" fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd"/>
                                </svg>
                            </a>
                        </div> -->
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>
