@extends('layouts.base')

@section('title', 'Kinari - Sushi Bar')

@section('idBody', 'login')

@section('header')
    <header>
        @include('website.elements.navbar')
    </header>
@endsection

@section('content')
    <div class="container my-sm-3">
        <div class="row align-items-center">
            <div class="col align-self-center text-center">
                <h2>Bienvenido a <em class="ff-kaushan">Kinari</em></h2>
                <img src="/img/logo.png" class="img-fluid" width="250px" alt="">
            </div>
            <div class="col align-content-center" style="height: 23.4rem">
                <h3>Inicia Sesión</h3>
                @error('email')
                    <div class="alert alert-danger" role="alert"">
                        {{$message}}
                    </div>
                @enderror
                <form method="POST" action="/autenticacion">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" placeholder="ej: example@gmail.com" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Contraseña</label>
                      <input type="password" class="form-control @error('email') is-invalid @enderror" id="password" name="password">
                      <h6>¿No tienes una cuenta? <a class="link-danger" href="/registro">Registrate aqui</a></h6>
                    </div>
                    <button type="submit" class="btn btn-outline-danger">Ingresar</button>
                  </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <footer>
        @include('website.elements.footer')
    </footer>
@endsection

