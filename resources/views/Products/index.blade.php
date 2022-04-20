@extends('building-prueba')

@section('subcontent')

<div class="container-fluid mt-5" id="lista_prod">
    <div class="row">
        <div class="col">
            <ul class="list-group"> Productos
                <a href="/productos/1" class="list-group-item list-group-item-action active">P1</a>
                <a href="/productos/1" class="list-group-item list-group-item-action active">P2</a>
                <a href="/productos/1" class="list-group-item list-group-item-action active">P3</a>
                <a href="/productos/1" class="list-group-item list-group-item-action active">P4</a>
                <a href="/productos/1" class="list-group-item list-group-item-action active">P5</a>
            </ul>
            <a href="/productos/create"type="button" class="btn btn-primary">
                <i class='bx bx-plus-circle'></i>
            </a>
        </div>
    </div>
</div>

@endsection