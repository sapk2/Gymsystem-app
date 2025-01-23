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
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>

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
            <ul class="mt-4 space-y-2">
                <li><a href="{{route('admin.dashboard')}}" class="block hover:bg-gray-500 p-4 rounded-lg font-bold text-xl">Dashboard</a></li>
                <li><a href="{{route('admin.plans.index')}}" class="block hover:bg-gray-500 p-4 rounded-lg font-bold text-xl">Subscription Plan</a></li>
                <li><a href="{{route('admin.managemembers.index')}}" class="block hover:bg-gray-500 p-4 rounded-lg font-bold text-xl">Membership</a></li>
                <li><a href="{{route('admin.managetrainers.index')}}" class="block hover:bg-gray-500 p-4 rounded-lg font-bold text-xl">Trainer</a></li>
                <li><a href="{{route('admin.routines.index')}}" class="block hover:bg-gray-500 p-4 rounded-lg font-bold text-xl">Schedules</a></li>
                <li><a href="{{route('admin.attendances.index')}}" class="block hover:bg-gray-500 p-4 rounded-lg font-bold text-xl">Attendance</a></li>
                <li><a href="" class="block hover:bg-gray-500 p-4 rounded-lg font-bold text-xl">Payments</a></li>
                <li><a href="{{route('admin.users.index')}}" class="block hover:bg-gray-500 p-4 rounded-lg font-bold text-xl">Users</a></li>
                <li><a href="" class="block hover:bg-gray-500 p-4 rounded-lg font-bold text-xl">Health status</a></li>
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
                        <img class="w-8 h-8 rounded-full" src="{{asset('/img/profile.jpg')}}" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAvatar" class="z-10 hidden absolute right-0 mt-9 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-2 py-3 text-sm text-gray-900 dark:text-white">
                        <div>{{Auth::user()->name}}</div>
                        <div class="font-medium truncate">name@flowbite.com</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                            <li>
                                <a href="" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">profile</a>
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
