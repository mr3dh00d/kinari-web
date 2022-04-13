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
    <div class="row py-1">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" style="background-image: url('https://cdn.pixabay.com/photo/2017/10/16/09/00/sushi-2856545_960_720.jpg')"></div>
          <div class="carousel-item" style="background-image: url('https://cdn.pixabay.com/photo/2017/10/15/11/41/sushi-2853382_960_720.jpg')"></div>
          <div class="carousel-item" style="background-image: url('https://cdn.pixabay.com/photo/2020/04/04/15/07/sushi-5002639_960_720.jpg')"></div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
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
  </div>
@endsection

@section('footer')
  @include('elements.footer')
@endsection
