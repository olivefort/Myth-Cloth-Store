@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col s4 text-center">
        <h1 class="hometitle">Bienvenue sur Myth Cloth Shop</h1>
        <h2 class="subtitle">La boutique numéro 1 des myth cloth de Saint Seiya</h2>
    </div>
</div>

<div class="allrayon">
@foreach($rayons as $rayon)
    <div class="rayonunit">
        <h3>{{ $rayon->nom }}</h3>
        <a href="{{ route('rayon.show', $rayon->id) }}">
            <img class="rayimg" style="width: 100%" src="images/{{ $rayon->image }}">
        </a>
    </div>
    @endforeach
</div>
@endsection  


