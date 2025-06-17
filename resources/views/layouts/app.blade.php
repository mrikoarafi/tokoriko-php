<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TokoRiko')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen flex flex-col">
    <nav class="bg-gradient-to-r from-blue-600 to-blue-800 text-white shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <a href="{{ route('products.index') }}" class="text-2xl font-bold hover:text-blue-200 transition duration-300">
                🛍️ TokoRiko
            </a>
            <div class="space-x-6">
                <a href="{{ route('products.index') }}" class="hover:text-blue-200 transition duration-300 px-3 py-2 rounded-md hover:bg-blue-700">Beranda</a>
                <a href="{{ route('products.admin') }}" class="hover:text-blue-200 transition duration-300 px-3 py-2 rounded-md hover:bg-blue-700">Admin</a>
            </div>
        </div>
    </nav>
    <!-- 
    @if(session('success'))
    <div class="bg-green-500 text-white p-4 text-center shadow-md">
        <div class="container mx-auto">
            ✅ {{ session('success') }}
        </div>
    </div>
    @endif -->

    <main class="container mx-auto px-4 py-8 flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-blue-900 via-purple-900 to-indigo-900 text-white mt-auto">
        <div class="container mx-auto px-6 py-12">
            <div class="text-center">
                <!-- Logo/Brand -->
                <div class="mb-8">
                    <h3 class="text-3xl font-bold mb-2">TokoRiko</h3>
                    <p class="text-blue-200 text-lg">Your Trusted Online Store</p>
                </div>

                <!-- Social Media Links -->
                <div class="mb-8">
                    <h4 class="text-xl font-semibold mb-6">Connect With Us</h4>
                    <div class="flex justify-center space-x-6">
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/rikoarafi" target="_blank"
                            class="group flex items-center space-x-3 bg-white/10 hover:bg-white/20 px-6 py-3 rounded-full transition duration-300 transform hover:scale-105">
                            <div class="text-2xl">📸</div>
                            <span class="font-semibold">Instagram</span>
                        </a>

                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/in/mrikoarafi" target="_blank"
                            class="group flex items-center space-x-3 bg-white/10 hover:bg-white/20 px-6 py-3 rounded-full transition duration-300 transform hover:scale-105">
                            <div class="text-2xl">💼</div>
                            <span class="font-semibold">LinkedIn</span>
                        </a>

                        <!-- Portfolio Website -->
                        <a href="https://mrikoarafi-portfolio.vercel.app/" target="_blank"
                            class="group flex items-center space-x-3 bg-white/10 hover:bg-white/20 px-6 py-3 rounded-full transition duration-300 transform hover:scale-105">
                            <div class="text-2xl">🌐</div>
                            <span class="font-semibold">Portfolio</span>
                        </a>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t border-white/20 pt-8">
                    <p class="text-blue-200 text-sm">
                        © {{ date('Y') }} TokoRiko. Made with ❤️ by Riko Arafi
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>