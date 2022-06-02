@extends('layouts.base')

@section('title', 'Kinari - Sushi Bar')

@section('idBody', 'resumen')

@section('header')
  <header>
    @include('website.elements.navbar')
  </header>
@endsection

@section('content')
<h1>resumen</h1>
@endsection

@section('footer')
  @include('website.elements.footer')
@endsection
