<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Member Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('styles')
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="bg-blue-600 p-4">
        <ul class="flex space-x-4 text-white">
            <li><a href="" class="hover:underline">Dashboard</a></li>
            <li><a href="" class="hover:underline">Profile</a></li>
            <li><a href="" class="hover:underline">Sessions</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="hover:underline">
                    @csrf
                    <button type="submit" class="w-full text-left">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="container mx-auto p-4">
        @yield('content')
    </div>
    
    <footer class="bg-gray-800 text-white text-center p-4 mt-8">
        <p>&copy; {{ date('Y') }} Member App. All rights reserved.</p>
    </footer>
    
    @yield('scripts')
</body>
</html>
