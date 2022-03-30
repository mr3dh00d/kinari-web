@extends('layouts.base')

@section('title', 'Ingreso de Administrador')

@section('idBody', 'adminSignin')
@section('classBody', 'text-center')

@section('content')
<main class="form-signin">
    <form>
      <img class="mb-4 img-logo" src="/img/logo.png" alt="">
  
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Correo</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Contraseña</label>
      </div>
      <button class="w-100 btn btn-lg btn-signin" type="submit">Ingresa</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>  
@endsection