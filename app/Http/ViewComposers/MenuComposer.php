<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use Auth;

Class MenuComposer{
    function compose(View $view){
        if(Auth::check()) {
            $view->with('panier', \Cart::session(auth()->user()->id)->getContent());
        }
    }
}