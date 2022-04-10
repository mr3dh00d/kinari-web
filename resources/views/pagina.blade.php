@extends('layouts.base')

@section('title', 'Kinari - Sushi Bar')

@section('idBody', 'pagina')

@section('header')
    <nav class="navbar navbar-expand-lg navbar-black bg-black">
    <img src="/img/logo_sushi.jpg" class="img-fluid" alt="" width="150" >
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"> 
            <a class="nav-link active" aria-current="page" href="#"><img src="/img/campana_blanca.png" class="img-fluid" alt="" width="40"> Menú</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#"><img src="/img/local_blanco.png" class="img-fluid" alt="" width="40">Local</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cuenta
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Iniciar Sesión</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Registrarse</a></li>
            </ul>
        </ul>
        <form class="d-flex" >
            <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Buscar...">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
        </div>
    </div>
    </nav>

|@section('content')
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
<div class="container_footer mt-5">
  <div class="container">
    <footer class="row py-2">
      <div class="col-auto">
        <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
          <img src="/img/logo_sushi.jpg" class="img-fluid" alt="" width="250" >
        </a>
      </div>
      <div class="col my-auto">
        <h5>Contacto</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><img src="/img/Instagram_bl.png" class="img-fluid" width="40"><a href="#" class="nav-link p-0 text-muted d-inline">  @kinari.sushi</a></li>
          <li class="nav-item mb-2"><img src="/img/whatsapp_bl.png" class="img-fluid" width="40"><a href="#" class="nav-link p-0 text-muted d-inline"> +569--------</a></li>
      </div>
    </footer>
  </div>
</div>
@endsection
