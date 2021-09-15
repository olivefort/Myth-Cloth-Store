<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    public function produits() {
        return $this->hasMany('\App\Produit');
    }

    protected $fillable = [
        'nom','image',
    ];
}
