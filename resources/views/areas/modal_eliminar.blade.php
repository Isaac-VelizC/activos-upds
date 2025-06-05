<div class="modal fade" id="modal-eliminar-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Eliminar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('admin/item/'.$item->id.'/eliminar')}}" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <h5 class="card-title">Area: {{$item->id}}</h5>
                <h6><b>Tipo:</b> {{$item->tipo->nombre}}</h6>
                <h6><b>fecha compra:</b> {{ \Carbon\Carbon::parse($item->fecha_compra)->format('d/m/Y') }}</h6>
                <h6><b>Encargado:</b> {{$item->area->encargado}}</h6>
                <h6><b>Centro de Analisis:</b> {{$item->centro->centro_analisis}}</h6>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Eliminar</button>
            </div>
        </form>
      </div>
    </div>
</div>