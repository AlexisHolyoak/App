<div class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true"  id="bs-{{$voucher->id}}" style="display:none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="">Comprobante de pago</h4>
        </div>
        <div class="modal-body" style="text-align: center">
          <img src="data:image/jpeg;base64,{{base64_encode($voucher->imagen)}}" alt="" border="5" class="img-thumbnail" height="800"> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default"name="button" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
  </div>
</div>
