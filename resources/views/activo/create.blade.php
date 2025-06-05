@extends('layouts.app')

@section('content')
  <section class="section">
      <div class="col-lg-8" style="margin: 0 auto;">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Registrar nuevo Activo</h5>
                <form action="{{ url('admin/activo')}}" method="POST">
                    {{ csrf_field() }}
                    @if($errors->any())
                        <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white">
                            {{$errors->first()}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                            <span class="alert-text text-white">
                            {{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre" class="form-control-label">{{ __('Nombre') }}</label>
                                <div class="@error('nombre')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ old('nombre') }}" type="text" placeholder="Nombre del activo" id="nombre" name="nombre" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="id_tipo" class="form-control-label">Seleccionar el tipo</label>
                            <select class="form-select" id="id_tipo" name="id_tipo" aria-label="Tipo de Activo" required>
                            <option value="" selected disabled>Seleccionar el tipo</option>
                                @if( count($tipos) > 0 )
                                    @foreach( $tipos as $collection )
                                        <option value="{{$collection->id}}">{{$collection->nombre}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('id_tipo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('id_tipo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br><br>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" href="{{ url ('/')}}" >Cancelar</a><button type="submit" class="btn btn-primary">{{ 'Guardar' }}</button>
                    </div>
                </form>
          </div>
        </div>
      </div>
  </section>
@endsection
