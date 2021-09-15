<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'nom', 'avatar', 'version', 'prix', 'rayon_id', 'quantite',
    ];
}
