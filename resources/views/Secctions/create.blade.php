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
        </form>
</div>
<div>
      <button type="button" class="btn btn-primary" form="create-product">Guardar</button>
</div>

@endsection