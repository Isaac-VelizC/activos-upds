@extends('layouts.app')

@section('content')

<style>
    @media screen and (max-width: 767px) {
        .scrollable-table {
            overflow: auto;
            -webkit-overflow-scrolling: touch;
        }
    }
</style>

<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Historial de actividades de los Usuarios</h5>
            <!-- Bordered Tabs -->
            <div class="tab-content pt-2 scrollable-table" id="borderedTabContent">
                <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table table-borderless datatable" id="tabla-items" border="1" cellpadding="5"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Descripcion</th>
                            </tr>
                        </thead>
                        @foreach($activity as $item)
                        <tbody>
                            <tr>
                                <th scope="row">{{$item->fecha}}</th>
                                <td>{{$item->user->name}}</td>
                                <td>{{ $item->description }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    {{ $activity->links() }}
                </div>
            </div><!-- End Bordered Tabs -->
        </div>
    </div>
    <!-- End Recent Sales -->
    <a class="badge bg-primary" href="{{url('/')}}"><i class="fa fa-check"></i> Volver</a>
</section>

@endsection