<div id="modal-show-inactivo" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center">El {{$item->activo->activo}} esta dado de baja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Dado de baja por: </div>
                        <div class="col-lg-9 col-md-8">{{$item->user_baja}}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Motivo: </div>
                        <div class="col-lg-9 col-md-8">{{$item->Observacion->observacion}}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Fecha de Baja: </div>
                        <div class="col-lg-9 col-md-8">{{$item->fecha_baja}}</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>