<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rayon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $rayons = Rayon::All();
        // $produit = Produit::where('rayon_id','=',$id)->get()
        return view ('home', compact('rayons'));
        // dd($rayon);
    }

    public function show($id) {
        // $rayon = Rayon::findOrFail($id);
        // $produit = Produit::where('rayon_id','=',$id)->get()
        // return view ('home', compact('home'));
        // dd($rayon);
    }
}
