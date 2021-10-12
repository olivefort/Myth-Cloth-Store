<div class="prod">
   
    <div class="prodname">{{ $produit->nom }} </div>
    <a href="{{ route('produit.show', ['produit' => $produit->id ])}}">
        <img class="prodimg" style="width: 100%" src="../images/{{ $produit->avatar }}">
    </a>
    <div class="prodvers">{{ $produit->version }}</div>
    <div class="prodprice">{{ $produit->prix }} Euros</div>
    
</div>