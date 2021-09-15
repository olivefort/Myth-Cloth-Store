<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;


class PanierController extends Controller
{
    public function index(){
        $userId = auth()->user()->id;
        $panier = \Cart::getContent();
        
        return view('panier.index', compact('panier'));
        //petit souci ici avec ce système qui marche très bien quand on est connecté... Mais impossible de se déconecter et si pas connecté message d'erreur (marche avec Providers/ComposeServiceProvider Ligne27 et Controllers/ViewComposer/MenuComposer Ligne 7 et 8)
        //return view('panier.index');
    }

    public function add($id = null){
        if ( $id != null){
            $produit = Produit::findOrFail($id);
            $userId = auth()->user()->id; 
            \Cart::session($userId)->add(array(
                'id' => $produit->id, 
                'name' => $produit->nom,
                'price' => $produit->prix,
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $produit->avatar,
            ));

            // dd(\Cart::session($userId)->getContent() );
            return redirect()->route('panier.index');
        }
    }

    public function remove($id = null){
        if ( $id != null){
            $userId = auth()->user()->id;
            \Cart::session($userId)->remove($id);
            return redirect()->route('panier.index');
            }
    }

    public function destroy($id = null){
        $userId = auth()->user()->id;
        \Cart::session($userId)->clear();
        return redirect()->route('home');
    }

    public function updateMoins($id = null){
        if ( $id != null){
            $userId = auth()->user()->id;
            // $ligne = \Cart::session($userId)->get($id);
            // $ligne->quantity++;
            \Cart::session($userId)->update($id,[
                'quantity' => -1
            ]);

            return redirect()->route('panier.index');
        }

    }

    public function updatePlus($id = null){
        if ( $id != null){
            $userId = auth()->user()->id;
            // $ligne = \Cart::session($userId)->get($id);
            // $ligne->quantity++;
            \Cart::session($userId)->update($id,[
                'quantity' => 1
            ]);

            return redirect()->route('panier.index');
        }

    }

  

}
