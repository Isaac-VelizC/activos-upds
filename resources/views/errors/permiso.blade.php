@extends('layouts.app')

@section('content')
    <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h2>No tiene permisos para ingresar a esta pagina.</h2>
        <a class="btn" href="{{ url('/') }}">Regresar</a>
        <img src="{{ asset('assets/img/not-found.svg')}}" class="img-fluid py-5" alt="Page Not Found">
    </section>
@endsection