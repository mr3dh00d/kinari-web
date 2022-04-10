@extends('layouts.base')

@section('idBody', 'body-pd')

@section('content')
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="/img/smile.png" alt="" width="40" height="40"> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> 
                <i class='logo-icon'></i>
                <span class="nav_logo-name">Kinari</span>
            </a>
                <div class="nav_list">
                    <a href="/productos" class="nav_link">
                        <i class='bx bxs-bowl-rice'></i>
                        <span class="nav_name">Productos</span>
                    </a>
                    <a href="/settings" class="nav_link"> 
                    <i class='bx bx-dots-horizontal-rounded'></i>
                        <span class="nav_name">Settings</span>
                    </a>
                </div>
            </div> <a href="#" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span>
            </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="bg-dark content">
        @yield('subcontent')
    </div>
    <!--Container Main end-->