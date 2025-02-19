@extends('layouts.app')

@section('content')
    <h1>Ajouter une catégorie</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label>Nom de la catégorie:</label>
        <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}">
        <button type="submit">Ajouter</button>
    </form>
@endsection
