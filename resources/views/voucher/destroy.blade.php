<div class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true"  id="bs-eliminar-{{$voucher->VID}}" style="display:none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form class="" action="{{action('VoucherController@destroy',$voucher->VID)}}" method="post">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="">Eliminar comprobante de pago</h4>
        </div>
        <div class="modal-body" style="text-align:center;">
          <fieldset>
            ¿Estas seguro que deseas eliminar esta comprobante, has esto si consideras que la comprobante no tiene valides?
            <div class="">
              <a href="{{route('file.comprobante',$voucher->VID)}}" target="_blank">Previsualizar comprobante</a>
            </div>
          </fieldset>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger"name="button">Eliminar</button>
          <button type="button" class="btn btn-default"name="button" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>
