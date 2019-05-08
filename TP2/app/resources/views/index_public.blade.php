@extends('base.base')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('barra_navegacion')
    @include('navbar.public')
@endsection

@section('contenido')
    <div id="app">
        <example-component></example-component>
        <tramite></tramite>
    </div>
@endsection
