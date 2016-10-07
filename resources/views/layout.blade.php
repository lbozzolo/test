<!DOCTYPE html>
<html>
<head>
    <title>Prueba-Test</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/estilos.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
    <div>

        <h1>Prueba-test<small> Sistema de productos</small></h1>

        @include('partials.messages')

        @yield('contenido')

    </div>
</div>

<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@yield('js')
</body>
</html>
