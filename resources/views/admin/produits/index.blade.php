@extends('admin.base')

@section('content')
    <h1>Liste des catégories</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('admin.produits.create') }}" class="btn btn-primary mb-3">Ajouter un produit <i
            class="bi bi-file-earmark-plus"></i></a>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="{{ route('admin.produits.index') }}" method="GET" class="d-flex gap-2">
                    <input type="text" name="nom" class="form-control" placeholder="Rechercher un produit..."
                        value="{{ request('nom') }}">
                    <select name="categorie" class="border p-2 rounded">
                        <option value="">Toutes les catégories</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}"
                                {{ isset($categorie_id) && $categorie_id == $categorie->id ? 'selected' : '' }}>
                                {{ $categorie->libelle }}
                            </option>
                        @endforeach
                    </select>

                    <button class="btn btn-secondary">Rechercher</button>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité en stock</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($produits as $produit)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $produit->nom }}</td>
                    <td>{{ $produit->prix }}</td>
                    <td>{{ $produit->quantite_en_stock }}</td>
                    <td>{{ $produit->categorie->libelle }}</td>
                    <td>
                        <a href="{{ route('admin.produits.show', $produit) }}" class="btn btn-info"><i
                                class="bi bi-eye-fill"></i></a>
                        <a href="{{ route('admin.produits.edit', $produit) }}" class="btn btn-warning"><i
                                class="bi bi-pencil-fill"></i></a>
                        <form action="{{ route('admin.produits.destroy', $produit) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')"><i
                                    class="bi bi-trash-fill"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $produits->links() }}
    </div>
 
    <div class="container">
        @if ($produits->isEmpty())
            <div class="alert alert-info">
                Aucun produit trouvé.
            </div>
            
        @endif

        @if (request()->has('nom') || request()->has('categorie'))
           <a href="{{ route('admin.produits.index') }}">Tout afficher</a>   
        @endif
    </div>
@endsection
