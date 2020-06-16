<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
</head>

<h1 style="text-align:center">
   {{ Auth::user()->name }} {{ Auth::user()->prenom}}
</h1>


<BR> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size:24px;">Mes commandes</div>
                <BR>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach (Auth()->user()->orders as $order)
                        <div class="card mb-3">
                            <div class="card-header" style="text-align:center;font-size:20px;">
                                Commande passée le {{ Carbon\Carbon::parse($order->payment_created_at)->format('d/m/Y à H:i')}} d'un montant de <strong>{{ getPrice($order->amount) }}</strong>
                            </div>
                            <div class="card-body">
                                <h3>Liste des produits</h3>
                                @foreach (unserialize($order->products) as $product)
                                    <div>Nom du produit: {{ $product[0] }}</div>
                                    <div>Prix: {{ getPrice($product[1]) }}</div>
                                    <div>Quantité: {{ $product[2] }}</div>
                                @endforeach
                                <br>
                               
                            </div>
                          
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


</html>