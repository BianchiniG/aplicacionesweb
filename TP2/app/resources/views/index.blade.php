@extends('base.base')

@section('estilos')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('contenidos')
    @include('navbar.public')

    <div id="app">
        @yield('contenido_publico')
    </div>
@endsection
