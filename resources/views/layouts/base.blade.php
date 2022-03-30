<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Optional Meta tags-->

    @yield('metatags')

    <!--App CSS-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!--App´ICON-->
    <link rel="icon" href="favicon.ico" />
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
    <script src="{{asset('js/app.js')}}"></script>
    <!--Optional JS-->
    @yield('scripts')
  </body>
</html>