@extends('layouts.base')

@section('title', 'Ingreso de Administrador')

@section('idBody', 'adminSignin')
@section('classBody', 'text-center')

@section('content')
<main class="form-signin">
    <form method="POST" action="/authenticate">
      @csrf
      <img class="mb-4 img-logo" src="/img/logo.png" alt="">
      @error('email')
        <div class="invalid-feedback d-block">
          {{$message}}
        </div>
      @enderror
      <div class="form-floating">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" required value="{{old('email')}}">
        <label for="floatingInput">Correo</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control @error('email') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
        <label for="floatingPassword">Contraseña</label>
      </div>
      <button class="w-100 btn btn-lg btn-signin" type="submit">Ingresa</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>  
@endsection