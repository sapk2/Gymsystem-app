<!DOCTYPE html>
<html lang="en" x-data="{ isMobileMenuOpen: false, isProfileMenuOpen: false }" @keydown.escape="isProfileMenuOpen = false; isMobileMenuOpen = false">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', Auth::user()->name)</title>
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css" />

    <!-- JS Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    @yield('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-gray-100">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <!-- Mobile menu button -->
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button @click="isMobileMenuOpen = !isMobileMenuOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Open main menu</span>
                        <svg x-show="!isMobileMenuOpen" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="isMobileMenuOpen" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Desktop menu -->
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                   
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="{{route('members.dashboard')}}" class="bg-gray-500 text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                            <a href="{{route('members.routine.memberindex')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"> Schedules </a>
                            <a href="{{route('members.subscribedplan')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">  Subscription</a>
                            <a href="{{route('members.payments.index')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"> payments</a>
                            
                            
                        </div>
                    </div>
                </div>
                <!-- Profile dropdown -->
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                            <button @click="isProfileMenuOpen = !isProfileMenuOpen" type="button" class="flex items-center max-w-xs rounded-full focus:outline-none" id="user-menu-button">
                                <span class="sr-only">Open user menu</span>
                                <div class="flex items-center text-sm text-white">
                                    <span class="mr-3 hidden md:block">{{ Auth::user()->name }}</span>
                                    @if (Auth::user()->avatar)
                                    <img class="h-10 w-10 rounded-full border-2 border-gray-400 hover:border-white transition-all duration-200 ml-1" src="{{ asset(Auth::user()->avatar) }}" alt="Profile photo">
                                    @else
                                    <div class="h-10 w-10 rounded-full bg-gray-600 flex items-center justify-center border-2 border-gray-400 hover:border-white transition-all duration-200">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    @endif
                                </div>
                            </button>
                        </div>

                        <!-- Enhanced Dropdown menu -->
                        <div x-show="isProfileMenuOpen" 
                            @click.away="isProfileMenuOpen = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-20 mt-2 w-64 origin-top-right rounded-lg bg-gray-700 shadow-xl py-2"
                            role="menu">
                            <!-- User Info Section -->
                            <div class="px-4 py-3 border-b border-gray-600">
                                <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                                <p class="text-xs font-light text-gray-300 truncate mt-1">{{ Auth::user()->email }}</p>
                            </div>
                            
                            <!-- Menu Items -->
                            <div class="space-y-1 px-2">
                                <a href="{{ route('members.profile.edit') }}" class="flex items-center px-3 py-2 text-sm text-gray-200 hover:bg-gray-600 rounded-lg group transition-colors">
                                    <svg class="h-5 w-5 mr-3 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Profile
                                </a>
                                <a href="{{ route('members.payments.index') }}" class="flex items-center px-3 py-2 text-sm text-gray-200 hover:bg-gray-600 rounded-lg group transition-colors">
                                    <svg class="h-5 w-5 mr-3 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    Payment History
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center px-3 py-2 text-sm text-red-300 hover:bg-red-800/20 rounded-lg group transition-colors">
                                        <svg class="h-5 w-5 mr-3 text-red-400 group-hover:text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Mobile menu -->
        <div x-show="isMobileMenuOpen" 
             @click.away="isMobileMenuOpen = false"
             class="sm:hidden" 
             id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{route('members.dashboard')}}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
                <a href="{{route('members.routine.memberindex')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">My Schedules </a>
                <a href="{{route('members.payments.index')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Payment</a>
                
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4">
        @yield('content')
    </div>
    
   <!-- <footer class="bg-gray-800 text-white text-center p-4 mt-8">
        <p>&copy; {{ date('Y') }} Member App. All rights reserved.</p>
    </footer>-->
    
    @yield('scripts')
</body>
</html>