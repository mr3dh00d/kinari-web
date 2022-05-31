<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Optional Meta tags-->

    @yield('metatags')

    <!--App CSS-->
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <!--App´ICON-->
    <link rel="icon" href="/favicon.ico" />
    <!--Optional LINKS-->
    @yield('links')
    <!--Optional CSS-->
    @yield('css')
    <!--Title-->
    <title>@yield('title')</title>
  </head>
  <body id="@yield('idBody')" class="@yield('classBody')">

    @yield('header')

    @yield('content')

    @yield('footer')

    <!--App JS-->
    <script src="{{asset('js/admin.js')}}"></script>
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/607cfbde25.js" crossorigin="anonymous"></script>
    <!--Optional JS-->
    @yield('scripts')
  </body>
</html>