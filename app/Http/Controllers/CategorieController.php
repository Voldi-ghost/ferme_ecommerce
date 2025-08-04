<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories; // Assuming you have a Categories model

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Categories();
        return view('admin.categories.create_categorie', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate(['libelle' => 'required|string']);
        Categories::create($request->all());
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie ajoutée');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $category)
    {
        return view('admin.categories.create_categorie', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $category)
    {
        $request->validate(['libelle' => 'required|string']);
        $category->update($request->all());
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Categories::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie supprimée');
    }
}
