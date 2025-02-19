@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Modifier la catégorie</h1>
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom de la catégorie:</label>
                <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}">
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
