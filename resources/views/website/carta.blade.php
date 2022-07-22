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
                  <button id="search_button" class="input-group-text px-5 search-btn" type="submit">Buscar</button>
                </div>
              </form>
            </div>
            <div class="col-12 section-content">
              <div id="espacio" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-2"></div>
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
                  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-2">
                    @foreach ($seccion->productos as $producto)
                      <div class="col">
                        <div class="card h-100 d-none d-md-block">
                          <img class="estilo-img card-img-top" src="{{$producto->imagen->ruta}}" alt="{{$producto->imagen->descripcion}}">
                          <div class="card-body">
                            <h5 class="card-title">{{$producto->nombre}}</h5>
                            <p class="card-text">{{$producto->descripcion}}</p>
                            <div class="product-price ff-kaushan">${{number_format($producto->precio, 0, ',', '.')}}</div>
                          </div>
                        </div>
                        <div class="card d-md-none">
                          <div class="row g-0">
                            <div class="col-6">
                              <img class="estilo-img w-100 h-100" src="{{$producto->imagen->ruta}}" alt="{{$producto->imagen->descripcion}}">
                            </div>
                            <div class="col">
                              <div class="card-body h-100">
                                <h5 class="card-title align-middle">{{$producto->nombre}}</h5>
                                <p class="card-text">{{$producto->descripcion}}</p>
                                <div class="product-price ff-kaushan">${{number_format($producto->precio, 0, ',', '.')}}</div>
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
@endsection

@section('footer')
    @include('website.elements.footer')
@endsection