<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="shortcut icon" href="./assets/img/logo.png" type="image/png"> --}}

    <!-- My CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

    @yield('css')
    <!-- Bootstrap CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="./assets/css/styles.min.css" />
    
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <title>Teaching Factory PS-TI</title>
  </head>
  <body>
    @include('layouts.header')
    
    @yield('main')
    
    @include('layouts.footer')
    
    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/header-main.js"></script>
    <script src="./assets/js/app.min.js"></script>
    @yield('js')
    <script src="./assets/js/bootstrap.min.js" ></script>
  </body>
</html>