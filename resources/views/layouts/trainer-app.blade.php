<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trainer Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
</head>
<body class="bg-gray-900">
    <div class="flex h-screen" x-data="{ open: false, profileOpen: false }">
        <!-- Sidebar -->
        <div :class="open ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 w-64 bg-gray-600 text-white transform transition-transform md:relative md:translate-x-0">
            <div class="p-5 text-lg font-bold flex justify-between items-center">
                Trainer Dashboard
                <button @click="open = false" class="md:hidden p-2 bg-gray-600 text-white rounded">&times;</button>
            </div>
            <ul>
                <li class="p-4 hover:bg-gray-700"><a href="#">Dashboard</a></li>
                <li class="p-4 hover:bg-gray-700"><a href="#">Profile</a></li>
                <li class="p-4 hover:bg-gray-700"><a href="#">Sessions</a></li>
                <li class="p-4 hover:bg-gray-700">
                    <form action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <button type="submit" class="w-full text-left">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <header class="bg-gray-800 shadow-md p-4 flex items-center justify-between">
                <div class="flex items-center">
                    <button @click="open = !open" class="md:hidden p-2 bg-gray-800 text-white rounded">
                        &#9776;
                    </button>
                    <h1 class="ml-4 text-xl text-white font-semibold">@yield('title', 'Trainer Dashboard')</h1>
                </div>
                <!-- Profile Dropdown -->
                <div class="relative" x-data="{ profileOpen: false }">
                    <button @click="profileOpen = !profileOpen" class="flex items-center focus:outline-none">
                        <img src="{{asset('/img/vscode.jpg')}}" alt="Profile" class="w-10 h-10 rounded-full">
                        <span class="ml-2 text-gray-100">Trainer</span>
                    </button>
                    <div x-show="profileOpen" @click.away="profileOpen = false" class="absolute right-0 mt-2 w-48 bg-gray-800 shadow-lg rounded-md overflow-hidden">
                        <a href="#" class="block px-4 py-2 text-white hover:bg-red-200">Profile</a>
                        <a href="#" class="block px-4 py-2 text-white hover:bg-red-200">Settings</a>
                        <form action="{{ route('logout') }}" method="POST"  class="block px-4 py-2 text-red hover:bg-red-200">
                            @csrf
                            <button type="submit" class="w-full text-white text-left">Logout</button>
                        </form>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <div class="p-6">
                @yield('content')
            </div>
        </div>
    </div>
    
    <footer class="text-center p-4 bg-white shadow-md">
        <p>&copy; {{ date('Y') }} Trainer App. All rights reserved.</p>
    </footer>
    
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
