@extends('building-prueba')

@section('subcontent')

<div class="container mt-5" id="lista_prod">
    <div class="row">
        <div class="col">
            <ul class="list-group">
                <li class="list-group-item">P1</li>
                <li class="list-group-item">P2</li>
                <li class="list-group-item">P3</li>
                <li class="list-group-item">P4</li>
                <li class="list-group-item">P5</li>
            </ul>
        </div>
    </div>
</div>

<!-- Boton Modal 
data-bs-target="id"
-->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#PopUpAgregar">
  Agregar
</button>

<!-- PopUp ("modal") 

-->
<div class="modal fade" id="PopUpAgregar" tabindex="-1" aria-labelledby="PopUpAgregarLb" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PopUpAgregarLb">Producto Agregar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="mb-3">
                <label for="nombre_prod" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre_prod">
            </div>
            <div class="mb-3">
                <label for="precio_prod" class="col-form-label">Precio:</label>
                <input type="text" class="form-control" id="precio_prod">
            </div>
            <div class="mb-3">
                <label for="palab_clave" class="col-form-label">Palabras Clave:</label>
                <input type="text" class="form-control" id="palab_clave">
            </div>
            <div class="mb-3">
                <label for="desc_prod" class="col-form-label">Descripción:</label>
                <input type="text" class="form-control" id="desc_prod">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

@endsection