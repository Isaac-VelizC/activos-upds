@extends('layouts.app')

@section('content')

<style>
    @media screen and (max-width: 767px) {
        .scrollable-table {
            overflow: auto;
            -webkit-overflow-scrolling: touch;
        }
    }

    .custom-button {
        padding: 0;
        border: none;
        background-color: transparent;
        color: #fff;
    }

    .custom-button .badge {
        background-color: #dc3545;
        font-size: 12px;
        padding: 5px 10px;
        border-radius: 10px;
    }
</style>

<section class="section mt-5">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body pb-0 scrollable-table">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title">Cuentas de Usuario <span class="text-muted">| Lista</span></h5>
                    <a href="{{ url('admin/users/create') }}" class="btn btn-outline-success">
                        <i class="bi bi-plus-circle"></i>
                        <span class="label-text">Nuevo</span>
                    </a>
                </div>

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-text">{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Vista</th>
                            <th scope="col">Correo Electrónico</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                        <tr>
                            <td><a href="#" class="text-primary fw-bold">{{$item->name}}</a></td>
                            <td>
                                @if (!$item->super_user)
                                <a href="{{ url('admin/password/'.$item->id.'/reset') }}"><i
                                        class="bi bi-key-fill"></i></a>
                                @endif
                            </td>
                            <td>{{$item->email}}</td>
                            <td>
                                @if ($item->estado == 'A')
                                <span class="badge bg-success">Activo</span>
                                @else
                                <a href="{{ url('admin/users/'.$item->id.'/activar') }}">
                                    <span class="badge bg-danger">Inactivo</span>
                                </a>
                                @endif
                            </td>
                            @if (!$item->super_user)
                            <td>
                                <a href="{{ url('admin/users/'.$item->id.'/edit')}}" class="badge bg-primary">
                                    <i class="bi bi-brush-fill me-1"></i> Editar
                                </a>
                                @if ($item->estado == 'A')
                                <form action="{{ url('admin/users/'.$item->id.'/delete')}}" method="post"
                                    class="d-inline">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="delete">
                                    <button type="submit" class="custom-button" {{ $item->estado == 'I' ? 'disabled' :
                                        '' }}>
                                        <span class="badge bg-danger"><i class="bi bi-x-octagon me-1"></i>
                                            Inactivar</span>
                                    </button>
                                </form>
                                @endif
                                <a href="{{ url('admin/users/'.$item->id.'/show')}}" class="badge bg-info text-dark">
                                    <i class="bi bi-info-circle me-1"></i> Detalles
                                </a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection