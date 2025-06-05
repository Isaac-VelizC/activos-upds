<div id="modal-familiar" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center"><b>Dar de baja el activo {{$item->activo->activo}}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form action="{{ url('admin/item/'.$item->id.'/delete')}}" method="POST">
                    {{ csrf_field() }}
                    @if($errors->any())
                        <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white">
                            {{$errors->first()}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                            <span class="alert-text text-white">
                            {{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="encargado" class="form-control-label">{{ __('Nombre') }}</label>
                                <div class="@error('encargado')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ old('encargado') }}" type="text" placeholder="Nombre del encargado" id="encargado" name="encargado">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="id_area" class="form-control-label">Observación</label>
                            <select class="form-select" id="id_observacion" name="id_observacion" aria-label="Centro de Analisis">
                            <option value="" selected disabled>Observación</option>
                                @if( count($obser) > 0 )
                                    @foreach( $obser as $collection )
                                            <option value="{{$collection->id}}">{{$collection->observacion}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('id_observacion'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('id_observacion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">{{ 'Dar de Baja' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
