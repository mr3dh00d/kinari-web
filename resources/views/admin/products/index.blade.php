@extends('layouts.panel')

@section('metatags')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('subcontent')
<div class="container mt-5 productos" id="lista_prod">
    <div class="row">
        <div class="col">
            <h1>Productos en {{$seccion->nombre}}</h1>
            <input type="hidden" name="seccion-id" value="{{$seccion->id}}"/>
        </div>
        <div class="col-auto">
            <a href="/productos/create?seccion={{$seccion->id}}">
                <button type="button" class="btn btn-primary btn-circle">
                    <i class="fa-solid fa-plus"></i>
                  </button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if (count($seccion->productos) > 0)
                <ul id="lista_productos" class="list-group">
                    @foreach ($seccion->productos->sortBy('orden') as $producto)
                        <li data-id="{{$producto->id}}" class="row d-flex list-group-item align-items-center list-hover">
                            <div class="col-auto">
                                <i class="fa-solid fa-bars"></i>
                            </div>
                            <div class="col" >
                                {{$producto->nombre}}
                                @if ($producto->destacado)
                                    <i class="fa-solid fa-star destacado"></i>
                                @endif
                            </div>
                            <div class="col-auto">
                                <a href="/productos/{{$producto->id}}/edit">
                                    <button type="button" class="btn btn-green btn-circle btn-sm">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="col-auto">
                                <form action="/productos/{{$producto->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="confirmarDelete(event)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                    {{-- <a href="/productos/1" class="list-group-item list-group-item-action">P1</a>
                    <a href="/productos/1" class="list-group-item list-group-item-action">P2</a>
                    <a href="/productos/1" class="list-group-item list-group-item-action">P3</a>
                    <a href="/productos/1" class="list-group-item list-group-item-action">P4</a>
                    <a href="/productos/1" class="list-group-item list-group-item-action">P5</a> --}}
                </ul>
            @else
                <p class="text-center">
                    No hay productos en {{$seccion->nombre}} :(
                </p>                
            @endif
        </div>
    </div>
</div>

@endsection