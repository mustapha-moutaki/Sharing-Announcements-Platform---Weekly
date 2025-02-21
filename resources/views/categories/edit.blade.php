@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Modifier la catégorie</h1>
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom de la catégorie:</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    value="{{ old('name', $category->name ?? '') }}" 
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500"
                    required
                >
            </div>
            
            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-500 transition duration-200"
            >
                Mettre à jour
            </button>
        </form>
    </div>
@endsection

<style>
    .block {
        display: block;
    }

    .w-full {
        width: 100%;
    }

    .p-2 {
        padding: 0.5rem;
    }

    .border {
        border-width: 1px;
    }

    .border-gray-300 {
        border-color: #d1d5db;
    }

    .rounded-md {
        border-radius: 0.375rem;
    }

    .focus\:outline-none:focus {
        outline: none;
    }

    .focus\:ring {
        box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.5);
    }

    .focus\:ring-blue-500:focus {
        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.5);
    }

    .bg-blue-600 {
        background-color: #2563eb;
    }

    .hover\:bg-blue-500:hover {
        background-color: #3b82f6;
    }
</style>
