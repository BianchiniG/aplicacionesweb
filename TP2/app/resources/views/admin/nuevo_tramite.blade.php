@extends('base.base')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('barra_navegacion')
    @include('navbar.admin')
@endsection

@section('contenido')
    <div id="admin">
        <nuevo-tramite></nuevo-tramite>
    </div>
@endsection
