
@extends('layouts.panel')

@section('subcontent')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Crear una nueva sección</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/secciones" id="crear-prod" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre_prod" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{old('nombre')}}">
                    @error('nombre')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>                        
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
