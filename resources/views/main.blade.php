<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="scroll-smooth bg-gray-100">

<!-- Navbar -->
<nav class="fixed top-0 w-full bg-black shadow-lg z-50 scroll-smooth">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="flex items-center space-x-2">
                    <img src="{{asset('storage/'.$aboutus->image)}}" class="h-12 w-12 object-contain" alt="Logo">
                    <span class="text-white text-xl font-bold">{{$aboutus->title}}</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="#home" class="text-gray-300 hover:text-red-500 transition-colors">Home</a>
                <a href="#about" class="text-gray-300 hover:text-red-500 transition-colors">About</a>
                <a href="#subscription" class="text-gray-300 hover:text-red-500 transition-colors">Plans</a>
                <a href="#contact" class="text-gray-300 hover:text-red-500 transition-colors">Contact</a>
            </div>

            <!-- Auth Links (Desktop) -->
            <div class="hidden lg:flex items-center space-x-4">
                @if (Route::has('login'))
                    @auth
                        @if(Auth::user()->roles == 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-all duration-300">Dashboard</a>
                        @elseif(Auth::user()->roles == 'trainer')
                            <a href="{{ route('trainers.dashboard') }}" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-all duration-300">Dashboard</a>
                        @elseif(Auth::user()->roles == 'member')
                            <a href="{{ route('members.dashboard') }}" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-all duration-300">Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-all duration-300">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 border border-red-600 text-red-600 rounded-md hover:bg-red-600 hover:text-white transition-all duration-300">Register</a>
                        @endif
                    @endauth
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="lg:hidden text-gray-300 hover:text-red-500 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden hidden bg-black">
        <div class="px-4 pt-2 pb-3 space-y-1 text-center">
            <a href="#home" class="block mt-2 text-white hover:text-red-500 transition-colors">Home</a>
            <a href="#about" class="block mt-4 text-white hover:text-red-500 transition-colors">About</a>
            <a href="#subscription" class="block mt-2 text-white hover:text-red-500 transition-colors">Plans</a>
            <a href="#contact" class="block mt-2 text-white hover:text-red-500 transition-colors">Contact</a>
            
             <!-- Authentication Links (Mobile) -->
             @if (Route::has('login'))
             @auth
                 @if(Auth::user()->roles == 'admin')
                     <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-all duration-300">Welcome {{auth()->user()->name}}</a>
                 @elseif(Auth::user()->roles == 'trainer')
                     <a href="{{ route('trainers.dashboard') }}" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-all duration-300">Welcome {{auth()->user()->name}}</a>
                 @elseif(Auth::user()->roles == 'member')
                 <a href="{{ route('members.dashboard') }}" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-all duration-300">
                     Welcome {{ auth()->user()->name }}
                 </a>
                 
                 @endif
             @else
             <div class=" mt-2 flex  space-x-1 justify-center">
                <a href="{{ route('login') }}" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-all duration-300">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-4 py-2 border border-red-600 text-red-600 rounded-md hover:bg-red-600 hover:text-white transition-all duration-300">Register</a>
                @endif
             </div>
               
             @endauth
         @endif
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="pt-20 pb-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        @yield('content')
    </div>
</main>

<!-- Footer -->
<footer class="bg-gray-100 text-gray-600 shadow-inherit">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Logo Section -->
            <div class="space-y-4">
                <a href="/" class="flex items-center space-x-2">
                    <img src="{{asset('storage/'.$aboutus->image)}}" class="h-12 w-12" alt="Logo">
                    <span class="text-xl font-bold text-slate-600">{{$aboutus->title}}</span>
                </a>
                
            </div>
        </div>

            <!-- Quick Links -->
        <div class="space-y-4">
            <h3 class="text-gray-600 font-semibold flex justify-end">Quick Links</h3>
            <nav class="flex justify-end flex-row space-x-4"> <!-- Changed to flex-row and space-x-4 -->
                <a href="#about" class="hover:text-red-500 transition-colors">About Us</a>
                <a href="#subscription" class="hover:text-red-500 transition-colors">Our Plans</a>
                <a href="#contact" class="hover:text-red-500 transition-colors">Contact</a>
            </nav>
        </div>
        <!-- Copyright -->
        <div class="border-t border-gray-700 mt-8 pt-8 text-center flex justify-end text-sm">
            <p>&copy; {{ date('Y') }} {{$aboutus->title}}. All rights reserved.</p>
        </div>
        <p class="mt-2">Designed by Paribesh Sapkota</p>
    </div>
</footer>

<script>
    // Mobile Menu Toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });

    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true
    });
</script>

</body>
</html>