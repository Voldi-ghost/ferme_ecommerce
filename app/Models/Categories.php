<?php

namespace App\Models;
use App\Models\Produit;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['libelle'];
    public function produits()
    {
        return $this->hasMany(Produits::class);
    }
}
