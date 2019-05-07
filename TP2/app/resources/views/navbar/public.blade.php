@extends('navbar.navbar')

@section('izquierda')
    <a class="navbar-brand" href="{{ route('public_home') }}">index</a>
@endsection

@section('derecha')
<ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="#">Algo</a>
    </li>
</ul>
@endsection
