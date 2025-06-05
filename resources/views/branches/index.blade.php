@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Selecciona una sucursal</h2>

    <form action="{{ url('admin/conexion/sucursal/select') }}" method="POST" class="text-center">
        {{ csrf_field() }}
        <div class="mb-3">
            <select name="branch_id" class="form-select">
                @foreach($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary" type="submit">Entrar a sucursal</button>
    </form>
</div>
@endsection