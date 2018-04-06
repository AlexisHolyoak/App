<div class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true"  id="bs-aprove-{{$voucher->id}}" style="display:none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form class="" action="{{action('RoleController@acceptvoucher',$voucher->id)}}" method="post">
        {{ csrf_field() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="">Aprobar comprobante</h4>
        </div>
        <div class="modal-body">
          <h1>¿Esta seguro que desea aprobar esta comprobante?</h1>
          <img src="data:image/jpeg;base64,{{base64_encode($voucher->imagen)}}" alt="" border="5" class="img-thumbnail" height="800">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger"name="button">Aprobar</button>
          <button type="button" class="btn btn-default"name="button" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>
