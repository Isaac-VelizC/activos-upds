@extends('layouts.app')

@section('content')
  <section class="section">
      <div class="col-lg-8" style="margin: 0 auto;">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Editar Area de {{$area->nombre}}</h5>
            <!-- Vertical Form -->
            <form action="{{ url('admin/area/'.$area->id.'/edit')}}" method="POST" class="row g-3">
                {{ csrf_field() }}
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
                        <span class="alert-text text-black">
                        {{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif
                <div class="col-12">
                    <label for="nombre" class="form-label"> Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $area->nombre) }}" id="nombre">
                    @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-12">
                    <label for="sigla" class="form-label"> Sigla del Area</label>
                    <input type="text" class="form-control" name="sigla" value="{{ old('sigla', $area->sigla) }}" id="sigla" onkeypress="mayus(this);">
                    @if ($errors->has('sigla'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sigla') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-12">
                    <label for="encargado" class="form-label"> Encargado/a</label>
                    <input type="text" class="form-control" name="encargado" value="{{ old('encargado', $area->encargado) }}" id="encargado">
                    @if ($errors->has('encargado'))
                        <span class="help-block">
                            <strong>{{ $errors->first('encargado') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-12">
                    <label for="descripcion" class="form-label"> Descripcion</label>
                    <textarea name="descripcion" data-length="15000" class="form-control" id="descripcion">{{ old('descripcion', $area->descripcion) }}</textarea>
                    @if ($errors->has('descripcion'))
                        <span class="help-block">
                            <strong>{{ $errors->first('descripcion') }}</strong>
                        </span>
                    @endif
                </div>
                <br><br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ URL::previous() }}"  type="reset" class="btn btn-secondary">Volver</a>
                </div>
            </form><!-- Vertical Form -->
          </div>
        </div>
      </div>
  </section>
  <script>
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
  </script>
@endsection
