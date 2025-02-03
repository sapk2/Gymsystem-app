<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel Portfolio') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css" />

    <!-- JS Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen flex relative">
        <!-- Sidebar -->
        <nav id="sidebar" class="w-56 bg-gray-600 text-white h-screen fixed transform -translate-x-full transition-transform duration-300 ease-in-out z-30">
            <div class="p-4 flex justify-end items-center">
                <button id="closeSidebar" class="text-white focus:outline-none">✖</button>
            </div>
            <ul class="mt-2 ">
                <li><a href="{{route('trainers.dashboard')}}" class="block hover:bg-gray-500 p-4 rounded-lg font-bold text-xl">Dashboard</a></li>
                <li><a href="{{route('trainers.membership.index')}}" class="block hover:bg-gray-500 p-4 rounded-lg font-bold text-xl">Membership</a></li>
                <li><a href="{{route('trainers.routines.index')}}" class="block hover:bg-gray-500 p-4 rounded-lg font-bold text-xl">Schedules</a></li>
                <li><a href="{{route('trainers.memberhealth')}}" class="block hover:bg-gray-500 p-4 rounded-lg font-bold text-xl">Member's Health</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="block hover:bg-gray-500 p-4 rounded-lg font-bold text-xl">
                        @csrf
                        <button type="submit" class="w-full text-left">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Overlay for blur -->
        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden transition-opacity duration-300 z-20"></div>

        <!-- Main Content -->
        <div id="mainContent" class="flex-1 transition-all duration-300">
            <!-- Top Navigation -->
            <header class="bg-gray-500 text-white p-4 flex justify-between items-center">
                <button id="toggleButton" class="text-white focus:outline-none">☰</button>
                <div class="flex justify-end">
                    <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
                        <span class="sr-only">Open user menu</span>
                        @if (Auth::user()->avatar)
                            <img class="w-8 h-8 rounded-full" src="{{asset(Auth::user()->avatar)}}" alt="user img" srcset="">
                        @else
                        <img class="w-8 h-8 rounded-full" src="{{asset('/img/profile.jpg')}}" alt="user photo">
                        @endif
                       
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAvatar" class="z-10 hidden absolute right-0 mt-9 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-2 py-3 text-sm text-gray-900 dark:text-white">
                        <div>{{Auth::user()->name}}</div>
                        <div class="font-medium truncate">{{Auth::user()->email}}</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                            <li>
                                <a href="{{route('trainers.dashboard')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{route('trainers.profile.edit')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">profile</a>
                            </li>
                        </ul>
                        <div class="py-2">
                            <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                @csrf
                                <button type="submit" class="w-full text-left">sign out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-4">
                @if (session('sucess'))
                <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                    {{session('sucess')}}
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    </button>
                </div>
                @endif
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const dismissButtons = document.querySelectorAll("[data-dismiss-target]");
                        dismissButtons.forEach((button) => {
                            button.addEventListener("click", () => {
                                const target = button.getAttribute("data-dismiss-target");
                                const alertElement = document.querySelector(target);
                                if (alertElement) {
                                    alertElement.style.display = "none";
                                }
                            });
                        });
                    });
                    </script>
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const overlay = document.getElementById('overlay');
        const toggleButton = document.getElementById('toggleButton');
        const closeSidebar = document.getElementById('closeSidebar');

        // Function to open the sidebar
        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            overlay.classList.add('block');
            mainContent.classList.add('blur-sm');
        }

        // Function to close the sidebar
        function closeSidebarFunction() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            overlay.classList.remove('block');
            mainContent.classList.remove('blur-sm');
        }

        // Open the sidebar when the toggle button is clicked
        toggleButton.addEventListener('click', openSidebar);

        // Close the sidebar when the close button is clicked
        closeSidebar.addEventListener('click', closeSidebarFunction);

        // Close the sidebar when clicking outside the sidebar
        overlay.addEventListener('click', closeSidebarFunction);

        document.addEventListener("DOMContentLoaded", function () {
    const dropdownButton = document.getElementById("dropdownUserAvatarButton");
    const dropdownMenu = document.getElementById("dropdownAvatar");

    dropdownButton.addEventListener("click", function (event) {
        event.stopPropagation(); // Prevent click from bubbling up
        dropdownMenu.classList.toggle("hidden");
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", function (event) {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add("hidden");
        }
    });

    // Close dropdown on Escape key press
    document.addEventListener("keydown", function (event) {
        if (event.key === "Escape") {
            dropdownMenu.classList.add("hidden");
        }
    });


});

    </script>
</body>

</html>
