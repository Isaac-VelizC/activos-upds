@extends('layouts.app')

@section('content')

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
    @media screen and (max-width: 767px) {
        .scrollable-table {
            overflow: auto;
            -webkit-overflow-scrolling: touch;
        }
    }
</style>


@if ($area->encargado === null)
<div class=" alert alert-danger alert-dismissible fade show">
    <span class="alert-text text-black">Porfavor agregar al encargado del area</span> <a
        href="{{ url('admin/area/'.$area->id.'/edit')}}">Ir a</a>
</div>
@endif

<section class="section">
    <div class="col-lg-6" style="margin: 0 auto;">
        <!-- Card with header and footer -->
        <div class="card">
            <div class="card-header" style="text-align: center">{{$area->nombre}}</div>
            <div class="card-body">
                <h5 class="card-title">{{$area->encargado}}</h5>
                {{$area->descripcion}}
            </div>
            <br>
            <div style="display: flex; justify-content: center; align-items: center;">
                @if ($superUser || $user->permiso->crear_item == 1)
                <a class="btn btn-outline-dark"
                    href="{{ isset($area->id) ? url('admin/item/create/'.$area->id) : url('admin/item/create/'.'0') }}">
                    <i class="bi bi-collection"> Agregar Activo</i>
                </a>
                @endif

                @if ($superUser || $user->permiso->crear_material == 1)
                <a class="btn btn-outline-dark" href="{{ url('admin/material/create/'.$area->id) }}"
                    style="margin-left: 20px;">
                    <i class="bi bi-collection"> Otro Material</i>
                </a>
                @endif
            </div>
            <br>
        </div>
    </div>
</section>

<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <div class="filter">
                <!--form action="{{ url('admin/generar-pdf') }}" method="GET"-->
                {{ csrf_field() }}
                <input type="hidden" name="area" value="{{$area->id}}">
                <div class="input-group mb-2">
                    <select class="form-control" id="categoria-filtro" name="id_tipo" aria-label="Tipo de activo">
                        <option value="" selected disabled>Selecciona el Tipo</option>
                        @if( count($tipo) > 0 )
                        <option value="00">Todo...</option>
                        @foreach( $tipo as $collection )
                        <option value="{{ $collection->id }}">{{ $collection->nombre }}</option>
                        @endforeach
                        @endif
                    </select>
                    @if ($superUser)
                    <span class="input-group-text">
                        <button class="btn btn-light" id="export">Exportar</button>
                    </span>
                    @endif
                </div>
                <!--/form-->
            </div>
            <h5 class="card-title">Activos del Area <span>| {{$area->nombre}}</span></h5>
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">Activos</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Otro Material</button>
                </li>
            </ul>

            <div class="tab-content pt-2 scrollable-table" id="borderedTabContent">
                <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                    @if( count($area->items) > 0 )
                    <table class="table table-borderless datatable" id="tabla-items" border="1" cellpadding="5"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th style="display: none">Fecha alta</th>
                                <th>Nombre</th>
                                <th style="display: none">Detalle</th>
                                <th style="display: none">Modelo</th>
                                <th style="display: none">Serie</th>
                                <th>Categoria</th>
                                <th>Estado</th>
                                <th style="display: none">Responsable</th>
                                <th style="display: none">Ubicación</th>
                                <th>Centro de analisis</th>
                                <th>De baja</th>
                                <th class="export-ignore"></th>
                            </tr>
                        </thead>
                        @foreach($area->items as $item)
                        <tbody>
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td style="display: none">{{ \Carbon\Carbon::parse($item->fecha_compra)->format('d/m/Y')
                                    }}</td>
                                <td style="display: none" class="export-ignore">{{$item->tipo_id}}</td>
                                <td>{{$item->activo->activo}}</td>
                                <td class="descripcion-column" style="display: none"
                                    data-full-text="{{$item->descripcion}}"></td>
                                <td style="display: none">{{$item->modelo}}</td>
                                <td style="display: none">{{$item->serie}}</td>
                                <td>{{$item->tipo->nombre}}</td>
                                <td>{{$item->Estado->estado}}</td>
                                <td style="display: none">{{$item->area->encargado}}</td>
                                <td style="display: none">{{$item->area->nombre}}</td>
                                <td>{{ $item->centro->centro_analisis }}</td>
                                @if ($item->estado == '1')
                                <td>
                                    <a type="button"
                                        data-toggle="{{ $superUser || $user->permiso->dar_baja_item == 0 ? '' : 'modal'}}"
                                        data-target="#modal-familiar">
                                        <span class="badge bg-success">Activo</span>
                                    </a>
                                </td>
                                @include('areas.modal')
                                @else
                                <td><span class="badge bg-danger">Inactivo</span></td>
                                @endif

                                <td class="export-ignore">
                                    <a href="{{ url('admin/item/'.$item->id.'/show') }}"><i class="fa fa-eye"></i></a>
                                    <a href="{{ url('admin/item/'.$item->id.'/history') }}" title="Historial"><i
                                            class="fa fa-history"></i></a>
                                    <!--@if ($superUser || $user->permiso->borrar_item == 1)
                                    <a data-toggle="{{$superUser || $user->permiso->eliminar_activo == 0 ? '' : 'modal'}}"
                                        data-item-id="{{$item->id}}" type="button" title="Eliminar"
                                        data-target="#modal-eliminar-item"><i class="fa fa-trash"></i></a>
                                    <div class="modal fade" id="modal-eliminar-item" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ url('admin/item/'.$item->id.'/eliminar')}}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <input type="hidden" name="item_id" id="item_id">

                                                        <h5 class="card-title">Area: {{$item->area->nombre}}</h5>
                                                        <h6><b>Tipo:</b> {{$item->tipo->nombre}}</h6>
                                                        <h6><b>fecha compra:</b> {{
                                                            \Carbon\Carbon::parse($item->fecha_compra)->format('d/m/Y')
                                                            }}</h6>
                                                        <h6><b>Encargado:</b> {{$item->area->encargado}}</h6>
                                                        <h6><b>Centro de Analisis:</b>
                                                            {{$item->centro->centro_analisis}}</h6>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endif-->
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    @else
                    <div class="divider"></div>
                    <p class="center-align">No hay elementos para mostrar. ¡Vamos a agregar algunos!</p>
                    @endif
                </div>
                <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                    @if( $cantidad > 0 )
                    <table id="tabla-material" class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Ubicación</th>
                                <th scope="col" class="export-ignore">Ver</th>
                                <th scope="col" class="export-ignore">Editar</th>
                                <th scope="col" class="export-ignore">Eliminar</th>
                            </tr>
                        </thead>
                        @foreach($otro as $item)
                        <tbody>
                            <tr>
                                <td>{{$item->id}}</td>
                                <td scope="row">{{$item->nombre}}</td>
                                <td>{{ strlen($item->descripcion) > 25 ? substr($item->descripcion, 0, 25) . '...' :
                                    $item->descripcion }}</td>
                                <td>{{$item->area->nombre}}</td>
                                <td class="export-ignore"><a
                                        href="{{ url('admin/otro/material'.$item->id.'/show') }}"><i
                                            class="fa fa-eye"></i></a></td>
                                <td class="export-ignore"><a
                                        href="{{ url('admin/otro/material'.$item->id.'/edit') }}"><i
                                            class="fa fa-edit"></i></a></td>
                                <td class="export-ignore">
                                    <a data-toggle="modal" type="button" title="Eliminar"
                                        data-target="#modal-eliminar-material"><i class="fa fa-trash"></i></a>
                                    @include('otros_materiales.modal_eliminar')
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    @else
                    <div class="divider"></div>
                    <p class="center-align">No hay elementos para mostrar.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <a class="badge bg-primary" href="{{url('/')}}"><i class="fa fa-check"></i> Volver</a>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="{{ asset('js/export_material.js') }}"></script>

