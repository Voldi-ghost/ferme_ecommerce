@extends('admin.base')

@section('title', 'Créer une catégorie')

@section('content')
    <h1>Créer une nouvelle catégorie</h1>

    <form action="{{ route($category->exists ? 'admin.categories.update' : 'admin.categories.store', $category) }}" method="POST">
        @csrf
        @if($category->exists)
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="libelle" class="form-label">Nom de la catégorie</label>
            <input type="text" class="form-control" id="libelle" name="libelle" value="{{ old('libelle', $category->libelle ?? '') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ $category->exists ? 'Mettre à jour' : 'Créer la catégorie' }}</button>
    </form>
@endsection
