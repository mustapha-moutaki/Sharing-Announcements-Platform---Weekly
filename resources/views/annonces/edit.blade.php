@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Modifier l'annonce</h1>
        <form action="{{ route('annonces.update', $annonce) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Nom de l'annonce:</label>
                <input type="text" name="title" value="{{ old('title', $annonce->title ?? '') }}" 
                       class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea name="description" class="w-full p-2 border border-gray-300 rounded-md">{{ old('description', $annonce->description ?? '') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Prix:</label>
                <input type="number" name="price" value="{{ old('price', $annonce->prix ?? '') }}" 
                       class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie:</label>
                <select name="category_id" id="category_id" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $annonce->categoryId == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image:</label>
                <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded-md">
                @if($annonce->image)
                <img src="{{ asset('storage/' . $annonce->image) }}" alt="Current Image" class="mt-2 w-32 h-32 object-cover">
            @endif
            </div>

            <button type="submit" 
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-500 transition duration-200">
                Mettre à jour
            </button>
        </form>
    </div>
@endsection
