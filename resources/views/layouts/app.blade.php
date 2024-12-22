<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webprog</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="bg-gradient-to-r from-blue-600 to-primary text-white sticky top-0 z-50 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <a href="/"><span class="text-xl font-bold">Explora || </span>
                @auth
                    <span class="text-lg font-bold">Welcome, {{ Auth::user()->name }}</span>
                @else
                    <span class="text-lg font-bold">Welcome, Guest</span>
                @endauth
                </a>
            </div>
            <ul class="flex space-x-4">
                @guest
                    <li><a href="{{ route('login') }}" class="hover:text-gray-300 transition-colors duration-300 font-bold">Login</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-gray-300 transition-colors duration-300 font-bold">Register</a></li>
                @endguest

                <span class="text-xl font-bold">Explora || </span>
                <span class="text-lg font-bold">Welcome, HPNV</span>
            </div>
                <ul class="flex space-x-4">
                <li><a href="/" class="hover:text-gray-300 transition-colors duration-300 font-bold">Places</a></li>
                <li><a href="#history" class="hover:text-gray-300 transition-colors duration-300 font-bold">History</a></li>
                <li><a href="#profile" class="hover:text-gray-300 transition-colors duration-300 font-bold">Profile</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto p-4">
        @yield('content')
    </div>

    <footer class="bg-primary text-white text-center p-4">
        <p>&copy; 2024 Your Website. All rights reserved.</p>
    </footer>
</body>
</html>
