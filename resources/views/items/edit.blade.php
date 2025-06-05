@extends('layouts.app')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> Modificar {{$item->activo->activo}}</h5>
                    <form method="post" action="{{ url('admin/item/'.$item->id.'/edit') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Detalle</label>
                            <div class="col-sm-10">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="id_tipo" name="id_tipo" aria-label="Tipo de activo">
                                        <option value="" selected disabled>Selecciona el Tipo</option>
                                        @if( count($tipoActivo) > 0 )
                                        @foreach( $tipoActivo as $collection )
                                        @if ( $collection->id == old('tipo_id') )
                                        <option value="{{$collection->id}}" data-codigo="{{ $collection->codigo }}"
                                            selected>{{$collection->nombre}}</option>
                                        @elseif ( $collection->id == $item->tipo_id && old('tipo_id') === null )
                                        <option value="{{$collection->id}}" data-codigo="{{ $collection->codigo }}"
                                            selected>{{$collection->nombre}}</option>
                                        @else
                                        <option value="{{$collection->id}}" data-codigo="{{ $collection->codigo }}">
                                            {{$collection->nombre}}</option>
                                        @endif
                                        @endforeach
                                        @endif
                                    </select>
                                    <label for="id_tipo">Selecciona un Tipo</label>
                                    @if ($errors->has('id_tipo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_tipo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="nombre" name="nombre"
                                        aria-label="Centro de Analisis">
                                        <option value="" selected disabled>Selecciona el activo</option>
                                        @if( count($activos) > 0 )
                                        @foreach( $activos as $collection )
                                        @if ( $collection->id == old('nombre') )
                                        <option value="{{$collection->id}}">{{$collection->activo}}</option>
                                        @elseif ( $collection->id == $item->activo_id && old('nombre') === null )
                                        <option value="{{$collection->id}}" selected>{{$collection->activo}}</option>
                                        @else
                                        <option value="{{$collection->id}}">{{$collection->activo}}</option>
                                        @endif
                                        @endforeach
                                        @endif
                                    </select>
                                    <label for="id_area">Selecciona el Activo</label>
                                    @if ($errors->has('id_centro'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_centro') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="fecha_compra"
                                        value="{{ old('fecha_compra', $item->fecha_compra) }}" id="fecha_compra"
                                        max="{{ date('Y-m-d') }}">
                                    <label for="fecha_compra">Fecha de compra</label>
                                    @if ($errors->has('fecha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="modelo"
                                                value="{{ old('modelo', $item->modelo) }}" id="modelo">
                                            <label for="modelo">Modelo</label>
                                            @if ($errors->has('modelo'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('modelo') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="serie"
                                                value="{{ old('serie', $item->serie) }}" id="serie">
                                            <label for="serie">Serie</label>
                                            @if ($errors->has('serie'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('serie') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="id_estado" name="id_estado"
                                        aria-label="Centro de Analisis">
                                        <option value="" selected disabled>Estado del Activo</option>
                                        @if( count($estados) > 0 )
                                        @foreach( $estados as $collection )
                                        @if ( $collection->id == old('id_estado') )
                                        <option value="{{$collection->id}}">{{$collection->estado}}</option>
                                        @elseif ( $collection->id == $item->estado_id && old('id_estado') === null )
                                        <option value="{{$collection->id}}" selected>{{$collection->estado}}</option>
                                        @else
                                        <option value="{{$collection->id}}">{{$collection->estado}}</option>
                                        @endif
                                        @endforeach
                                        @endif
                                    </select>
                                    <label for="id_area">Estado del Activo</label>
                                    @if ($errors->has('id_estado'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_estado') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="file" name="image" class="form-control" id="uploadInput">
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="id_centro" name="id_centro"
                                        aria-label="Centro de Analisis">
                                        <option value="" selected disabled>Selecciona Centro de Analisis</option>
                                        @if( count($analis) > 0 )
                                        @foreach( $analis as $collection )
                                        @if ( $collection->id == old('id_centro') )
                                        <option value="{{$collection->id}}">{{$collection->centro_analisis}}</option>
                                        @elseif ( $collection->id == $item->centro_id && old('id_centro') === null )
                                        <option value="{{$collection->id}}" selected>{{$collection->centro_analisis}}
                                        </option>
                                        @else
                                        <option value="{{$collection->id}}">{{$collection->centro_analisis}}</option>
                                        @endif
                                        @endforeach
                                        @endif
                                    </select>
                                    <label for="id_area">Selecciona Centro de Analisis</label>
                                    @if ($errors->has('id_centro'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_centro') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="descripcion"
                                        placeholder="Descripción corta del mueble" id="descripcion"
                                        style="height: 100px;">{{ old('descripcion', $item->descripcion) }}</textarea>
                                    <label for="descripcion">Descripcion</label>
                                    @if ($errors->has('descripcion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="id_area" name="id_area"
                                        aria-label="Selecciona una Area">
                                        <option value="" selected disabled>Selecciona el Area</option>
                                        @if( count($areas) > 0 )
                                        @foreach( $areas as $collection )
                                        @if ( $collection->id == old('area_id') )
                                        <option value="{{$collection->id}}" selected>{{$collection->nombre}}</option>
                                        @elseif ( $collection->id == $item->area_id && old('area_id') === null )
                                        <option value="{{$collection->id}}" selected>{{$collection->nombre}}</option>
                                        @else
                                        <option value="{{$collection->id}}">{{$collection->nombre}}</option>
                                        @endif
                                        @endforeach
                                        @endif
                                    </select>
                                    <label for="id_area">Selecciona una Area</label>
                                    @if ($errors->has('id_area'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_area') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ url('/') }}" type="reset" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div id="imageContainer"></div>
            <br>
            <h4>Imagen Anterior</h4>
            <img src="{{ asset('img/fotos/'.auth()->user()->dep->sigla.'/'.$item->image)}}" alt="Imagen Anterior"
                height="150" , width="150">
        </div>
    </div>
</section>
<script>
    var uploadInput = document.getElementById('uploadInput');
		var imageContainer = document.getElementById('imageContainer');
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

<script>
    // Captura el evento change del select "id_tipo"
        document.getElementById('id_tipo').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var novusField = document.getElementById('novus');
            // Obtiene el valor del campo "codigo" de la opción seleccionada y actualiza el campo "novus"
            var codigo = selectedOption.getAttribute('data-codigo');
            novusField.value = codigo;
        });
</script>
@endsection