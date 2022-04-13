@extends('layouts.base')

@section('title', 'Kinari - Sushi Bar')

@section('idBody', 'home')

@section('header')
  <header>
    @include('elements.navbar')
  </header>
@endsection

@section('content')
  <div class="container my-3 home-content">
    <div class="row">
      <div id="carouselHome" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner d-flex align-items-center">
          <div class="carousel-item active">
            <img src="https://cdn.pixabay.com/photo/2017/10/16/09/00/sushi-2856545_960_720.jpg" class="img-fluid" alt="">
          </div>
          <div class="carousel-item">
            <img src="https://cdn.pixabay.com/photo/2017/10/15/11/41/sushi-2853382_960_720.jpg" class="img-fluid" alt="">
          </div>
          <div class="carousel-item">
            <img src="https://cdn.pixabay.com/photo/2020/04/04/15/07/sushi-5002639_960_720.jpg" class="img-fluid" alt="">
          </div>
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

    <div class="row py-1">
      <div class="col text-center ff-kaushan">
        <h2>¡Conoce nuestra carta!</h2>
      </div>
    </div>

    <div class="row carta">
      <div class="col-12 col-md-6 col-xl-4 py-3">
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
      </div>
    </div>

  </div>
@endsection

@section('footer')
  @include('elements.footer')
@endsection
