@extends('building-prueba')

@section('subcontent')

<div class="container">
    <div class="row">
      <div class="col-md-8">
        <h1>Carrusel de Imagenes Inicio</h1>
      </div>
      <div class="col-6 col-md-4">
        <button type="button" class="btn btn-primary btn-circle btn-md" data-bs-toggle="modal" data-bs-target="#agregarImagen">
          <h4><i class="fa-solid fa-plus"></i></h4>
        </button>
      </div>  
    </div>
<div>

  <div class="modal fade" id="agregarImagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nueva imagen para el carrusel</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="Nombre" class="form-label"><h6>Nombre:*</h6></label>
            <input type="text" class="form-control" id="Nombre">
          </div>
          <h6>Si lo deseas puedes hacer que la imagen apunte a algun producto o categoría</h6>
          <label for="ProductoCategoria" class="form-label"><h6>Producto o Categoría:</h6></label>
          <input class="form-control" list="datalistOptions" id="ProductoCategoria" placeholder="Selecciona un producto o categoría">
          <label for="Imagen" class="form-label"><h6>Imagen:*</h6></label>
          <input class="form-control" type="file" id="Imagen">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-green" data-bs-dismiss="modal">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <datalist id="datalistOptions">
    <option value="Sushito weno">
    <option value="Promos prronas">
    <option value="AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA!!!!!!!!!!">
    <option value="yeame pa la casa">
    <option value="tariamo">
  </datalist>
</div>

<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
      <img src="/img/fotito.jpg" class="estilo-img" alt="sushito">
      <div class="card-body">
        <div class="row">
          <div class="col-10">
            <h5 class="card-title">Sushito 1</h5>
          </div>
          <div class="col-1">
            <button type="button" class="btn btn-green btn-circle btn-sm" data-bs-toggle="modal" data-bs-target="#agregarImagen">
              <i class="fa-solid fa-pencil"></i>
            </button>
          </div>
          <div class="col-1">
            <button type="button" class="btn btn-danger btn-circle btn-sm">
              <i class="fa-solid fa-trash"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="agregarImagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar imagen para el carrusel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="Nombre" class="form-label"><h6>Nombre:*</h6></label>
          <input type="text" class="form-control" id="Nombre">
        </div>
        <h6>Si lo deseas puedes hacer que la imagen apunte a algun producto o categoría</h6>
        <label for="ProductoCategoria" class="form-label"><h6>Producto o Categoría:</h6></label>
        <input class="form-control" list="datalistOptionsedit" id="ProductoCategoria" placeholder="Selecciona un producto o categoría">
        <label for="Imagen" class="form-label"><h6>Imagen:*</h6></label>
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
</div>

@endsection