@extends('layouts.master')

@section('content')

<div class="col-md-9" style="margin-top:30px;">
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
       <div class="col p-4 d-flex flex-column position-static">
          <!--<strong class="d-inline-block mb-2 text-success">Catégory : {{ $product->category_id }}</strong>
            --><h3 class="mb-0">{{ $product->nom }}</h3>
               <p class="mb-1 text-muted">{{ $product->created_at->format('d/m/Y') }}</p>
                <br> <br>
             <strong class="mb-auto font-weight-normal text-secondary" style="font-size:20px;">{{ $product->getPrice() }}</strong>
             <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}"> <br>
                    <button type="submit" class="btn btn-dark">Ajouter au panier</button>
             </form>
        </div>
        <div class="col-auto d-none d-lg-block">
                <img src="{{ $product->imgPath }}" alt="">
        </div>

    </div>
</div>
@endsection
