<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiltreRequest;
use App\Models\Categories;
use App\Models\Produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FiltreRequest $request)
    {
        
        $nom = $request->input('nom');
        $categorie_id = $request->input('categorie');

        $query = Produits::with('categorie');

        if ($nom) {
        $query->where('nom', 'like', '%' . $nom . '%');
        }

        if ($categorie_id) {
        $query->where('categorie_id', $categorie_id);
        }

        $produits = $query->paginate(10);
        $categories = Categories::all();

    return view('admin.produits.index', compact('produits', 'nom', 'categories', 'categorie_id'));

        // $produits = Produits::with('categorie')->recent()->paginate(10);
        // return view('admin.produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Produits $produit)
    {
        $produit = $produit ?: new Produits();
        $categories = \App\Models\Categories::all();
        return view('admin.produits.create_produit', compact('produit', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nom' => 'required',
        'prix' => 'required|numeric',
        'quantite_en_stock' => 'required|integer',
        'categorie_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048', // Optional image validation
    ]);

    $data = $request->except('image');
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $data['image'] = $imagePath;
    }
     Produits::create($data);
    return redirect()->route('admin.produits.index')->with('success', 'Produit ajouté avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Produits $produit)
    {
       return view('admin.produits.show_produit', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produits $produit)
    {
         $categories = \App\Models\Categories::all();
        return view('admin.produits.create_produit', compact('produit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produits $produit)
    {
       $request->validate([
        'nom' => 'required',
        'prix' => 'required|numeric',
        'quantite_en_stock' => 'required|integer',
        'categorie_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ]);

    $data = $request->except('image');

    if ($request->hasFile('image')) {
        // Optionnel : supprimer l’ancienne image
        if ($produit->image) {
            Storage::disk('public')->delete($produit->image);
        }

        $imagePath = $request->file('image')->store('images', 'public');
        $data['image'] = $imagePath;
    }

    $produit->update($data);

    return redirect()->route('admin.produits.index')->with('success', 'Produit mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produit = Produits::findOrFail($id);
        $produit->delete();
        return redirect()->route('admin.produits.index')->with('success', 'Produit supprimé.');
    }
}
