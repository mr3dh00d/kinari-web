@extends('layouts.base')

@section('title', 'Kinari - Sushi Bar')

@section('idBody', 'resultado')

@section('header')
  <header>
    @include('website.elements.navbar')
  </header>
@endsection

@section('content')
<h1>Resultado</h1>
@endsection

@section('footer')
  @include('website.elements.footer')
@endsection
