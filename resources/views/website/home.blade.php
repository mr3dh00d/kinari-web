@extends('layouts.base')

@section('title', 'Kinari - Sushi Bar')

@section('idBody', 'home')

@section('metatags')
  <meta name="title" content="Kinari - Sushi Bar | El mejor Sushi de Santiago">
  <meta name="author" content="Team Bocchi" />
  <meta name="description" content="Garantizamos la entrega de nuestros productos de acuerdo a la descripción de nuestro menu. Todas nuestras promociones son por tiempo limitado y varíaran los precios sin previo aviso.">
  <meta name="keywords" content="venta oline sushi, sushi chile, kinari sushi bar, kianrisushibar, kinari sushibar, kinari sushi, kianri bar, sushi kinari bar, sushi, venta online, kinari sushi lovers, sushi lovers, sushi kinari lovers">
  <meta name="robots" content="index,follow">
@endsection

@section('header')
  <header>
    @include('website.elements.navbar')
  </header>
@endsection

@section('content')
  <div id="content-wrap">
    
    <div class="container my-3 home-content">
        <div class="row">
          <div id="carouselHome" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner d-flex align-items-center">
              @foreach ($carruseles as $key => $carrusel)
                <div class="carousel-item @if($key == 0) active @endif">
                  <img src="{{$carrusel->ruta}}" class="img-fluid" alt="{{$carrusel->descripcion}}">
                </div>  
              @endforeach
              </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselHome" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselHome" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
  
      <div class="row py-3 home-title">
        <div class="col text-center ff-kaushan">
          <h2>
            <a href="/carta">
              ¡Conoce nuestra carta!
            </a>
          </h2>
        </div>
      </div>
  
      <div class="row carta row-cols-1 row-cols-md-2 row-cols-md-3 g-3">
        @foreach ($destacados as $producto)
          <div class="col">
            <a class="card" href="/carta#{{$producto->seccion->id}}">
              <div class="card-img-top d-flex align-items-center">
                <img src="{{$producto->imagen->ruta}}" class="img-fluid" alt="{{$producto->imagen->descripcion}}">
              </div>
              <div class="card-body d-flex align-items-center text-center">
                <p class="card-text">{{$producto->nombre}}</p>
              </div>
            </a>
          </div>
        @endforeach
  </div>

      {{-- <div class="col-12 col-md-6 col-xl-4 py-3">
        <div class="card">
          <div class="card-img-top d-flex align-items-center">
            <img src="https://cdn.pixabay.com/photo/2018/05/19/05/05/empanadas-3412786_960_720.jpg" class="img-fluid">
          </div>
          <div class="card-body d-flex align-items-center">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-4 py-3">
        <div class="card">
          <div class="card-img-top d-flex align-items-center">
            <img src="https://cdn.pixabay.com/photo/2016/08/31/16/25/sushi-1634013_960_720.jpg" class="img-fluid">
          </div>
          <div class="card-body d-flex align-items-center">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-4 py-3">
        <div class="card">
          <div class="card-img-top d-flex align-items-center">
            <img src="https://cdn.pixabay.com/photo/2016/04/26/03/55/salmon-1353598_960_720.jpg" class="img-fluid">
          </div>
          <div class="card-body d-flex align-items-center">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-4 py-3">
        <div class="card">
          <div class="card-img-top d-flex align-items-center">
            <img src="https://cdn.pixabay.com/photo/2017/10/10/11/37/japan-2836904_960_720.jpg" class="img-fluid">
          </div>
          <div class="card-body d-flex align-items-center">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-4 py-3">
        <div class="card">
          <div class="card-img-top d-flex align-items-center">
            <img src="https://cdn.pixabay.com/photo/2015/01/12/00/16/sushi-596930_960_720.jpg" class="img-fluid">
          </div>
          <div class="card-body d-flex align-items-center">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-4 py-3">
        <div class="card">
          <div class="card-img-top d-flex align-items-center">
            <img src="https://cdn.pixabay.com/photo/2017/01/22/17/13/sushi-2000239_960_720.jpg" class="img-fluid">
          </div>
          <div class="card-body d-flex align-items-center">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div> --}}
    </div>

  </div>
@endsection

@section('footer')
  @include('website.elements.footer')
@endsection
