@extends('building-prueba')

@section('subcontent')
<!-- PopUp ("modal") 

-->
<div class="container">
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
<div>
  <button type="button" class="btn btn-primary" form="create-product">Guardar</button>
</div>
    

@endsection