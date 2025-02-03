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
                            <a href="{{route('members.routine.memberindex')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">My Schedules </a>
                            <a href="{{route('members.subscribedplan')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"> My subscription</a>
                            <a href="{{route('members.payments.index')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"> My payments</a>
                            
                            
                        </div>
                    </div>
                </div>

                <!-- Profile dropdown -->
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                            <button @click="isProfileMenuOpen = !isProfileMenuOpen" type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" :aria-expanded="isProfileMenuOpen">
                                <span class="sr-only">Open user menu</span>
                                @if (Auth::user()->avatar)
                                <img class="w-8 h-8 rounded-full" src="{{asset(Auth::user()->avatar)}}" alt="user img" srcset="">
                            @else
                            <img class="w-8 h-8 rounded-full" src="{{asset('/img/profile.jpg')}}" alt="user photo">
                            @endif
                            </button>
                        </div>

                        <!-- Dropdown menu -->
                        <div x-show="isProfileMenuOpen" 
                             @click.away="isProfileMenuOpen = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                             role="menu">
                            <a href="{{route('members.profile.edit')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                    Sign out
                                </button>
                            </form>
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
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Payment</a>
                
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