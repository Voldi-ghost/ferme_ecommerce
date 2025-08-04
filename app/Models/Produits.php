<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    protected $fillable = ['nom', 'description', 'prix', 'quantite_en_stock', 'categorie_id', 'image'];

    public function categorie()
    {
        return $this->belongsTo(Categories::class);
    }

    public function scopeRecent(Builder $builder)
    {
        return $builder->orderBy('created_at', 'desc');
    }
}
