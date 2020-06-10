@extends('layouts.master')

@section('content')

<div class="Delicious_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-50">
                        <h3>Liste de produits et formules </h3>
                    </div>
                </div>
            </div>
            <div class="tablist_menu">
                    <div class="row">
                            <div class="col-xl-12">
                                    <ul class="nav justify-content-center" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                                                  <div class="single_menu text-center">
                                                      <div class="icon">
                                                          <i class="flaticon-lunch"></i>
                                                      </div>
                                                        <h4>Pizza </h4>
                                                  </div>
                                              </a>
                                            </li>

                                            <li class="nav-item">
                                              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                                                    <div class="single_menu text-center">
                                                            <div class="icon">
                                                                <i class="flaticon-food"></i>
                                                            </div>
                                                            <h4> Salades </h4>
                                                        </div>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                                                    <div class="single_menu text-center">
                                                            <div class="icon">
                                                                <i class="flaticon-kitchen"></i>
                                                            </div>
                                                            <h4>Boissons</h4>
                                                        </div>
                                                </a>
                                            </li>
                                           
                                    </ul>
                            </div>
                        </div>
            </div>

            <div class="tab-content" id="pills-tabContent">
                 <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                
                
                 @foreach($pizzas as $pizza)

                      <div class="row">
                        
                      <div class="col-md-9">
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-550 position-relative">
                          <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-success">{{ $pizza->nomCat }} </strong>
                            <h3 class="mb-0">{{ $pizza->nom }}</h3>
                            <p class="mb-1 text-muted">{{ $pizza->created_at }}</p>
                            <strong class="mb-auto font-weight-normal text-secondary">{{ $pizza->prix }} DH</strong>
                              <a href="{{ url('about', $pizza->nom) }}" class="stretched-link btn btn-info">Voir l'article</a>
                          </div>
                          <div class="col-auto d-none d-lg-block" style="margin-top:15px;margin-left:18px;">
                            <img src="{{ $pizza->imgPath }}" alt="">
                          </div>
                        </div>
                      </div>
                        
                      </div>
                      @endforeach
                      </div>

          
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            @foreach($salades as $salade)

             <div class="row">
               
             <div class="col-md-9">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-550 position-relative">
                  <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-success">{{ $salade->nomCat }} </strong>
                    <h3 class="mb-0">{{ $salade->nom }}</h3>
                    <p class="mb-1 text-muted">{{ $salade->created_at }}</p>
                    <strong class="mb-auto font-weight-normal text-secondary">{{ $salade->prix }} DH</strong>
                      <a href="{{ url('about', $salade->nom) }}" class="stretched-link btn btn-info">Voir l'article</a>
                  </div>
                  <div class="col-auto d-none d-lg-block" style="margin-top:15px;margin-left:18px;">
                    <img src="{{ $salade->imgPath }}" alt="">
                  </div>
                </div>
              </div>
               
             </div>
            @endforeach
          </div>


            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                
             @foreach($boissons as $boisson)

             <div class="row">
               
             <div class="col-md-9">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-550 position-relative">
                  <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-success">{{ $boisson->nomCat }} </strong>
                    <h3 class="mb-0">{{ $boisson->nom }}</h3>
                    <p class="mb-1 text-muted">{{ $boisson->created_at }}</p>
                    <strong class="mb-auto font-weight-normal text-secondary">{{ $boisson->prix }} DH</strong>
                      <a href="{{ url('about', $boisson->nom) }}" class="stretched-link btn btn-info">Voir l'article</a>
                  </div>
                  <div class="col-auto d-none d-lg-block" style="margin-top:15px;margin-left:18px;">
                    <img src="{{ $boisson->imgPath }}" alt="">
                  </div>
                </div>
              </div>
               
             </div>
            @endforeach
          </div>
        
            </div>
        </div>
    </div>

@endsection
