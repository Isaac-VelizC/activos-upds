@extends('layouts.app')

@section('content')

<section class="section">
    <div class="col-12">
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
        <div class="card top-selling">
            <div class="card-body pb-0">
                <h5 class="card-title">Editar Usuario <span>| {{ $edit->name }}</span></h5>
                        <!-- Advanced Form Elements -->
                        <form method="post" action="{{ url('admin/users/'.$edit->id.'/edit') }}">
                            {{ csrf_field() }}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Datos de la cuenta</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Username" value="{{ old('name', $edit->name)}}" name="name">
                                                <label for="floatingInput">Username</label>  
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput" value="{{ old('email', $edit->email ) }}" name="email" placeholder="name@example.com">
                                                <label for="floatingInput">Correo Electronico</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="row mb-5">
                            <label class="col-sm-2 col-form-label">Permisos</label>
                            <div class="col-sm-10">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{ $permisos->crear_user === 1 ? 'checked' : '' }} name="permisos[]" value="crear_user">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Crear Usuarios</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $permisos->dar_baja_item === 1 ? 'checked' : '' }} name="permisos[]" value="dar_baja_item">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Dar de baja Item</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $permisos->crear_item === 1 ? 'checked' : '' }} name="permisos[]" value="crear_item">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Crear Items</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $permisos->borrar_item === 1 ? 'checked' : '' }} name="permisos[]" value="borrar_item">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Borrar Item</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $permisos->editar_item === 1 ? 'checked' : '' }} name="permisos[]" value="editar_item">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Editar item</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $permisos->exportar === 1 ? 'checked' : '' }} name="permisos[]" value="exportar">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Exportar</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{ $permisos->crear_area === 1 ? 'checked' : '' }} name="permisos[]" value="crear_area">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Crear Area</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $permisos->editar_area === 1 ? 'checked' : '' }} name="permisos[]" value="editar_area">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Editar Area</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $permisos->borrar_area === 1 ? 'checked' : '' }} name="permisos[]" value="borrar_area">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Borrar Area</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $permisos->agregar_activo === 1 ? 'checked' : '' }} name="permisos[]" value="agregar_activo">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Agregar Activo</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $permisos->eliminar_activo === 1 ? 'checked' : '' }} name="permisos[]" value="eliminar_activo">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Eliminar activo</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $permisos->editar_activo === 1 ? 'checked' : '' }} name="permisos[]" value="editar_activo">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Editar Activo</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $permisos->crear_material === 1 ? 'checked' : '' }} name="permisos[]" value="crear_material">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Crear Material</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ url('admin/users') }}" type="reset" class="btn btn-secondary">Cancelar</a>
                        </div>
                </form><!-- End General Form Elements -->
            </div>
        </div>
    </div>
</section>

@endsection