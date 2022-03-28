@extends('layouts.base')

@section('title', 'Kinari - Sushi Bar')

@section('idBody', 'pagina')

@section('header')
    <nav class="navbar navbar-expand-lg navbar-black bg-black">
    <img src="/img/logo-icon-cut.png" class="img-fluid" alt="" width="150" >
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
                <li><a class="dropdown-item" href="#">Iniciar Sesion</a></li>
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
@endsection

@section('content')
    <div class="container">
        <div class="box">
            <h3>Hola Chun</h3>
        </div>
    </div>
@endsection