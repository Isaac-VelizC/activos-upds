<div class="modal fade" id="modal-eliminar-material" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('admin/material/'.$item->id.'/eliminar')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <h5 class="card-title">Area: {{$item->area->nombre}}</h5>
                    <h6><b>Encargado:</b> {{$item->area->encargado}}</h6>
                    <h6><b>Centro de Analisis:</b> {{$item->descripcion}}</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>