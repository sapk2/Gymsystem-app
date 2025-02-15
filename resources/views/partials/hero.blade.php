<!-- Hero Section -->
<section id="home" class=" flex  justify-center items-center w-full h-screen  text-center">
    <div class="absolute inset-0 bg-black bg-opacity-25 contrast-50" style="background-image: url({{asset('storage/'.$hero->image)}}); background-size: cover; background-position: center; filter: blur(2px);"></div>
        <div class="relative z-10 max-w-2xl mx-auto px-6">
            <h6 class="text-lg text-gray-300" data-aos="fade-down-right" data-aos-delay="300">{{$hero->tagline}}</h6>
            <h1 class="text-4xl md:text-5xl font-bold text-white mt-3" data-aos="fade-down-right" data-aos-delay="500">{{$hero->heading}}</h1>
            <div class="mt-6 space-x-4">
                <a href="#feature" class="px-6 py-3 bg-gray-900 text-white rounded-md text-lg transition hover:bg-red-700" data-aos="fade-down-right" data-aos-delay="600">{{$hero->startlink}}</a>
                <a href="#about" class="px-6 py-3 border border-red-900 hover:border-red-500 text-white rounded-md text-lg transition  hover:text-red-400" data-aos="fade-down-right" data-aos-delay="700">Learn More</a>
            </div>
        </div>
    </div>
</section>
 
    <!-- Feature Section -->
<section id="feature" class="bg-gray-100 shadow-2xl text-black py-16">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center justify-between">
             
             <!-- Left Content -->
             <div class="lg:w-1/2 space-y-6 text-center lg:text-left" data-aos="fade-down-right" data-aos-anchor-placement="top-bottom">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-900">
                    {{ $hero->feature_title }}
                </h2>
                
                <h6 class="text-xl text-gray-700 dark:text-gray-600">
                    {{ $hero->feature_offer }}
                </h6>
            
                <a href="{{ route('register') }}" 
                   class="inline-block px-6 py-3 mt-6 bg-orange-600 text-white text-lg font-medium rounded-md transition duration-300 ease-in-out transform hover:bg-red-700 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2" 
                   data-aos="fade-down-right" 
                   data-aos-anchor-placement="top-bottom">
                    {{ $hero->feature_link }}
                </a>
            </div>
            <!-- Working Hours -->
            <div class="lg:w-1/3 mt-12 lg:mt-0 bg-gray-100 p-6 rounded-lg shadow-lg text-center" data-aos="fade-down-right"data-aos-anchor-placement="top-bottom" data-aos-delay="500">
                 <h2 class="text-2xl font-bold mb-4">{{$hero->hours_week}}</h2>
                 <p class="font-semibold text-gray-600">
                     <span class="text-red-600">{{$hero->status}}</span>
                 </p>
                 <p class="text-gray-600">{{$hero->hours_sat}}</p>
            </div>
        </div>
    </div>
 </section>
 