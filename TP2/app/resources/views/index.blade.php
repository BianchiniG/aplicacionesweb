@extends('base.base')

@section('estilos')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endsection

@section('contenido')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <hola></hola>
        </div>
    </div>
@endsection