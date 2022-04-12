@extends('layouts.base')

@section('title', 'Kinari - Sushi Bar')

@section('idBody', 'carta')

@section('header')
    <header>
        @include('elements.navbar', ['status' => 'complete'])
    </header>
@endsection

@section('content')
    <section>
        <div id="menu" class="container">
            <div class="row align-items-center">
                <div class="col-auto me-auto">
                    <button type="button" class="btn btn-outline-light">
                        <img src="/img/promo.png" alt="" width="50" class="d-inline-block align-text-center">
                        Promociones
                    </button>
                </div>
                <div class="col-auto me-auto">
                    <button type="button" class="btn btn-outline-light">
                        <img src="/img/sushi.png" alt="" width="50" class="d-inline-block align-text-center">
                        Sushi
                    </button>   
                </div>
                <div class="col-auto me-auto">
                    <button type="button" class="btn btn-outline-light">
                        <img src="/img/bebida.png" alt="" width="50" class="d-inline-block align-text-center">
                        Bebidas
                    </button>  
                </div>
                <div class="col-auto me-auto">
                    <button type="button" class="btn btn-outline-light">
                        <img src="/img/salsa.png" alt="" width="40" class="d-inline-block align-text-center">
                        Salsas
                    </button>  
                </div>
            </div>
        </div>
        <div id="productos" class="container">
            <div id="Promo" class="row middle section-tittle align-items-center">
                <div class="col-auto me-auto"><h2>Promociones</h2></div>
                <div class="col"><hr class="rounded"></div>
            </div>
            <div class="row middle align-items-center">
                <div class="col-auto me-auto">
                    <div class="card" style="width: 18rem;">
                        <img src="/img/Lima.jpg" class="card-img-top" alt="" style="width: 15rem;">
                        <div class="card-body">
                          <h5 class="card-title">Among Us Verde Claro</h5>
                            <p class="card-text">
                              Lima, a veces erróneamente llamado Verde Claro, es uno de los colores en Among Us. Lima está en la menor cantidad de material gráfico promocional de todos los colores disponibles.
                            </p>
                          <a href="#" class="btn btn-outline-secondary">SUS?</a>
                        </div>
                      </div>
                </div>
                <div class="col-auto me-auto">
                    <div class="card" style="width: 18rem;">
                        <img src="/img/Rojo.jpg" class="card-img-top" alt="" style="width: 15rem;">
                        <div class="card-body">
                          <h5 class="card-title">Among Us Rojo</h5>
                            <p class="card-text">
                                Rojo es uno de los colores en Among Us. Rojo es el color que se utiliza para el impostor en los carteles promocionales del juego.
                            </p>
                          <a href="#" class="btn btn-outline-secondary">SUS?</a>
                        </div>
                      </div>
                </div>
            </div>
            <div id="Sushi" class="row middle section-tittle align-items-center">
                <div class="col-auto me-auto"><h2>Sushi</h2></div>
                <div class="col"><hr class="rounded"></div>
            </div>
            <div class="row middle align-items-center">
                <div class="col-auto me-auto">
                    <div class="card" style="width: 18rem;">
                        <img src="/img/Naranja.jpg" class="card-img-top" alt="" style="width: 15rem;">
                        <div class="card-body">
                          <h5 class="card-title">Among Us Naranjo</h5>
                            <p class="card-text">
                                Naranja es uno de los colores en Among Us. En la billetera que se ve en las tareas Pasar tarjeta e Introducir id., hay una imagen de verde, naranja y Cian en una imagen que se asemeja a una familia.
                            </p>
                          <a href="#" class="btn btn-outline-secondary">SUS?</a>
                        </div>
                      </div>
                </div>
                <div class="col-auto me-auto">
                    <div class="card" style="width: 18rem;">
                        <img src="/img/Negro.jpg" class="card-img-top" alt="" style="width: 15rem;">
                        <div class="card-body">
                          <h5 class="card-title">Among Us Negro</h5>
                            <p class="card-text">
                                Negro es uno de los colores principales en Among us. Negro es el personaje utilizado para el icono de Sabotear.
                            </p>
                          <a href="#" class="btn btn-outline-secondary">SUS?</a>
                        </div>
                      </div>
                </div>
            </div>
            <div id="Bebidas" class="row middle section-tittle align-items-center">
                <div class="col-auto me-auto"><h2>Bebidas</h2></div>
                <div class="col"><hr class="rounded"></div>
            </div>
            <div class="row middle align-items-center">
                <div class="col-auto me-auto">
                    <div class="card" style="width: 18rem;">
                        <img src="/img/Morado.jpg" class="card-img-top" alt="" style="width: 15rem;">
                        <div class="card-body">
                          <h5 class="card-title">Among Us Morado</h5>
                            <p class="card-text">
                                Morado es uno de los colores en Among Us. Hubo un jam de animación con el tema Among Us llamado "The Purple Impostor", que fue presentado por Newgrounds y juzgado por el equipo de Innersloth.
                            </p>
                          <a href="#" class="btn btn-outline-secondary">SUS?</a>
                        </div>
                      </div>
                </div>
                <div class="col-auto me-auto">
                    <div class="card" style="width: 18rem;">
                        <img src="/img/Amarillo.jpg" class="card-img-top" alt="" style="width: 15rem;">
                        <div class="card-body">
                          <h5 class="card-title">Among Us Amarillo</h5>
                            <p class="card-text">
                                Amarillo es uno de los colores principales de Among Us. Este color representa a los jugadores en el mapa de Admin.
                            </p>
                          <a href="#" class="btn btn-outline-secondary">SUS?</a>
                        </div>
                      </div>
                </div>
            </div>
            <div id="Salsas" class="row middle section-tittle align-items-center">
                <div class="col-auto me-auto"><h2>Salsas</h2></div>
                <div class="col"><hr class="rounded"></div>
            </div>
            <div class="row middle align-items-center">
                <div class="col-auto me-auto">
                    <div class="card" style="width: 18rem;">
                        <img src="/img/Verde.jpg" class="card-img-top" alt="" style="width: 15rem;">
                        <div class="card-body">
                          <h5 class="card-title">Among Us Verde</h5>
                            <p class="card-text">
                                Verde es uno de los colores de Among Us. Verde era Un Impostor en uno de los carteles promocionales de Among Us.
                            </p>
                          <a href="#" class="btn btn-outline-secondary">SUS?</a>
                        </div>
                      </div>
                </div>
                <div class="col-auto me-auto">
                    <div class="card" style="width: 18rem;">
                        <img src="/img/Blanco.jpg" class="card-img-top" alt="" style="width: 15rem;">
                        <div class="card-body">
                          <h5 class="card-title">Among Us Blanco</h5>
                            <p class="card-text">
                                Blanco es uno de los colores en Among Us. Blanco se utiliza en todos los iconos destinados a representar juegos en línea. También se muestran usando un megáfono en la página de anuncios del juego.
                            </p>
                          <a href="#" class="btn btn-outline-secondary">SUS?</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
    @include('elements.footer')
@endsection