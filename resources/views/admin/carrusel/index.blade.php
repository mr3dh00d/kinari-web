@extends('layouts.panel')

@section('title', 'Panel de Administación')

@section('subcontent')

<div class="container">
  <div class="row mb-2">
    <div class="col">
      <h1>Carrusel de Imagenes Inicio</h1>
    </div>
    <div class="col-auto">
      <a href="/carrusel/create">
        <button type="button" class="btn btn-primary btn-circle">
          <i class="fa-solid fa-plus"></i>
        </button>
      </a>
    </div>  
  </div>
  @if (count($carruseles) > 0)
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($carruseles as $carrusel)
        <div class="col">
          <div class="card">
            <img src="{{$carrusel->ruta}}" class="estilo-img">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title">{{$carrusel->descripcion}}</h5>
                </div>
                <div class="col-auto">
                  <a href="/carrusel/{{$carrusel->id}}/edit">
                    <button type="button" class="btn btn-green btn-circle btn-sm" data-bs-toggle="modal" data-bs-target="#editarImagen">
                      <i class="fa-solid fa-pencil"></i>
                    </button>
                  </a>
                </div>
                <div class="col-auto">
                  <form action="/carrusel/{{$carrusel->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="confirmarDelete(event)">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    @else
      <p class="text-center">No imagenes para el carrusel :(</p>
    @endif
        



{{-- <div class="modal fade" id="editarImagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar imagen para el carrusel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="Nombre" class="form-label">Nombre:*</label>
          <input type="text" class="form-control" id="Nombre">
        </div>
        <span>Si lo deseas puedes hacer que la imagen apunte a algun producto o categoría</span>
        <label for="ProductoCategoria" class="form-label">Producto o Categoría:</label>
        <input class="form-control" list="datalistOptionsedit" id="ProductoCategoria" placeholder="Selecciona un producto o categoría">
        <label for="Imagen" class="form-label">Imagen:*</label>
        <input class="form-control" type="file" id="Imagen">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-green" data-bs-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>

<datalist id="datalistOptionsedit">
  <option value="yametocaeldusi">
  <option value="Promos Promos">
  <option value="OOOOOOOOOOOOOOOOOOOOOOOOOO!!!!!!!!!!">
  <option value="just a tiny little kitty cat">
  <option value="osmantus guain">
</datalist>
</div> --}}

@endsection