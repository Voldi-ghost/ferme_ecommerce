@extends('admin.base')

@section('content')
<div class="container">
    <h1>Détails du produit</h1>

    <div class="mb-3">
        <label for="nom" class="form-label">Nom du produit</label>
        <input type="text" name="nom" id="nom" class="form-control" readonly value="{{ $produit->nom }}">
    </div>

    <div class="mb-3">
        <label for="categorie_id" class="form-label">Catégorie</label>
        <input type="text" name="categorie_id" id="categorie_id" class="form-control" readonly value="{{ $produit->categorie->libelle }}">
    </div>

    <div class="mb-3">
        <label for="prix" class="form-label">Prix (par Kilo)</label>
        <input type="number" name="prix" id="prix" class="form-control" readonly value="{{ $produit->prix }}">
    </div>

    <div class="mb-3">
        <label for="quantite_en_stock" class="form-label">Quantité en stock</label>
        <input type="number" name="quantite_en_stock" id="quantite_en_stock" class="form-control" readonly value="{{ $produit->quantite_en_stock }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" rows="3" readonly>{{ $produit->description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image du produit</label>
        <img width="500" height="500" src="{{ $produit->image ? asset('storage/' . $produit->image) : asset('images/default.jpg') }}" alt="{{ $produit->nom }}" class="img-fluid">
    </div>

    <a href="{{ route('admin.produits.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection