@extends('layouts.base')

@section('title', 'Kinari - Sushi Bar')

@section('idBody', 'pagina')

@section('header')
  <header>
    @include('elements.navbar')
  </header>
@endsection
@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/fonda_team_bocchi.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/milo wearing sushi.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/amogus.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <h2 class="texto_central text-center">¡Conoce nuestra carta!</h2>

  <div class="container">
  <div class="row">
    <div class="col">
        <div class="card">
            <img src="img/isaac.png" class="card-img-top" alt="...">
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img src="img/caballo.png" class="card-img-top" alt="...">
          </div>        
    </div>
    <div class="col">
        <div class="card">
            <img src="img/caballo.png" class="card-img-top" alt="...">
          </div>
    </div>
    <div class="col">
        <div class="card">
            <img src="img/caballo.png" class="card-img-top" alt="...">
          </div>                 
    </div>
  </div>
  <div class="row">
    <div class="col">
        <div class="card">
            <img src="img/isaac.png" class="card-img-top" alt="...">
        </div>
    </div>
    <div class="col">
        <div class="card">
            <img src="img/caballo.png" class="card-img-top" alt="...">
          </div>        
    </div>
    <div class="col">
        <div class="card">
            <img src="img/caballo.png" class="card-img-top" alt="...">
          </div>
    </div>
    <div class="col">
        <div class="card">
            <img src="img/caballo.png" class="card-img-top" alt="...">
          </div>                 
    </div>
  </div>
</div>
@endsection

@section('footer')
  @include('elements.footer')
@endsection
