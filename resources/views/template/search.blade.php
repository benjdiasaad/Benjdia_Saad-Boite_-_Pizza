@extends('layouts.master')

@section('content')
  @foreach ($products as $product)
    <div class="col-md-6">
      <div class="row no-gutters border rounded d-flex align-items-center flex-md-row mb-4 shadow-sm position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <small class="d-inline-block text-info mb-2">
            
          </small>
          <h5 class="mb-0">{{ $product->nom }}</h5>
          <p class="mb-3 text-muted">{{ $product->subtitle }}</p>
          <strong class="display-4 mb-4 text-secondary">{{ $product->getPrice() }}</strong>
          <a href="{{ route('template.about', $product->nom) }}" class="stretched-link btn btn-info"><i class="fa fa-location-arrow" aria-hidden="true"></i> Consulter le produit</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="{{ $product->imgPath }}" alt="">
        </div>
      </div>
    </div>
  @endforeach
  {{ $products->appends(request()->input())->links() }}
@endsection
