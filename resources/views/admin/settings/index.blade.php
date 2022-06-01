@extends('layouts.panel')

@section('metatags')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('subcontent')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Configuración</h1>
            </div>
        </div>
    </div>
@endsection