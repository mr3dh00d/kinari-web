@extends('layouts.base')

@section('title', 'Kinari - Sushi Bar')

@section('idBody', 'resumen')

@section('header')
  <header>
    @include('website.elements.navbar')
  </header>
@endsection

@section('content')
<div id="content-wrap">
  <div id="resumen" class="container my-3">
    <div class="row">
      <div class="col text-center ff-kaushan">
        <h1>Resumen</h1>
      </div>
    </div>
    <div class="productos-carrito">
      @foreach ($carrito::getContent() as $item)
        <div class="row py-2" style="border-bottom: .1rem solid var(--primary)">
          <div class="col-auto">{{$item->quantity}}</div>
          <div class="col">{{$item->name}}</div>
          <div class="col text-end">${{number_format($item->price*$item->quantity, 0, ',', '.')}}</div>
        </div>
      @endforeach
    </div>
    <div class="row py-2">
      <div class="col-12 subtotal text-end">
        Total: <span class="price ms-3 pe-3 ff-kaushan">${{number_format($carrito::getSubTotal(), 0, ',', '.')}}</span>
      </div>
    </div>
    <div class="buttons row gy-2 px-3 ff-kaushan">
      <a class="col-12 col-lg text-center btn-editar me-lg-2" href="/carta">
        Editar Pedido
      </a>
      <a class="col-12 col-lg text-center btn-pagar ms-lg-2" href="/datos-personales">
        Continuar
      </a>
    </div>
  </div>
</div>
@endsection

@section('footer')
  @include('website.elements.footer')
@endsection
