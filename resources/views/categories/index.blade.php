@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-5">
        <h1 class="text-3xl font-bold mb-4">Liste des catégories</h1>
        <a href="{{ route('categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 mb-4 inline-block">Ajouter une catégorie</a>
        
        <ul class="space-y-2">
            @foreach ($categories as $category)
                <li class="flex justify-between items-center p-2 bg-gray-50 rounded-lg shadow hover:bg-gray-100 transition">
                    <span class="text-lg font-medium">{{ $category->name }}</span>
                    <div class="space-x-2">
                        <a href="{{ route('categories.edit', $category) }}" class="text-blue-500 hover:underline">Modifier</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        
        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
