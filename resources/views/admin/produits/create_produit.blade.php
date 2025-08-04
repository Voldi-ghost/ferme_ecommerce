@extends('admin.base')

@section('content')
@section('content')
<div class="container">
    <h1>Ajouter un nouveau produit</h1>

    {{-- Affichage des erreurs de validation --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erreur)
                    <li>{{ $erreur }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ $produit->exists ? route('admin.produits.update', $produit->id) : route('admin.produits.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($produit->exists)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nom" class="form-label">Nom du produit</label>
            <input type="text" name="nom" id="nom" class="form-control" required value="{{ $produit->nom ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="categorie_id" class="form-label">Catégorie</label>
            <select name="categorie_id" id="categorie_id" class="form-control" required>
                <option value="">-- Choisir une catégorie --</option>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}"
                    {{ old('categorie_id', $produit->categorie_id ?? '') == $categorie->id ? 'selected' : '' }}>
                    {{ $categorie->libelle }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix (par Kilo)</label>
            <input type="number" name="prix" id="prix" class="form-control" step="0.01" required value="{{ $produit->prix ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="quantite_en_stock" class="form-label">Quantité en stock</label>
            <input type="number" name="quantite_en_stock" id="quantite_en_stock" class="form-control" required value="{{ $produit->quantite_en_stock ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ $produit->description ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image du produit</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">{{ $produit->exists ? 'Mettre à jour' : 'Ajouter' }}</button>
    </form>
</div>
@endsection