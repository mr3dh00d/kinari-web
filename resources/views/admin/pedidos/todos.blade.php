@extends('layouts.panel')

@section('metatags')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('subcontent')
<p>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Filtrar
    </button>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
        <form class="row g-3">
            <div class="form-floating col-md-2">
                <input type="text" class="form-control" id="inputNPedido4" placeholder="Test">
                <label for="inputNPedido4" class="form-label">N° Pedido</label>
            </div>
            <div class="form-floating col-md-4">
                <input type="text" class="form-control" id="inputNomYApe4" placeholder="test">
                <label for="inputNomYApe4" class="form-label">Nombre y apellido</label>
            </div>
            <div class="form-floating col-md-6">
                <input type="text" class="form-control" id="inputCorreo" placeholder="test">
                <label for="inputCorreo" class="form-label">Correo</label>
            </div>
            <div class="form-floating col-md-2">
                <input type="date" class="form-control" id="inputFechaIni" placeholder="test">
                <label for="inputFechaIni" class="form-label">Fecha Inicio</label>
            </div>
            <div class="form-floating col-md-2">
                <input type="date" class="form-control" id="inputFechaTer" placeholder="test">
                <label for="inputFechaTer" class="form-label">Fecha Termino</label>
            </div>
            <div class="form-floating col-md-4">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                  <option selected>...</option>
                  <option value="1">Efectivo</option>
                  <option value="2">WebPay</option>
                </select>
                <label for="floatingSelect">Forma de pago</label>
              </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
          </form>
    </div>
  </div>

  <table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">N° Pedido</th>
        <th scope="col">Cliente</th>
        <th scope="col">Dirección</th>
        <th scope="col">Costo</th>
        <th scope="col">Tipo</th>
        <th scope="col">Fecha</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">P1-1</th>
        <td>Franco Montiel</td>
        <td>casa real 123, comuna</td>
        <td>$1.990</td>
        <td>Efectivo</td>
        <td>2022-05-30</td>
      </tr>
      <tr>
        <th scope="row">P2-1</th>
        <td>Franco Montiel</td>
        <td>casa real 123, comuna</td>
        <td>$1.990</td>
        <td>WebPay</td>
        <td>2022-05-31</td>
      </tr>
      <tr>
        <th scope="row">P1-3</th>
        <td>Dereck Pavez</td>
        <td>casa falsa 321, comuna</td>
        <td>$1.990</td>
        <td>WebPay</td>
        <td>2022-05-31</td>
      </tr>
    </tbody>
  </table>
@endsection