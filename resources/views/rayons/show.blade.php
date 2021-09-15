@extends('layouts.app')

@section('content')

<div class="row">
    
    <div class="col s4 text-center">
        <h3 class="header">{{ $rayon->nom }}</h3>
        <p class="nbprod">Nombre de produits disponibles : {{ $rayon->produits()->count() }}</p><br>
    </div>
    

</div>
<div class="prodrayon">
    @foreach ($rayon->produits as $produit)
    <div class="rayonprod col s4">
        @include ('include.produit')
        <a class="voir" href="{{ route('produit.show', ['produit' => $produit->id ])}}">Voir</a>
    </div>
    @endforeach
</div>

<p class="footpan"><a href="{{ route('home', ['id' => $produit->rayon_id ])}}">Retour à l'acceuil</a></p>

@endsection
