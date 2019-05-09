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
        <h5 class="section-title h1">TRAMITES</h5>
        <tramites></tramites>
    </div>
@endsection
