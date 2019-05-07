@extends('base.base')

@section('estilos')
<script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('contenidos')

    <div class="main-panel">
        <div class="content">
            @include('navbar.admin')
            @include('admin.sidebar')
        
            <div id="admin">
                @yield('contenido_admin')
            </div>
        </div>
    </div>
@endsection
