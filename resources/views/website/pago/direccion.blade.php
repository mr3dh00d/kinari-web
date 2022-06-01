@extends('layouts.base')

@section('title', 'Kinari - Sushi Bar')

@section('idBody', 'select-direccion')

@section('header')
  <header>
    @include('website.elements.navbar')
  </header>
@endsection

@section('content')
<h1>direccion</h1>
@endsection

@section('footer')
  @include('website.elements.footer')
@endsection
