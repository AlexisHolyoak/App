<div class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true"  id="bs-disponibility-{{$group->id}}" style="display:none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form class="" action="{{route('group.disponibility',$group->id)}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="">Concluir grupo</h4>
        </div>
        <div class="modal-body">
          <h1>¿Esta seguro que desea cambiar la disponibilidad de este grupo?</h1>
          <p>Por defecto todos los grupos que creas estaran disponibles para que los alumnos puedan inscribirse en dicho grupo, si la cantidad de alumnos inscritos es la suficiente entonces porfavor cambia la disponibilidad a NO DISPONIBLE</p>
          <div class="form-group">
						<label for="modalidad">Selecciona la disponibilidad del grupo.</label>
						<br>
						<div class="form-control text-center">
							<div class="pretty p-default p-thick p-pulse p-bigger">
									<input type="radio" name="disponibilidad" value="1" required {{($group->disponibilidad ==1)? 'checked':''}} />
									<div class="state p-primary-o">
											<label>DISPONIBLE</label>
									</div>
							</div>
							<div class="pretty p-default p-thick p-pulse p-bigger">
									<input type="radio" name="disponibilidad" value="0" {{($group->disponibilidad ==0)? 'checked':''}} />
									<div class="state p-primary-o">
											<label>NO DISPONIBLE</label>
									</div>
							</div>
						</div>

					</div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger"name="button">Cambiar disponibilidad</button>
          <button type="button" class="btn btn-default"name="button" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>
