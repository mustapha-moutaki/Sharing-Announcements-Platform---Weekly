<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Weekly')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow-md fixed w-full top-0 z-50 animate-fadeIn">
        <!-- Top Navigation Bar -->
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-14">
                <!-- Logo -->
                <div class="flex items-center space-x-2 hover:scale-105 transition-transform">
                    <i class="fas fa-newspaper text-blue-600 text-2xl"></i>
                    <h1 class="text-2xl font-bold text-blue-600">Weekly</h1>
                </div>

                <!-- Search Bar -->
                <div class="flex-1 max-w-xl px-4">
                    <div class="relative group">
                        <input type="text" placeholder="Search Weekly..." 
                               class="w-full bg-gray-100 rounded-full py-2 px-4 pl-10 
                                      focus:outline-none focus:ring-2 focus:ring-blue-500 
                                      transition-all duration-300 ease-in-out
                                      group-hover:bg-gray-200">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400 group-hover:text-blue-500 transition-colors"></i>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <div class="relative hover:scale-105 transition-transform cursor-pointer">
                        <i class="fas fa-bell text-gray-600 text-xl hover:text-blue-500 transition-colors"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-4 h-4 text-xs flex items-center justify-center animate-pulse">3</span>
                    </div>

                    <!-- Messages -->
                    <div class="relative hover:scale-105 transition-transform cursor-pointer">
                        <i class="fas fa-comment-dots text-gray-600 text-xl hover:text-blue-500 transition-colors"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-4 h-4 text-xs flex items-center justify-center">2</span>
                    </div>

                    <!-- Create Announcement Button -->
                    <a href="{{ route('annonces.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 
                                 flex items-center space-x-2 transform hover:scale-105 
                                 transition-all duration-300 ease-in-out shadow-md hover:shadow-lg">
                        <i class="fas fa-plus"></i>
                        <span>Create</span>
                    </a>

                    <!-- Profile Picture -->
                    <div class="relative group">
                        <img src="https://i.pravatar.cc/40" 
                             class="rounded-full cursor-pointer w-10 h-10 transform hover:scale-105 transition-transform" 
                             alt="Profile">
                        <div class="hidden group-hover:block absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 animate-fadeIn">
                            <a href="#" class="px-4 py-2 hover:bg-gray-100 flex items-center space-x-2">
                                <i class="fas fa-user text-gray-600"></i>
                                <span>Profile</span>
                            </a>
                            <a href="#" class="px-4 py-2 hover:bg-gray-100 flex items-center space-x-2">
                                <i class="fas fa-cog text-gray-600"></i>
                                <span>Settings</span>
                            </a>
                            <a href="#" class="px-4 py-2 hover:bg-gray-100 flex items-center space-x-2">
                                <i class="fas fa-sign-out-alt text-gray-600"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Categories Navigation -->
            <nav class="flex items-center space-x-8 h-14 border-t overflow-x-auto">
                @foreach($categories as $category)
                <a href="#" class="text-gray-600 hover:text-blue-500 border-b-2 border-transparent 
                                 hover:border-blue-500 py-4 px-2 transition-all duration-300
                                 flex items-center space-x-2 whitespace-nowrap
                                 transform hover:scale-105">
                    <i class="fas fa-{{ $category->icon }}"></i>
                    <span>{{$category->name}}</span>
                </a>
                @endforeach
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 mt-32">
        <!-- Centered Content Container -->
        <div class="max-w-3xl mx-auto animate-fadeIn"> 
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-md mt-10 py-4 text-center text-gray-600">
        <div class="flex justify-center space-x-6 mb-4">
            <a href="#" class="hover:text-blue-500 transform hover:scale-110 transition-all">
                <i class="fab fa-facebook text-xl"></i>
            </a>
            <a href="#" class="hover:text-blue-500 transform hover:scale-110 transition-all">
                <i class="fab fa-twitter text-xl"></i>
            </a>
            <a href="#" class="hover:text-blue-500 transform hover:scale-110 transition-all">
                <i class="fab fa-instagram text-xl"></i>
            </a>
        </div>
        &copy; {{ date('Y') }} Weekly - All rights reserved.
    </footer>

    <style>
        /* Custom animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out;
        }

        /* Custom styles for announcement cards */
        .announcement-card {
            @apply bg-white rounded-lg shadow-md p-4 mb-4 transform transition-all duration-300;
        }

        .announcement-card:hover {
            @apply shadow-lg scale-102;
        }

        /* Hide scrollbar but keep functionality */
        nav::-webkit-scrollbar {
            display: none;
        }
        nav {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Scale factor for hover effects */
        .scale-102 {
            transform: scale(1.02);
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
</body>
</html>