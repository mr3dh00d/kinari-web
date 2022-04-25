@extends('layouts.panel')

@section('subcontent')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Editar {{$carrusel->descripcion}} para Carrusel</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/carrusel/{{$carrusel->id}}" method="post" id="add-img-crsl" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="Nombre" class="form-label">Descripcion:</label>
                <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="Nombre" name="descripcion" value="{{$carrusel->descripcion}}">
                @error('descripcion')
                    <div class="invalid-feedback d-block">
                        {{$message}}
                    </div>                        
                @enderror
              </div>
              <div class="mb-3">
                <label for="Imagen" class="form-label">Imagen:</label>
                <input class="form-control @error('imagen') is-invalid @enderror" type="file" id="Imagen" name="imagen" accept="image/*" value="{{old('imagen')}}">
                @error('imagen')
                    <div class="invalid-feedback d-block">
                        {{$message}}
                    </div>                        
                @enderror
              </div>
              <button type="submit" class="btn btn-green" form="add-img-crsl">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection