@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col s4 text-center">
        <h3 class="header">{{ $produit->nom }}</h3>
    </div>
</div>
<div class="fig">
    <img class="prodimg" style="width: 50%" src="../images/{{ $produit->avatar }}">
    <div class="prodvers"> Version : {{ $produit->version }}</div>
    <div class="prodprice">Prix : {{ $produit->prix }} Euros</div>
    <a class="ajout" href="{{ route('panier.add',['id'=> $produit->id])}}">Ajouter au panier</a>
    <p class="footpan"><a href="{{ route('rayon.show', ['id' => $produit->rayon_id ])}}">Retour au rayon</a></p>
</div>

@endsection