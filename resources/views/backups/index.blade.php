@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Backups de la base de datos</h3>

    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif

    <form action="{{ route('backup.manual') }}" method="POST">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="branch_id" class="form-label">Seleccione la sucursal</label>
            <select name="branch_id" id="branch_id" class="form-select" required>
                <option value="" selected disabled>-- Seleccione --</option>
                @foreach($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear Backup Manual</button>
    </form>

    <br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Archivo</th>
                <th>Fecha</th>
                <th>Descargar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $files = \Storage::files('backups');
            foreach ($files as $file) {
                $basename = basename($file);
                $modtime = \Storage::lastModified($file);
                $date = date('d/m/Y H:i', $modtime);
                ?>
                <tr>
                    <td>{{ $basename }}</td>
                    <td>{{ $date }}</td>
                    <td>
                        <a href="{{ url('admin/backup/descargar/' . urlencode($basename)) }}" class="btn btn-success btn-sm">Descargar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
@endsection
