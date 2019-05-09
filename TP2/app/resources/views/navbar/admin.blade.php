@extends('base.navbar')

@section('contenido_barra_navegacion')
                <a class="navbar-brand" href="{{ url('/admin') }}">
                    <h1 class="tm-site-title mb-0">Panel de Control</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/lista_tramites') }}">
                                <i class="fas fa-file-alt"></i>
                                Tramites
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/nuevo_tramite') }}">
                                <i class="fas fa-plus"></i>
                                Nuevo Tramite
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="{{ url('/admin/logout') }}">
                                {{ Auth::user()->name }}, <b>Cerrar Sesion</b>
                            </a>
                        </li>
                    </ul>
                </div>
@endsection
