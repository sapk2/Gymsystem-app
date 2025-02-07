<!DOCTYPE html>
<html lang="en">
<head>
     <title>{{ config('app.name', 'Laravel') }}</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
     <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="scroll-smooth bg-gray-100">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full bg-gray-950 shadow-md z-50">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <div class="flex items-center mb-4 md:mb-0">
                <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{asset('./img/gym-logo.png')}}" class="h-18 w-21" alt="Flowbite Logo" />
                    <span class="self-center  text-gray-100 text-2xl font-semibold whitespace-nowrap">Gymso Fitness</span>
                </a>
            </div>
            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="lg:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Navbar Links -->
            <div id="menu" class="hidden lg:flex space-x-6">
                <a href="#home" class="text-gray-100 hover:text-red-500 transition-all duration-300">Home</a>
                <a href="#about" class="text-gray-100 hover:text-red-500 transition-all duration-300 scroll-smooth">About Us</a>
                <a href="#class" class="text-gray-100 hover:text-red-500 transition-all duration-300 scroll-smooth">Classes</a>
                <a href="#contact" class="text-gray-100 hover:text-red-500 scroll-smooth transition-all duration-300">Contact</a>
            </div>

            <!-- Authentication Links -->
            <div class="hidden lg:flex space-x-4">
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
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden absolute top-full left-0 w-full bg-slate-100 shadow-md  flex-col items-center space-y-4 py-4 transition-all duration-300 transform scale-95 opacity-0">
            <a href="#home" class="text-gray-100 hover:text-red-500 transition-all  scroll-smooth duration-300">Home</a>
            <a href="#about" class="text-gray-100 hover:text-red-500 transition-all  scroll-smooth duration-300">About Us</a>
            <a href="#class" class="text-gray-100 hover:text-red-500 transition-all  scroll-smooth duration-300">Classes</a>
            <a href="#contact" class="text-gray-100 hover:text-red-500 transition-all  scroll-smooth duration-300">Contact</a>

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
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-all duration-300">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 border border-red-600 text-red-600 rounded-md hover:bg-red-600 hover:text-white transition-all duration-300">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        @yield('content')
    </div>
    <script>
        AOS.init();
    </script>

    <!-- Smooth Scroll Script -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>

    <!-- Mobile Menu Script -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('scale-100');
            mobileMenu.classList.toggle('opacity-100');
        });
    </script>

</body>
</html>
