@extends('layouts.app')

@section('title', 'List of Listings')

@section('content')
    <!-- <div class="flex justify-end mb-8">
        <a href="{{ route('annonces.create') }}" class="bg-blue-600 text-white px-6 py-3 text-lg rounded-xl shadow-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus"></i> Add Listing
        </a>
    </div> -->

    <div class="space-y-8">
        @foreach ($annonces as $annonce)
            <div class="bg-white shadow-lg rounded-2xl p-6">
                
                <!-- Post Header -->
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center space-x-4">
                        <img src="https://i.pravatar.cc/60" class="w-14 h-14 rounded-full">
                        <div>
                            <h2 class="font-semibold text-gray-900 text-xl">{{ $annonce->title }}</h2>
                            <p class="text-gray-500 text-md"><i class="far fa-clock"></i> {{ $annonce->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    
                    <!-- Dropdown Menu -->
                    <div class="relative">
                        <button onclick="toggleMenu(this)" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-ellipsis-v text-2xl"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-40 bg-white shadow-md rounded-lg hidden">
                            <a href="{{ route('annonces.edit', $annonce) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('annonces.destroy', $annonce) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Image -->
                @if ($annonce->image)
                    <img src="{{ asset('storage/' . $annonce->image) }}" class="w-full h-80 object-cover rounded-xl">
                @endif

                <!-- Description -->
                <p class="text-gray-800 text-lg mt-4">{{ Str::limit($annonce->description, 200) }}</p>
                <p class="mt-3 text-gray-900 font-bold text-xl"><i class="fas fa-tag"></i> {{ number_format($annonce->prix, 2) }} MAD</p>

                <!-- Like, Comment, Share -->
                <div class="border-t mt-6 pt-4 flex justify-around text-gray-700 text-lg">
                    <button class="hover:text-blue-600 flex items-center space-x-2">
                        <i class="far fa-thumbs-up"></i> <span>Like</span>
                    </button>
                    <button class="hover:text-blue-600 flex items-center space-x-2">
                        <i class="far fa-comment"></i> <span>Comment</span>
                    </button>
                    <button class="hover:text-blue-600 flex items-center space-x-2">
                        <i class="fas fa-share"></i> <span>Share</span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $annonces->links() }}
    </div>

    <!-- JavaScript for Dropdown -->
    <script>
        function toggleMenu(button) {
            let menu = button.nextElementSibling;
            menu.classList.toggle('hidden');
        }
        document.addEventListener("click", function(event) {
            let menus = document.querySelectorAll(".relative div.absolute");
            menus.forEach(menu => {
                if (!menu.parentElement.contains(event.target)) {
                    menu.classList.add("hidden");
                }
            });
        });
    </script>
@endsection