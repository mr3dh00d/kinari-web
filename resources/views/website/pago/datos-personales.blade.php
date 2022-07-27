@extends('layouts.base')

@section('title', 'Kinari - Sushi Bar')

@section('idBody', 'select-direccion')

@section('header')
  <header>
    @include('website.elements.navbar')
  </header>
@endsection

@section('content')
<div id="content-wrap">
  <div id="datos-personales" class="container my-3">
    <div class="row">
      <div class="col text-center ff-kaushan">
        <h1>Datos personales</h1>
      </div>
    </div>
    <div class="row py-2">
      <form action="" method="POST">
        @error('message')
        <div class="alert alert-danger text-center" role="alert" style="border-radius: 0">
          {{$message}}
        </div>        
        @enderror
        @csrf
        <div class="form-floating @error('nombre') is-invalid @enderror mb-3">
          <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Juan" value="{{old('nombre')}}">
          <label for="nombre">Nombre</label>
        </div>
        <div class="form-floating @error('apellido') is-invalid @enderror mb-3">
          <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" placeholder="Marchant" value="{{old('apellido')}}">
          <label for="apellido">Apellido</label>
        </div>
        <div class="form-floating @error('correo') is-invalid @enderror mb-3">
          <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" placeholder="Correo" value="{{old('correo')}}">
          <label for="correo">Correo electronico</label>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">+56</span>
          <div class="form-floating @error('celular') is-invalid @enderror">
            <input type="text" class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular" placeholder="7777 7777" value="{{old('celular')}}">
            <label for="celular">Celular</label>
          </div>
        </div>
        <div class="text-center ff-kaushan direccion-title">
          <p>Dirección</p>
        </div>
        <div class="form-floating @error('calle') is-invalid @enderror mb-3">
          <input type="text" class="form-control @error('calle') is-invalid @enderror" id="calle" name="calle" placeholder="Teatinos" value="{{old('calle')}}">
          <label for="calle">Calle</label>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">#</span>
          <div class="form-floating @error('numero') is-invalid @enderror">
            <input type="text" class="form-control @error('numero') is-invalid @enderror" id="numero" name="numero" placeholder="242" value="{{old('numero')}}">
            <label for="numero">Número</label>
          </div>
        </div>
        <div class="form-floating @error('comuna') is-invalid @enderror mb-3">
          <input type="text" class="form-control @error('comuna') is-invalid @enderror" id="comuna" name="comuna" placeholder="Santiago" value="{{old('comuna')}}">
          <label for="comuna">Comuna</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="departamento" name="departamento" placeholder="opcional" value="{{old('departamento')}}">
          <label for="departamento">{{"Departamento o Casa (Opcional)"}}</label>
        </div>
        <div class="buttons row gy-2 px-3 ff-kaushan">
          <a class="col-12 col-lg text-center btn-back me-lg-2" href="{{url()->previous() }}">
            Volver
          </a>
          <button type="submit" class="col-12 col-lg text-center btn-pagar ms-lg-2" >
            Continuar
          </button>
        </div>
      </form>
      <div id="map"></div>
    </div>
  </div>
</div>
@endsection

@section('footer')
  @include('website.elements.footer')
@endsection
