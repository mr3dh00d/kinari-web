@extends('layouts.adminbase')

@section('title', 'Panel de Administación')

@section('idBody', 'body-pd')

@section('content')
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header-name ms-auto me-4"> ¡Bienvenido de nuevo, @auth{{Auth::user()->name}}@endauth!</div>
        <div class="header_img"> <img src="/img/fotito.jpg" alt="" width="50" height="50"> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="/" class="nav_logo"> 
                    <img src="/img/logo.png" alt="logo-kinari" width="100">
                </a>
                <div class="nav_list mt-2">
                    <a href="/" class="nav_link">
                        <i class="fa-solid fa-house"></i>
                        <span class="nav_name">Inicio</span>
                    </a>
                    <a href="/secciones" class="nav_link">
                        <i class="fa-solid fa-bowl-food"></i>
                        <span class="nav_name">Productos</span>
                    </a>
                    <a href="/nuevos-pedidos" class="nav_link">
                        <i class="fa-solid fa-file-pen"></i>
                        <span class="nav_name">Nuevos pedidos</span>
                    </a>
                    <a href="/pedidos" class="nav_link">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span class="nav_name">Pedidos</span>
                    </a>
                    {{-- <a href="/carrusel" class="nav_link">
                        <i class="fa-brands fa-buy-n-large"></i>
                        <span class="nav_name">Carrusel</span>
                    </a> --}}
                    <a href="/configuracion" class="nav_link"> 
                        <i class="fa-solid fa-gear"></i>
                        <span class="nav_name">Configuración</span>
                    </a>
                    <form action="/logout" method="post" name="logout">
                        @csrf
                        <button type="submit" class="nav_link">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <span class="nav_name">Cerrar sesión</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="light content">
        @yield('subcontent')
    </div>
    <!--Container Main end-->

@endsection