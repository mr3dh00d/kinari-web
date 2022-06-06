@extends('layouts.panel')

@section('metatags')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('subcontent')
    <div class="container">
        <div class="row">
            <div class="col p-0">
                <h1>Configuración</h1>
            </div>
        </div>
        <div id="rootSuperUserManagement">

        </div>
        {{-- <div class="row" id="administradoresManagement">
            <div class="card rounded-0 container">
                <div class="card-header row">
                    <h4 class="m-auto col"><i class="fa-solid fa-user-tie"></i> Administradores</h4>
                    <button class="btn btn-primary btn-circle col-auto" type="button" data-bs-toggle="collapse" data-bs-target="#form-admin" id="btn-add-admin">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
                <div class="card-body row">
                    <div class="collapse my-1 px-0 row g-2 form-super-user" id="form-admin">
                        <div class="col-12 form-floating">
                            <input type="text" class="form-control" id="administrador-nombre" placeholder="Juan Marchant">
                            <label for="administrador-nombre">Nombre</label>
                        </div>
                        <div class="col-12 form-floating">
                            <input type="email" class="form-control" id="administrador-correo" placeholder="name@example.com">
                            <label for="administrador-correo">Correo</label>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="administrador-password" placeholder="Password">
                                <label for="administrador-password">Contraseña</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="administrador-repeat-password" placeholder="Password">
                                <label for="administrador-repeat-password">Repetir contraseña</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 mx-auto d-grid">
                            <button class="btn btn-primary" type="button">Guardar</button>
                        </div>
                    </div>
                    <div class="col" id="col-administradores">
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="cajerosManagement"></div> --}}
    </div>
@endsection