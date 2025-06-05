@extends('layouts.app')

@section('content')
<style>
    p {
        color: black;
        margin: 0;
        /* Elimina el margen vertical predeterminado */
        padding: 0;
        /* Elimina el espacio interno predeterminado */
        line-height: 2;
        /* Establece la altura de lÃ­nea deseada */
        font-size: 14px;
    }
</style>
<section class="section">
    <div class="col-lg-6" style="margin: 0 auto;">
        <!-- Card with header and footer -->
        <div class="card">
            <div class="card-header" style="text-align: center">{{$item->activo->activo}}</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('img/fotos/'.auth()->user()->dep->sigla.'/'.$item->image) }}" alt="Foto"
                            width="250" height="200">
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title">Area: {{$item->area->nombre}}</h5>
                        <h6><b>Tipo:</b> {{$item->tipo->nombre}}</h6>
                        <h6><b>fecha compra:</b> {{ \Carbon\Carbon::parse($item->fecha_compra)->format('d/m/Y') }}</h6>
                        <h6><b>Encargado:</b> {{$item->area->encargado}}</h6>
                        <h6><b>Centro de Analisis:</b> {{$item->centro->centro_analisis}}</h6>
                    </div>
                    <div class="col-md-12">
                        <p><b>Descripción:</b> {{$item->descripcion}}</p>
                    </div>
                    <div class="col-md-12">
                        <div class="row" id="graficoBarras"
                            style="margin-left: 0; margin-right: 5%; background: white;">
                            <div class="col-md-2">
                                <div style="text-align: center">
                                    <img src="data:image/png;base64,{{ base64_encode($qrImage) }}" alt="QR Code"
                                        width="160" height="160">
                                </div>
                            </div>
                            <div class="col-md-8" style="margin-left: 15%;">
                                <p style="text-align: center; color:black"><b>{{$item->codigo}}</b></p>
                                <p><b>{{$item->activo->activo}}</b></p>
                                <p><b>{{$item->tipo->nombre}}</b></p>
                                <p><b>{{$item->area->nombre}}</b></p>
                                <p><b>SEDE {{ mb_strtoupper(auth()->user()->dep->nombre, 'UTF-8')}} {{date('Y')}}</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div style="display: flex; justify-content: center; align-items: center;">
                    @if($item->estado != 0 && Auth()->user()->permiso->editar_item == 1)
                    <a class="btn btn-outline-primary" href="{{ url('admin/item/'.$item->id.'/edit')}}">
                        <i class="bi bi-pen"></i> Editar
                    </a>
                    @else
                    <a type="button" class="btn btn-outline-danger" data-toggle="modal"
                        data-target="#modal-show-inactivo">
                        <i class="bi bi-clipboard-minus"></i> Inactivo
                    </a>
                    @include('items.show_inactivo')
                    @endif
                    <a class="btn btn-outline-primary" id="btnimgGraficaBarras" style="margin-left: 20px;">
                        <i class="bi bi-card-image"></i> Crear IMG
                    </a>
                </div>
            </div>
            <br>
        </div>


        <!--form id="image-form" method="post" action="{{ url('admin/printQR/') }}" enctype="multipart/form-data" style="display:none;">
        {{ csrf_field() }}
        <input type="hidden" name="id_item" value="{{$item->id}}">
        <input type="hidden" name="codigo" value="{{$item->codigo}}">
        <input type="hidden" id="image-data" name="image_data">
          <div id="image-preview-container">
            <img id="image-preview" src="" alt="Vista previa de la imagen">
          </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Guardar Img</button>
        </div>
      </form-->
        <div id="seleccion">
            <img id="image-preview" src="" alt="Vista previa de la imagen">
        </div>

        <br>
        <div class="text-center">
            <a href="javascript:imprSelec('seleccion')" class="btn btn-primary">Imprimir</a>
            <a href="{{ url('admin/area/'.$item->area->id.'/show') }}" class="btn btn-secondary">Volver</a>
        </div>
</section>

<script src="{{ asset('imagenseccion/librerias/jquery-3.4.1.min.js')}}"></script>
<script src="{{ asset('imagenseccion/librerias/bootstrap4/popper.min.js')}}"></script>
<script src="{{ asset('imagenseccion/librerias/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{ asset('imagenseccion/librerias/plotly-latest.min.js')}}" charset="utf-8"></script>
<script src="{{ asset('imagenseccion/librerias/htmlToCanvas.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>

<script type="text/javascript">
    var imagePreview = document.getElementById('image-preview');
  var imageDataInput = document.getElementById('image-data');
  var imageForm = document.getElementById('image-form');
  var btnimgGraficaBarras = document.getElementById('btnimgGraficaBarras');

  btnimgGraficaBarras.addEventListener('click', function() {
    imageForm.style.display = 'block';
  });

  $(document).ready(function(){
      $('#btnimgGraficaBarras').click(function(){
        tomarImagenPorSeccion('graficoBarras','graficoBarras');
      });
    });

  function tomarImagenPorSeccion(div,nombre) {
      html2canvas(document.querySelector("#" + div)).then(canvas => {
        var img = canvas.toDataURL();
        base = "img=" + img + "&nombre=" + nombre;
        imagePreview.src = img;
        imageDataInput.value = encodeURIComponent(img);
        //imageForm.sunmit();
      });	
    }

function imprSelec(nombre) {
  var ficha = document.getElementById(nombre);
  var ventimp = window.open(' ', 'popimpr');
  ventimp.document.write('<html><head><style>@media print { img { width: 100%; height: auto; } }</style></head><body>');
  ventimp.document.write(ficha.innerHTML);
  ventimp.document.write('</body></html>');
  ventimp.document.close();
  ventimp.print();
  ventimp.close();
}

</script>

@endsection