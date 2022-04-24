@extends('building-prueba')

@section('subcontent')

<div class="container-fluid mt-5" id="lista_prod">
    <div class="row">
        <div class="col">
            <ul class="list-group"> Secciones
                <a href="#" class="list-group-item list-group-item-action active">P1</a>
                <a href="#" class="list-group-item list-group-item-action active">P2</a>
                <a href="#" class="list-group-item list-group-item-action active">P3</a>
                <a href="#" class="list-group-item list-group-item-action active">P4</a>
                <a href="#" class="list-group-item list-group-item-action active">P5</a>
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
        <form id="crear-prod" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre_prod" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre_prod" name="nombre_prod">
            </div>
            <div class="mb-3">
                <label for="img_prod" class="col-form-label"></label>
                <input type="file" class="form-control" id="img_prod" name="img_prod">
            </div>
            <div class="mb-3">
                <label for="precio_prod" class="col-form-label">Precio:</label>
                <input type="number" class="form-control" id="precio_prod" name="precio_prod">
            </div>
            <div class="mb-3">
                <label for="palab_clave" class="col-form-label">Palabras Clave:</label>
                <input type="text" class="form-control" id="palab_clave" name="palab_clave">
            </div>
            <div class="mb-3">
                <label for="desc_prod" class="col-form-label">Descripción:</label>
                <textarea class="form-control" id="desc_prod" name="desc_prod"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" form="create-product">Guardar</button>
      </div>
    </div>
  </div>
</div>

@endsection