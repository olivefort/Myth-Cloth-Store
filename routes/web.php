<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('rayon/{id}', 'RayonsController@show')->name('rayon.show');
Route::resource('produit', 'ProduitsController')->except('destroy');
Route::resource('user', 'UsersController')->except('destroy');
Route::get('home', 'HomeController@index')->name('home');







Route::group(['middleware' => ['auth']], function() {

    Route::prefix('panier')->group(function(){
        Route::get('','PanierController@index')->name('panier.index');
        Route::get('/add/{id?}','PanierController@add')->name('panier.add');
        Route::get('/remove/{id?}','PanierController@remove')->name('panier.remove');
        Route::get('/updatePlus/{id?}','PanierController@updatePlus')->name('panier.updatePlus');
        Route::get('/updateMoins/{id?}','PanierController@updateMoins')->name('panier.updateMoins');
        Route::get('/destroy','PanierController@destroy')->name('panier.destroy');
        Route::post('/store', 'StripeController@store')->name('stripe.store');
       
    });

    // Route::get('commande','CommandeController@show')->name('commande.show');

});


