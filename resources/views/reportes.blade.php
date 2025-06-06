@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header" style="text-align: center; color:black; font-weight: 700; text-decoration: underline;">
            REPORTES DE ACTIVOS</div>
        <div class="card-body">
            @if($errors->any())
            <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                <span class="alert-text text-black">{{$errors->first()}}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
            @endif
            @if(session('success'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-black">{{ session('success') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">filtrar</h5>
                    <form class="row g-3" method="POST" action="{{ route('buscar.activo.reporte') }}">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <select name="activo" class="form-control searchActivo" id="searchActivo"></select>
                        </div>
                        <div class="col-md-6">
                            <select name="tipo" class="form-select" id="tipoActivo" aria-label="State">
                                <option value="" disabled selected>Seleccionar un tipo</option>
                                @foreach ($tipos as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                            <button type="reset" class="btn btn-secondary">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="col-12">
                <div class="card recent-sales">
                    <div class="card-body">
                        <h5 class="card-title">Resultados </h5>
                        <span class="input-group-text">
                            <button class="btn btn-light" id="export"><i class="fa fa-file"></i> Descargar</button>
                        </span>
                        <a href="{{ route('exportar.activos') }}" class="btn btn-success">
                            <i class="fa fa-file-excel-o"></i> Exportar a Excel
                        </a>
                        <table class="table table-borderless datatable" id="Table-Activos">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($resultados && count($resultados) > 0)
                                @foreach ($resultados as $item)
                                <tr>
                                    <th scope="row">{{ $num++ }}</th>
                                    <td>{{ $item->codigo }}</td>
                                    <td>{{ optional($item->activo)->activo }}</td>
                                    <td>{{ optional($item->area)->nombre }}</td>
                                    <td>{{ optional($item->tipo)->nombre }}</td>
                                    <td>{{ optional($item->Estado)->estado }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script src="{{ asset('assets/js/jquery-3.6.0.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
            console.log('entramos');
            $("#searchActivo").select2({
                placeholder: 'Escriba el activo',
                allowClear: true,
                ajax: {
                    url: "{{ route('search.activos') }}",
                    type: "post",
                    delay: 250,
                    dataType: 'json',
                    data: function(params) {
                        return {
                            name: params.term,
                            "_token": "{{ csrf_token() }}",
                        };
                    },
                    processResults: function(data) {
                        console.log(data);
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.activo
                                }
                            })
                        };
                    },
                },
            });
        });
</script>

<script>
    document.getElementById('export').onclick = function () {
        exportTableToCSV('datos_activos.csv');
    };

    function exportTableToCSV(filename) {
        const table = document.getElementById('Table-Activos');
        let csv = 'Encabezado 1,Encabezado 2,Encabezado 3\n'; // encabezado manual
        csv += '\n'; // línea vacía para separación

        for (let row of table.rows) {
            let rowData = [];
            for (let cell of row.cells) {
                // Limpiar texto y escapar comillas
                let text = cell.textContent.replace(/"/g, '""');
                rowData.push('"' + text + '"');
            }
            csv += rowData.join(',') + '\n';
        }
        // BOM + CSV content
        const csvBlob = new Blob(['\uFEFF' + csv], { type: 'text/csv;charset=utf-8;' });
        const downloadLink = document.createElement("a");
        downloadLink.href = URL.createObjectURL(csvBlob);
        downloadLink.download = filename;
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    }
</script>
<!--

    <script>
    document.getElementById('export').onclick = function () {
        var tableId = document.getElementById('Table-Activos').id;
        htmlTableToExcel(tableId, '');
    }

    var htmlTableToExcel = function (tableId, fileName = '') {
        var excelFileName = 'datos_de_tabla_excel';
        var TableDataType = 'application/vnd.ms-excel';
        var selectTable = document.getElementById(tableId);

        // Obtener todas las celdas de la tabla
        var cells = selectTable.querySelectorAll('td');
        // Reemplazar el contenido de las celdas con la versión completa de la descripción
        for (var i = 0; i < cells.length; i++) {
            var cell = cells[i];
            if (cell.classList.contains('descripcion-column')) { // Asegurarse de que se aplique solo a la columna de descripción
                var truncatedText = cell.textContent;
                var fullText = cell.getAttribute('data-full-text');
                cell.textContent = fullText;
            }
        }
        // Eliminar las celdas con la clase "export-ignore" antes de codificar la tabla
        var cellsToExclude = selectTable.querySelectorAll('.export-ignore');
        for (var i = 0; i < cellsToExclude.length; i++) {
            var cell = cellsToExclude[i];
            cell.parentNode.removeChild(cell);
        }
        
        // Codificar la tabla y agregar el BOM para UTF-8
        var htmlTable = '\uFEFF' + encodeURIComponent(selectTable.outerHTML);

        // Restaurar el contenido truncado en las celdas de descripción
        for (var i = 0; i < cells.length; i++) {
            var cell = cells[i];
            if (cell.classList.contains('descripcion-column')) {
                cell.textContent = truncatedText;
            }
        }
        
        fileName = fileName ? fileName + '.xls' : excelFileName + '.xls';
        var excelFileURL = document.createElement("a");
        document.body.appendChild(excelFileURL);
        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob([htmlTable], {
                type: TableDataType
            });
            navigator.msSaveOrOpenBlob(blob, fileName);
        } else {
            excelFileURL.href = 'data:' + TableDataType + ', ' + htmlTable;
            excelFileURL.download = fileName;
            excelFileURL.click();
        }
    }
</script>
-->

@endsection