<div class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true"  id="bs-presencial-{{$voucher->ID}}" style="display:none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form class="" action="{{route('presencial.certificado',$voucher->ID)}}" method="post">
        {{ csrf_field() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="">Manejar el permiso de certificado</h4>
        </div>
        <div class="modal-body">
          <h1>Aqui puedes controlar la visualizacion de certificado</h1>
          <p>Recuerda que si es un alumno online por defecto su certificado estara inhabilitado, deberias activar que visualice sus certificado solo cuando ya haya aprovado el curso virtual.</p>
          <div class="form-group">
						<label for="modalidad">Selecciona la disponibilidad del grupo.</label>
						<br>
						<div class="form-control text-center">
							<div class="pretty p-default p-thick p-pulse p-bigger">
									<input type="radio" name="disponibilidad" value="0" required {{($voucher->VCERTIFICADO ==0)? 'checked':''}} />
									<div class="state p-primary-o">
											<label>DISPONIBLE</label>
									</div>
							</div>
							<div class="pretty p-default p-thick p-pulse p-bigger">
									<input type="radio" name="disponibilidad" value="1" {{($voucher->VCERTIFICADO ==1)? 'checked':''}} />
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
