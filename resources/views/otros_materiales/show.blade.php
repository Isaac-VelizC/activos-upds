@extends('layouts.app')

@section('content')
<section class="section mt-5">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow">
            <div class="card-header text-center">
                <h4 class="mb-0">{{$otro->nombre}}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 text-center">
                        @if ($otro->image)
                            <img src="{{ asset('img/otros/'.auth()->user()->dep->sigla.'/'.$otro->image) }}" alt="Foto" class="img-fluid" style="max-width: 100%; height: auto;">
                        @else
                            <p>No tiene imagen</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title">Área: {{$otro->area->nombre}}</h5>
                        <h6><strong>Encargado:</strong> {{$otro->area->encargado}}</h6>
                    </div>
                </div>
                <div class="mt-3">
                    <p><strong>Descripción:</strong> {{$otro->descripcion}}</p>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ url('admin/area/'.$otro->area->id.'/show') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</section>
@endsection