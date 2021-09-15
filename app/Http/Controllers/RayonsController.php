<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rayon;
use App\Produit;

class RayonsController extends Controller
{
    public function show($id) {
        $rayon = Rayon::findOrFail($id);
        // $produit = Produit::where('rayon_id','=',$id)->get()
        return view ('rayons.show', compact('rayon'));
        dd($rayon);
    }
}
