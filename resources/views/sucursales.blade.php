@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header text-center">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <h2 class="text-center">Bienvenido al dashboard</h2>
                    <p class="text-center">Sucursal activa: {{ session('branch_db') ? session('branch_db') : 'Ninguna' }}</p>
                    @if(!session('branch_db'))
                    <div class="text-center">
                        <a href="{{ url('admin/conexion/sucursal') }}" class="btn btn-sm btn-outline-danger">Conectarse a una base de datos</a>
                    </div>
                    @else
                    <div class="text-center text-muted">
                        Sucursal actual: <strong>{{ session('branch_db') }}</strong>
                        <div class="mt-2">
                            <a href="{{ url('admin/conexion/sucursal') }}" class="btn btn-sm btn-outline-danger">Cambiar</a>
                            <a href="{{ url('admin/user/areas') }}" class="btn btn-sm btn-outline-danger">Áreas</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection