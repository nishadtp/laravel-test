<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ config('app.favicon') }}" type="image/*" sizes="16x16"> 

    <title>{{ config('app.name') }}</title>
    
    @section('main.style')
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('themes/adminlte/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('themes/adminlte/dist/css/adminlte.min.css') }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        @yield('sub.style')
    @show
</head>

<body class="hold-transition @yield('page_style')">

    @yield('sub.content')

    @section('main.script')
        <!-- jQuery -->
        <script src="{{ asset('themes/adminlte/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('themes/adminlte/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('themes/adminlte/dist/js/adminlte.js') }}"></script>
        
        
        @yield('sub.script')
    @show
</body>
</html>
