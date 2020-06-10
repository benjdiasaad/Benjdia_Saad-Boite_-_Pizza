<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Formule;
use App\Models\Catproduit;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    


    public function index(){

    //    dd(Cart::content());
        /*$product = Produit::all();
        return view('template.index')->with('product', $product);
        */
        $pizzaProducts = DB::table('catproduits')
            ->join('produits', 'catproduits.id', '=', 'produits.category_id')
            ->where('catproduits.nomCat', 'Pizza')
            ->get();
        $saladesProducts = DB::table('catproduits')
            ->join('produits', 'catproduits.id', '=', 'produits.category_id')
            ->where('catproduits.nomCat', 'Salades')
            ->get();
        $boissonsProducts = DB::table('catproduits')
            ->join('produits', 'catproduits.id', '=', 'produits.category_id')
            ->where('catproduits.nomCat', 'Boissons')
            ->get();
        return view('template.index', ['pizzas' => $pizzaProducts, 'salades' => $saladesProducts, 'boissons' => $boissonsProducts]);

    }

    public function viewproduct(){
        $product=Produit::all();
        $formule = Formule::all();
        $comments = DB::table('clients')
        ->join('commentaires', 'clients.id', '=', 'commentaires.client_id')->get();
        return view('template.menu' ,compact(['product','formule','comments']));
    }

    public function show($nom)
    {
        /*$product = DB::table('catproduits')
            ->join('produits', 'catproduits.id', '=', 'produits.category_id')
            ->where('produits.nom', $nom)
            ->get();
       */ 
       $product = Produit::where('nom', $nom)->firstOrFail();

        return view('template.about')->with('product', $product);
    }

    public function search()
    {
        /*
        request()->validate([
            'q' => 'required|min:3'
        ]);
*/      
        $categorys = DB::table('catproduits')
        ->join('produits', 'catproduits.id', '=', 'produits.category_id')
        ->get();
       
        $q = request()->input('q');
        
        $products = Produit::where('nom', 'like', "%$q%")
                ->paginate(6);

          return view('template.search',['products' => $products, 'categorys' => $categorys]);
    }
    
}