<script>
    document.getElementById('categoria-filtro').addEventListener('change', function () {
        filtrarTabla();
    });
    function filtrarTabla() {
        var categoriaSeleccionada = document.getElementById('categoria-filtro').value;
        var tablaItems = document.getElementById('tabla-items');
        var filas = tablaItems.getElementsByTagName('tr');
        for (var i = 1; i < filas.length; i++) { // Comienza en 1 para omitir la fila de encabezado
            var categoriaItem = filas[i].getElementsByTagName('td')[1].textContent; // Cambiar el índice a la columna de categoría (tipo_id)
            if ( categoriaSeleccionada === '' || categoriaSeleccionada === '00' || categoriaSeleccionada === categoriaItem ) {
                filas[i].style.display = ''; // Mostrar la fila si la categoría coincide o no se ha seleccionado ninguna categoría
            } else {
                filas[i].style.display = 'none'; // Ocultar la fila si la categoría no coincide
            }
        }
    }
</script>
<script>
    // Espera a que el documento esté listo
    $(document).ready(function() {
        // Escucha el clic en el enlace
        $('a[data-target="#modal-eliminar-item"]').click(function() {
            // Obtiene el valor del atributo data-item-id
            var itemId = $(this).data('item-id');
            
            // Asigna el valor al campo oculto del formulario
            $('#item_id').val(itemId);
        });
    });
</script>

<script>
document.getElementById('export').onclick = function () {
    const table = document.getElementById('tabla-items');
    const tableClone = table.cloneNode(true);

    // Reemplazar celdas truncadas por texto completo
    const descripcionCeldas = tableClone.querySelectorAll('.descripcion-column');
    descripcionCeldas.forEach(cell => {
        const fullText = cell.getAttribute('data-full-text');
        if (fullText) {
            cell.textContent = fullText;
        }
    });

    // Eliminar celdas que no deben exportarse
    const ignorar = tableClone.querySelectorAll('.export-ignore');
    ignorar.forEach(cell => cell.parentNode.removeChild(cell));

    // Crear HTML personalizado con título, fecha y firma
    const titulo = `<tr><td colspan="6" style="text-align:center; font-weight:bold; font-size:16px;">REPORTE DE ACTIVOS</td></tr>`;
    const fecha = `<tr><td colspan="6">Fecha: ${new Date().toLocaleDateString('es-ES')}</td></tr>`;
    const espacio = `<tr><td colspan="6">&nbsp;</td></tr>`;
    const firma = `<tr><td colspan="6" style="padding-top:30px;">Firma: ___________________________</td></tr>`;

    // Agregamos las partes al HTML
    const tablaConExtras =
        `<table border="1">${titulo}${fecha}${espacio}` +
        tableClone.innerHTML +
        `${espacio}${firma}</table>`;

    // Crear archivo Excel
    const blob = new Blob(['\uFEFF' + tablaConExtras], {
        type: 'application/vnd.ms-excel;charset=utf-8;'
    });

    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = `reporte_activos_${new Date().toISOString().slice(0, 10)}.xls`;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
};
</script>


@endsection