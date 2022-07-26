@extends('layouts.base')

@section('title', 'Kinari - Sushi Bar')

@section('metatags')
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('idBody', 'carta')

@section('header')
    <header>
        @include('website.elements.navbar')
    </header>
@endsection

@section('content')
    <div id="content-wrap">
      <div class="container my-sm-3">
        <div id="menu" class="row align-items-center text-center flex-nowrap py-1 ">
          <a class="category-name py-2 mx-2" href="#busqueda">
            <i class="fa fa-search"></i>
          </a>
          @foreach ($secciones as $seccion)
              <a class="col-auto category-name py-2 mx-2" href="#{{$seccion->id}}">
                {{$seccion->nombre}}
              </a>
          @endforeach
        </div>
  
  
        <div id="productos" class="row px-2 pb-3">
          <div class="col">
            <div id="busqueda" class="row">
              <div class="col-12 section-tittle ff-kaushan py-2">
                <div class="row">
                  <div class="col-auto"><h2>¿Qué producto buscas?</h2></div>
                  <div class="col m-auto"><div class="line"></div></div>
                </div>
              </div>
              <div class="mb-3 col-12">
                <form id="busq_form" class="row">
                  <div class="input-group mb-3">
                    <input id="query_search" class="form-control" type="text" placeholder="¿Qué estas buscando?" name="search">
                    <span id="clear-search" class="d-none fa-solid fa-xmark"></span>
                    <button id="search_button" class="input-group-text px-5 search-btn" type="submit">Buscar</button>
                  </div>
                </form>
              </div>
              <div class="col-12 section-content">
                <div id="espacio" class="row row-cols-1 row-cols-md-3 row-cols-lg-4 gy-2">
                </div>
              </div>
            </div>
            @foreach ($secciones as $seccion)
                <div id="{{$seccion->id}}" class="row">
                  <div class="col-12 section-tittle ff-kaushan py-2">
                    <div class="row">
                      <div class="col-auto"><h2>{{$seccion->nombre}}</h2></div>
                      <div class="col m-auto"><div class="line"></div></div>
                    </div>
                  </div>
                  <div class="col-12 section-content">
                    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 gy-2">
                      @foreach ($seccion->productos as $producto)
                        <div class="col">
                          <div class="card">
                            <div class="row g-0">
                              <div class="col-6 col-md-12">
                                <img class="estilo-img w-100 h-100" src="{{$producto->imagen->ruta}}" alt="{{$producto->imagen->descripcion}}">
                              </div>
                              <div class="col-6 col-md-12">
                                <div class="card-body h-100">
                                  <h5 class="card-title align-middle">{{$producto->nombre}}</h5>
                                  <div class="d-flex {{Str::length($producto->descripcion) > 15 ? 'descripcion': ''}}">
                                    <p class="card-text mb-2">
                                      {{Str::substr($producto->descripcion, 0, 30)}}
                                    </p>
                                  </div>
                                  <div class="product-price ff-kaushan pointer" producto-id="{{$producto->id}}">${{number_format($producto->precio, 0, ',', '.')}}</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>    
                      @endforeach
                    </div>
                  </div>
                </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    
    <button id="btn-carrito" class="btn-carrito btn">
      <i class="fa-solid fa-cart-shopping"></i>
    </button>

@endsection

@section('footer')
    @include('website.elements.modal-producto')
    @include('website.elements.modal-carrito')
    @include('website.elements.footer')
@endsection