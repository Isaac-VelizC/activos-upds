@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header" style="text-align: center; color:black; font-weight: 700; text-decoration: underline;">
        SECTOR/AREA DE UBICACIÓN</div>
    <div class="card-body">
        @if($errors->any())
        <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
            <span class="alert-text text-black">
                {{$errors->first()}}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
        @endif
        @if(session('success'))
        <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
            <span class="alert-text text-black">{{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
        @endif
        <br>
        @if (!$superUser || $user)
        @if (!$superUser || $user->permiso->crear_area == 1)
        <a class="btn btn-outline-primary" href="{{ url('admin/area/create')}}">
            <i class="bi bi-collection"> Nueva Area</i>
        </a>
        @endif
        @if (!$superUser || $user->permiso->crear_item == 1)
        <a class="btn btn-outline-dark"
            href="{{ isset($area->id) ? url('admin/item/create/'.$area->id) : url('admin/item/create/0') }}">
            <i class="bi bi-collection"> Activo</i>
        </a>
        @endif
        @if (!$superUser || $user->permiso->crear_item == 1)
        <a class="btn btn-outline-secondary" href="{{ route('reporte.activos') }}">
            <i class="bi bi-collection"> Reportes</i>
        </a>
        @endif
        @endif
        <br>
        <br>
        @if( count($areas) > 0 )
        <div class="row">
            <section class="section dashboard">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Sales Card -->
                        @foreach($areas as $collection)
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        @if (!$superUser || $user->permiso->editar_area == 1)
                                        <li><a class="dropdown-item"
                                                href="{{ url('admin/area/'.$collection->id.'/edit')}}">Editar</a></li>
                                        @endif
                                        @if (!$superUser || $user->permiso->borrar_area == 1)
                                        <li>
                                            <form action="{{ url('admin/area/'.$collection->id)}}" method="post">
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="delete">
                                                <input class="dropdown-item" type="submit" id="btnDelete"
                                                    value="Borrar">
                                            </form>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                <a href="{{ url ('admin/area/'.$collection->id.'/show')}}">
                                    <div class="card-body">
                                        <h5 class="card-title"> {{$collection->nombre}} <span>|
                                                {{$collection->encargado}}</span></h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                {{ $collection->sigla }}
                                            </div>
                                            <div class="ps-3">
                                                @if( count($collection->items) == 1 )
                                                <h6>{{count($collection->items)}}</h6>
                                                @elseif( count($collection->items) > 1 )
                                                <h6>{{count($collection->items)}}</h6>
                                                @else
                                                <h6>0</h6>
                                                @endif
                                                <span class="text-muted small pt-2 ps-1">{{
                                                    str_limit($collection->descripcion, 50, '...') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div><!-- End Sales Card -->
                        @endforeach
                    </div>
                </div><!-- End Left side columns -->
            </section>
        </div>
        @else
        <p class="flow-text">Actualmente no tienes ninguna Area registrado. ¡Haga clic en el botón para agregar algunos!
        </p>
        @endif
    </div>
</div>
@endsection