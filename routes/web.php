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

//Route::get('pdf','HomeController@gen');


Route::get('/invoice', function () {
    //return view('invoice');
    $pdf = PDF::loadView('invoice');
    return $pdf->download('invoice.pdf');
})->name('cadr.invoice');




Route::get('/ctn', function () {
    return view('template.ctn');
});

/*product routes */
Route::get('/menu',"ProduitController@viewproduct");
Route::get('/index',"ProduitController@index")->name('template.index');
Route::get('/about/{nom}', 'ProduitController@show')->name('template.about');
Route::get('/search', 'ProduitController@search')->name('template.search');



/* Cart Routes */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/panier', 'CartController@index')->name('cart.index');
    Route::post('/panier/ajouter', 'CartController@store')->name('cart.store');
    Route::delete('/panier/{rowId}', 'CartController@destroy')->name('cart.destroy');
});
//vider pannier

Route::get('/videpanier', function () {
    Cart::destroy();
});


/* Checkout Routes */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/paiement', 'CheckoutController@index')->name('checkout.index');
    Route::post('/paiement', 'CheckoutController@store')->name('checkout.store');
    Route::get('/merci', 'CheckoutController@thankYou')->name('checkout.thankYou');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

