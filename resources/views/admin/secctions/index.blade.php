@extends('layouts.panel')

@section('metatags')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('subcontent')
<div class="container mt-5 secciones" id="lista_sect">
    <div class="row mb-2">
        <div class="col">
            <h1>Secciones</h1> 
        </div>
        <div class="col-auto">
            <a href="secciones/create">
                <button type="button" class="btn btn-primary btn-circle">
                    <i class="fa-solid fa-plus"></i>
                  </button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if (count($secciones) > 0)
            <ul id="lista_secciones" class="list-group">
                @foreach ($secciones as $seccion)
                    <li class="row d-flex list-group-item align-items-center list-hover" data-id="{{$seccion->id}}">
                        <div class="col-auto">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                        <a href="/secciones/{{$seccion->id}}" class="col" >{{$seccion->nombre}}</a>
                        <div class="col-auto">
                            <a href="/secciones/{{$seccion->id}}/edit">
                                <button type="button" class="btn btn-green btn-circle btn-sm">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </a>
                        </div>
                        <div class="col-auto">
                            <form action="/secciones/{{$seccion->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="confirmarDelete(event)">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
                {{-- <a href="/secciones/1" class="list-group-item list-group-item-action">S2</a>
                <a href="/secciones/1" class="list-group-item list-group-item-action">S3</a>
                <a href="/secciones/1" class="list-group-item list-group-item-action">S4</a>
                <a href="/secciones/1" class="list-group-item list-group-item-action">S5</a> --}}
            </ul>
            @else
                <p class="text-center">No hay secciones :(</p>
            @endif
        </div>
    </div>
</div>

@endsection
