@extends('layouts.app')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> Modificar {{$material->nombre}}</h5>
                    <!-- Advanced Form Elements -->
                    <form method="post" action="{{ url('admin/otro/material'.$material->id) }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Detalles del Material</label>
                            <div class="col-sm-10">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="nombre"
                                        value="{{ old('nombre', $material->nombre) }}" id="nombre">
                                    <label for="nombre">Nombre del Material</label>
                                    @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-floating mb-3" id="upload-container">
                                    <input type="file" name="image" class="form-control" id="uploadInput">
                                </div>
                                <input type="hidden" id="image-source" name="image_source">
                                <input type="hidden" id="image-data" name="image_data">
                                <input type="hidden" id="image-source" name="id_area" value="{{$material->area_id}}">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="descripcion"
                                        placeholder="Descripción corta del mueble" id="descripcion"
                                        style="height: 100px;">{{ old('descripcion', $material->descripcion) }}</textarea>
                                    <label for="descripcion">Descripcion</label>
                                    @if ($errors->has('descripcion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ url('/') }}" type="reset" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form><!-- End General Form Elements -->

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div id="imageContainer">
            </div>
            <br>
            <h4>Imagen Anterior</h4>
            <img src="{{ asset('img/otros/'.auth()->user()->dep->sigla.'/'.$material->image) }}" alt="Imagen Anterior" height="150" , width="150">
        </div>
    </div>
</section>
<script>
    // Obtener referencia al elemento de entrada de archivo
		var uploadInput = document.getElementById('uploadInput');
		// Obtener referencia al contenedor de la imagen
		var imageContainer = document.getElementById('imageContainer');
		// Agregar un evento change al elemento de entrada de archivo
		uploadInput.addEventListener('change', function(event) {
			// Obtener el archivo seleccionado
			var file = event.target.files[0];
			// Crear una instancia de FileReader
			var reader = new FileReader();
			// Definir la función de carga completada
			reader.onload = function(e) {
				// Crear un elemento de imagen
				var image = document.createElement('img');
				// Establecer la ruta de la imagen como el resultado de la carga
				image.src = e.target.result;
                image.height = 150;
                image.width = 150;
				// Agregar la imagen al contenedor
				imageContainer.appendChild(image);
			}
			// Leer el archivo como una URL de datos
			reader.readAsDataURL(file);
		});
</script>
@endsection