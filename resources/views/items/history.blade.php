@extends('layouts.app')

@section('content')

<section class="section">
    <div class="col-lg-6" style="margin: 0 auto;">
        <div class="card">
            <div class="card-header" style="text-align: center">Historial de {{ $item->activo->activo }}</div>
            <div class="card-body">
                @if (count($hitory) > 0)
                    @foreach ($hitory as $item)
                        <h5 class="card-title">{{$item->descripcion}}</h5>
                        fecha de movimiento: {{$item->movimiento}}
                        <br>
                    @endforeach
                @else
                    <p>El elemento no tiene Historial</p>
                @endif
            </div>
            <a class="badge bg-primary" href="{{ URL::previous() }}">Volver</a>
        </div>
    </div>
</section>

@endsection
