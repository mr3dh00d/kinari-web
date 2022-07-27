@extends('layouts.base')

@section('title', 'Kinari - Sushi Bar')

@section('idBody', 'register')

@section('header')
    <header>
        @include('website.elements.navbar')
    </header>
@endsection

@section('content')
    <div id="content-wrap">
        <div id="registro" class="container my-3">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 align-self-center text-center">
                    <h2>Bienvenido a <em class="ff-kaushan">Kinari</em></h2>
                    <img src="/img/logo.png" class="img-fluid" width="250px" alt="">
                </div>
                <div class="col-12 col-lg-6 align-content-center">
                    <h3>Registrate</h3>
                    @isset($mensaje)
                        <div class="alert alert-success text center" role="alert">{{$mensaje}}</div>
                    @endisset
                    <form method="POST" action="/guardarUsuario">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">Nombre y Apellido</label>
                          <input type="text" placeholder="ej: Juan Marchant" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                          @error('name')
                            <div class="invalid-feedback db-block">
                                {{$message}}
                            </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" placeholder="ej: 9 **** ****" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{old('telefono')}}">
                            @error('telefono')
                            <div class="invalid-feedback db-block">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" placeholder="ej: example@gmail.com" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                            @error('email')
                            <div class="invalid-feedback db-block">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                            <div class="invalid-feedback db-block">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirme Contraseña</label>
                            <input type="password" class="form-control @error('pass_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                            @error('pass_confirmation')
                            <div class="invalid-feedback db-block">
                                {{$message}}
                            </div>
                            @enderror
                          </div>
                          <div><h6>¿Ya tienes una cuenta? <a class="link-danger" href="/acceso">Ingresa aqui</a></h6></div>
                        <button type="submit" class="btn btn-outline-danger">Registrar</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <footer>
        @include('website.elements.footer')
    </footer>
@endsection