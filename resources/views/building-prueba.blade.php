@extends('layouts.base')

@section('idBody', 'body-pd')

@section('content')
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <div class="header_img">
            {{-- <img src="/img/smile.png" alt="" width="40" height="40"> --}}
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="/" class="nav_logo"> 
                    <img src="/img/logo-icon.png" alt="logo-kinari" width="100">
                </a>
                <div class="nav_list mt-2">
                    <a href="/" class="nav_link active">
                        <i class="fa-solid fa-house"></i>
                        <span class="nav_name">Inicio</span>
                    </a>
                    <a href="/productos" class="nav_link">
                        <i class="fa-solid fa-bowl-food"></i>
                        <span class="nav_name">Productos</span>
                    </a>
                    <a href="/carrusel" class="nav_link">
                        <i class="fa-brands fa-buy-n-large"></i>
                        <span class="nav_name">Carrusel</span>
                    </a>
                    <a href="/settings" class="nav_link"> 
                        <i class="fa-solid fa-gear"></i>
                        <span class="nav_name">Configuración</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span class="nav_name">Cerrar sesión</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="light content">
        @yield('subcontent')
    </div>
    <!--Container Main end-->