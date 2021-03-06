@extends('layouts.base')

@section('title', 'Kinari - Sushi Bar')

@section('idBody', 'carta')

@section('header')
    <header>
        @include('website.elements.navbar')
    </header>
@endsection

@section('content')
    <div class="container my-sm-3">

      <div id="menu" class="row align-items-center text-center flex-nowrap py-1 ">
        @foreach ($secciones->sortBy('orden') as $seccion)
          @if (count($seccion->productos) > 0)
            <a class="col-md category-name py-2 mx-2" href="#{{$seccion->id}}">
              {{$seccion->nombre}}
            </a>    
          @endif
        @endforeach
      </div>


      <div id="productos" class="row px-2 pb-3">
        <div class="col">
          @foreach ($secciones->sortBy('orden') as $seccion)
            @if (count($seccion->productos) > 0)
              <div id="{{$seccion->id}}" class="row">
                <div class="col-12 section-tittle ff-kaushan py-2">
                  <div class="row">
                    <div class="col-auto"><h2>{{$seccion->nombre}}</h2></div>
                    <div class="col m-auto"><div class="line"></div></div>
                  </div>
                </div>
                <div class="col-12 section-content">
                  <div class="row row-cols-2 row-cols-lg-3 gy-2">
                    @foreach ($seccion->productos->sortBy('orden') as $producto)
                      <div class="col">
                        <div class="card h-100">
                          <img class="estilo-img" src="{{$producto->imagen->ruta}}" class="card-img-top" alt="{{$producto->imagen->descripcion}}">
                          <div class="card-body">
                            <h5 class="card-title">{{$producto->nombre}}</h5>
                            <p class="card-text">{{$producto->descripcion}}</p>
                            <div class="product-price ff-kaushan">${{number_format($producto->precio, 0, ',', '.')}}</div>
                          </div>
                        </div>
                      </div>    
                    @endforeach
                  </div>
                </div>
              </div>    
            @endif
          @endforeach
        </div>
      </div>
    </div>
@endsection

@section('footer')
    @include('website.elements.footer')
@endsection