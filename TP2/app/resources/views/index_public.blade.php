@extends('base.base')

@section('estilos')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('barra_navegacion')
    @include('navbar.public')
@endsection

@section('contenido')
    <div id="app">
        @yield('contenido_publico')
    </div>
@endsection
