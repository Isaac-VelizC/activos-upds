@extends('layouts.app')

@section('content')

<section class="section">
    <div class="col-lg-8" style="margin: 0 auto;">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Vista de <span>| Crear nueva cuenta</span></h5>
            @if($errors->any())
                <div class="mt-3 alert alert-error alert-dismissible fade show" role="alert">
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
            <!-- Vertical Form -->
            <form action="{{ url('admin/users')}}" method="POST" role="form text-left">
                {{ csrf_field() }}
                <div class="form-floating mb-3">
                    <select class="form-select" id="instituto" name="instituto" aria-label="Tipo de activo">
                        <option value="u" selected>Universidad</option>
                        <option value="i">Instituto</option>
                        <option value="c">Colegio</option>
                        <option value="cl">Clinica</option>
                    </select>
                    <label for="id_area">Institución</label>
                    @if ($errors->has('instituto'))
                        <span class="help-block">
                            <strong>{{ $errors->first('instituto') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="id_depart" name="id_depart" aria-label="Tipo de activo">
                    <option value="" selected disabled>Selecciona el Departamento</option>
                        @if( count($depat) > 0 )
                            @foreach( $depat as $collection )
                                <option value="{{$collection->id}}">{{$collection->nombre}}</option>
                            @endforeach
                        @else
                            <option value="" disabled>No hay departamentos</option>
                        @endif
                    </select>
                    <label for="id_area">Selecciona un Departamento</label>
                    @if ($errors->has('id_depart'))
                        <span class="help-block">
                            <strong>{{ $errors->first('id_depart') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-12">
                    <label for="name" class="form-label"> Username</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-12">
                    <label for="encargado" class="form-label"> Correo Electronico</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-12">
                    <label for="password" class="form-label"> Contraseña</label>
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                    <div class="col-12">
                        <label for="password-confirm" class="form-label">{{ __('Confirmar Contraseña') }}</label>
                        <div class="col-md-12">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                <br><br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">guardar</button>
                    <a href="{{ url('admin/users') }}" type="reset" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('js/login.js') }}"></script>
@endsection