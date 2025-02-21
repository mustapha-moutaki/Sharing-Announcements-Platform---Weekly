<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <header class="bg-blue-600 text-white p-4 flex justify-between items-center">
        <!-- Bouton Burger -->
        <button id="toggleSidebar" class="text-white text-2xl md:hidden">
            <i class="fas fa-bars"></i>
        </button>

        <h1 class="text-2xl font-bold"><i class="fas fa-bullhorn"></i> My Application</h1>
        
        <input type="text" placeholder="Search..." class="border border-gray-300 rounded-lg px-4 py-2 w-1/3 focus:ring-2 focus:ring-blue-500 text-black">
        
        <img src="https://i.pravatar.cc/40" class="rounded-full cursor-pointer" alt="Profile">
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-1/4 bg-white p-6 min-h-screen shadow-lg border-r transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out fixed md:relative">
            <h2 class="text-xl font-semibold mb-4"><i class="fas fa-list"></i> Categories</h2>
            <ul class="space-y-4 text-gray-700">
                @foreach($categories as $category)
                <li class="flex items-center space-x-2">
                    <i class="fas fa-home text-blue-500"></i>
                    <a href="#" class="hover:text-blue-500 font-medium">{{$category->name}}</a>
                </li>
                @endforeach
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 ml-0 md:ml-1/4 transition-all duration-300 ease-in-out">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-4 mt-10">
        &copy; {{ date('Y') }} - All rights reserved.
    </footer>

    <!-- JavaScript -->
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>

</body>
</html>
