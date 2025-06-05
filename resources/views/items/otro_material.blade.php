@extends('layouts.app')

@section('content')

<style>
    .img {
        margin: 10px auto;
        border-radius: 5px;
        border: 1px solid #999;
        padding: 13px;
        width: 220px;
        height: 220px;
        background: url('{{ asset('img/imagen.jpg') }}');
        background-size: cover;
        background-repeat: no-repeat;
    }

    .img img {
        width: 100%;
    }

    @media all and (min-width: 500px) and (max-width: 1000px) {
        .img {
            margin: 20px auto;
            width: 300px;
            height: 300px;
            background: url('{{ asset('img/imagen.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
        }
    }
</style>

<section class="section">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Registrar Otro Material</h6>

                    <form id="image-form" method="post" action="{{ url('admin/material/create') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @if($errors->any())
                        <div class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-black">{{ $errors->first() }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                        @endif

                        @if(session('success'))
                        <div class="m-3 alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-text text-black">{{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                        @endif

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Detalles</label>
                            <div class="col-sm-10">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
                                    <label for="nombre">Nombre del Material</label>
                                    @if ($errors->has('nombre'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-floating mb-3" id="upload-container">
                                    <input type="file" name="image" class="form-control" id="uploadInput">
                                </div>
                                <input type="hidden" id="image-source" name="id_area" value="{{$area->id}}">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" required name="descripcion" id="descripcion" style="height: 100px;" placeholder="Descripción corta del mueble">{{ old('descripcion') }}</textarea>
                                    <label for="descripcion">Descripción</label>
                                    @if ($errors->has('descripcion'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ URL::previous() }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div id="imageContainer" class="img"></div>
        </div>
    </div>
</section>

<script>
    var uploadInput = document.getElementById('uploadInput');
    var imageContainer = document.getElementById('imageContainer');

    uploadInput.addEventListener('change', function(event) {
        var file = event.target.files[0];
        if (!file) return;

        var reader = new FileReader();
        reader.onload = function(e) {
            imageContainer.innerHTML = ''; // Limpiar vista previa anterior
            var image = document.createElement('img');
            image.src = e.target.result;
            image.height = 200;
            image.width = 200;
            imageContainer.appendChild(image);
        };
        reader.readAsDataURL(file);
    });
</script>

@endsection
