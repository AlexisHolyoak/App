<div class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true"  id="bs-conclude-{{$group->id}}" style="display:none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form class="" action="{{route('group.conclude',$group->id)}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="">Concluir grupo</h4>
        </div>
        <div class="modal-body">
          <h1>¿Esta seguro que desea concluir este grupo?</h1>
          <p>Escoge la fecha en la que el grupo concluira. Estaras otorgandole su certificado a todos los alumnos que tienen su estado activo(Recuerda exluir a los alumnos que no deseas que tengan certificado de manera individual)</p>
          <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" name="fechacierre" class="form-control" placeholder="Selecciona la fecha de conclusión del grupo" data-date-format="yyyy/mm/dd" today-highlight="true" data-date-start-date="{{$group->fechainicio}}" value="{{$group->fechaconclusion}}">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger"name="button">Concluir</button>
          <button type="button" class="btn btn-default"name="button" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>
