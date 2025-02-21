@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-5">
        <h1 class="text-3xl font-bold mb-4">Liste des catégories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-add mb-4">Ajouter une catégorie</a>
        
        <ul class="space-y-2">
            @foreach ($categories as $category)
                <li class="flex justify-between items-center p-4 bg-gray-50 rounded-lg shadow hover:bg-gray-100 transition">
                    <span class="text-lg font-medium">{{ $category->name }}</span>
                    <div class="space-x-2">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-edit">Modifier</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Supprimer</button>
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

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .btn {
        padding: 10px 15px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s, color 0.3s;
        border: none;
        cursor: pointer;
    }

    .btn-add {
        background-color: #007bff;
        color: white;
    }

    .btn-add:hover {
        background-color: #0056b3;
    }

    .btn-edit {
        background-color: #28a745;
        color: white;
    }

    .btn-edit:hover {
        background-color: #218838;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }

    h1 {
        color: #333;
    }

    li {
        transition: background-color 0.3s;
    }

    .text-lg {
        font-size: 1.125rem; /* Adjust font size */
    }
</style>
