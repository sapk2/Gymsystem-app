<!-- Hero Section -->
<section id="home" class=" flex  justify-center items-center w-full h-screen  text-center">
     <div class="absolute inset-0 bg-black bg-opacity-25 contrast-50" style="background-image: url('/images/hero-bg.jpg'); background-size: cover; background-position: center; filter: blur(2px);"></div>
     <div class="relative z-10 max-w-2xl mx-auto px-6">
         <h6 class="text-lg text-gray-300" data-aos="fade-down-right" data-aos-delay="300">New way to build a healthy lifestyle!</h6>
         <h1 class="text-4xl md:text-5xl font-bold text-white mt-3" data-aos="fade-down-right" data-aos-delay="500">Upgrade your body at Gymso Fitness</h1>
         <div class="mt-6 space-x-4">
             <a href="#feature" class="px-6 py-3 bg-red-600 text-white rounded-md text-lg transition hover:bg-red-700" data-aos="fade-down-right" data-aos-delay="600">Get Started</a>
             <a href="#about" class="px-6 py-3 border border-white text-white rounded-md text-lg transition hover:bg-white hover:text-black" data-aos="fade-down-right" data-aos-delay="700">Learn More</a>
         </div>
     </div>
    </section>
 
    <!-- Feature Section -->
  <section id="feature" class="bg-gray-200 text-black py-16">
     <div class="container mx-auto px-6">
         <div class="flex flex-col lg:flex-row items-center justify-between">
             
             <!-- Left Content -->
             <div class="lg:w-1/2 space-y-6 text-center lg:text-left" data-aos="fade-down-right"
             data-aos-anchor-placement="top-bottom">
                 <h2 class="text-3xl font-bold">New to the gymso?</h2>
                 <h6 class="text-xl">Your membership is up to 2 months FREE ($62.50 per month)</h6>
                 <a href="{{route('register')}}" class="px-6 py-3 bg-red-600 text-white rounded-md text-lg transition hover:bg-red-700" data-aos="fade-down-right"
                 data-aos-anchor-placement="top-bottom">Become a member today</a>
             </div>
 
             <!-- Working Hours -->
             <div class="lg:w-1/3 mt-12 lg:mt-0 bg-gray-200 p-6 rounded-lg shadow-lg text-center" data-aos="fade-down-right"
             data-aos-anchor-placement="top-bottom" data-aos-delay="500">
                 <h2 class="text-2xl font-bold mb-4">Working hours</h2>
                 <p class="font-semibold text-gray-600">Sunday: <span class="text-red-400">Closed</span></p>
                 <p class="mt-3 font-semibold text-gray-600">Monday - Friday</p>
                 <p class="text-gray-600">7:00 AM - 10:00 PM</p>
                 <p class="mt-3 font-semibold text-gray-600">Saturday</p>
                 <p class="text-gray-600">6:00 AM - 4:00 PM</p>
             </div>
 
         </div>
     </div>
 </section>
 