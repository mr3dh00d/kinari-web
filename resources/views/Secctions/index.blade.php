@extends('building-prueba')

@section('subcontent')

<div class="container-fluid mt-5" id="lista_sect">
    <div class="row">
        <div class="col">
            <ul class="list-group"> Secciones
                <a href="/secciones/1" class="list-group-item list-group-item-action">S1</a>
                <a href="/secciones/1" class="list-group-item list-group-item-action">S2</a>
                <a href="/secciones/1" class="list-group-item list-group-item-action">S3</a>
                <a href="/secciones/1" class="list-group-item list-group-item-action">S4</a>
                <a href="/secciones/1" class="list-group-item list-group-item-action">S5</a>
            </ul>
            <a href="secciones/create" type="button" class="btn btn-primary">
                <i class='bx bx-plus-circle'></i>
            </a>
        </div>
    </div>
</div>

@endsection
