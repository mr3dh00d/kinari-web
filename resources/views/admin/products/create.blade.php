@extends('layouts.panel')

@section('subcontent')
<!-- PopUp ("modal") 

-->
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Crear producto para {{$seccion->nombre}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/productos" id="crear-prod" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="seccion" value="{{$seccion->id}}">
                <div class="mb-3">
                    <label for="nombre_prod" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre_prod" name="nombre" value="{{old('nombre')}}">
                    @error('nombre')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>                        
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="destacado">
                        <label class="form-check-label" for="flexSwitchCheckDefault">¿Deseas que aparezca este producto en el inicio?</label>
                      </div>
                </div>
                <div class="mb-3">
                    <label for="img_prod" class="col-form-label">Imagen:</label>
                    <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="img_prod" name="imagen" accept="image/*" value="{{old('imagen')}}">
                    @error('imagen')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>                        
                    @enderror
                    <label for="img_des_prod" class="col-form-label">Descripcion de la imagen:</label>
                    <input type="text" class="form-control @error('imagen_desc') is-invalid @enderror" id="img_desc_prod" name="imagen_desc" value="{{old('imagen_desc')}}">
                    @error('imagen_desc')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>                        
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="precio_prod" class="col-form-label">Precio:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">(CLP) $</span>
                        <input type="number" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{old('precio')}}">
                    </div>
                    @error('precio')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>                        
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="palab_clave" class="col-form-label">Palabras Clave:</label>
                    <input type="text" class="form-control @error('palab_clave') is-invalid @enderror" id="palab_clave" name="palab_clave" value="{{old('palab_clave')}}">
                    @error('palab_clave')
                    <div class="invalid-feedback d-block">
                        {{$message}}
                    </div>                        
                    @enderror
                    <span class="details">(ej: arroz, palta, salmon)</span>
                </div>
                <div class="mb-3">
                    <label for="desc_prod" class="col-form-label">Descripción:</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" id="desc_prod" name="descripcion">{{old('descripcion')}}</textarea>
                    @error('descripcion')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>                        
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>

        </div>
    </div>
</div>
    

@endsection