@extends('layouts.app')

@section('content')

<div class="row">
    
    <div class="col s4 text-center">
        <h3 class="header">PANIER</h3>
    </div>
</div>
@if(count($panier)>=1)
<div class="paniers">
    <div class="panier">
        <div class="nompanier">
            <p>Article</p>
        </div>
        <div class="prixpanier">
            <p>Prix</p>
        </div>
        <div class="quantpanier">
            <p>Quantitée</p>
        </div>
        <div class="total">
            <p>Total</p>
        </div>
        <div class="supp">
            <p>Supprimé</p>
        </div>
    </div>
    <div class="panier">
        @foreach ($panier as $produit)
            <!-- <div class="imgpanier">
                <img class="panimg" style="width: 30%" src="../images/{{ $produit->associatedModel }}">
            </div> -->
            <div class="nompanier">
                <p class="nommc">{{ $produit->name }}</p>
            </div>
            <!-- <div class="verspanier">
                <p>{{ $produit->associatedModel }}</p>
            </div> -->
            <div class="prixpanier">
                <p>{{ $produit->price }} Euros</p>
            </div>
            <div class="quantpanier">
                <div>
                    @if ($produit->quantity>1)
                        <a class="btnpanier" href="{{ route('panier.updateMoins', ['id' => $produit->id]) }}">-</a>
                    @else
                        <a class="btnpanier" style= "pointer-events: none";>&nbsp</a>
                    @endif
                </div>
                <p class="qtt">{{ $produit->quantity }}</p>
                <a class="btnpanier" href="{{ route('panier.updatePlus', ['id' => $produit->id]) }}">+</a>
            </div>
            <div class="total">
                    <p>{{Round($produit->quantity*$produit->price,2)}} Euros</p>
            </div>
            <p class="supx"><a class="sup" href="{{ route('panier.remove', ['id' => $produit->id]) }}">X</a></p>
        @endforeach
    </div>
    <div class="panier">
        <p class="quantpanier">Total Tout articles :</p>
        <p class="total">{{ round(\Cart::getTotal(),2) }} Euros</p>
    </div >
    
</div>

        

<form action="{{route('stripe.store')}}" method="POST">
    @csrf
    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="{{config('stripe.public_key')}}"
        data-amount={{Round(\Cart::getTotal()*100,0)}}
        data-name="{{ config('app.name') }}"
        data-description="Myth Cloth Store"
        data-image=""
        data-locale="auto"
        data-currency="eur">
    </script>
</form>
<script src="https://checkout.stripe.com/checkout.js"></script>

@else 
    <p class="empty">votre pannier est vide</p>
@endif

<div class="footpan">
    @if(count($panier)>=1)
    <a href="{{ route('produit.show', ['produit' => $produit->id ])}}">Retour à l'article</a>
    @endif
    <a href="{{ route('home')}}">Retour à l'accueil du site</a>
</div>

@endsection