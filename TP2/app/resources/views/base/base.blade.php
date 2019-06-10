<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @yield('estilos')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}"> -->
</head>
<body>
    <div id="home">
        @yield('barra_navegacion')
        <br>
        <div class="container">
            @yield('contenido')
        </div>
        <!-- <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Aguila Maximiliano - Bianchini German
                </p>
            </div>
        </footer> -->
    </div>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/tooplate-scripts.js') }}"></script>
    @yield('scripts')
</body>

</html>
