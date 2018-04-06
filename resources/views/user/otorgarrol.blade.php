<div class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true"  id="bs-{{$usuario->id}}" style="display:none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form class="" action="{{action('UserController@userrole',$usuario->id)}}" method="post">
        {{ csrf_field() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="">Actualizar Rol</h4>
        </div>
        <div class="modal-body">
          <fieldset>
            <legend>Elige un Rol</legend>
            @foreach($roles as $rol)
            <label>
                <input type="radio" name="rol" value="{{$rol->id}}" required> {{$rol->name}}
            </label>
            @endforeach
          </fieldset>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger"name="button">Otorgar rol</button>
          <button type="button" class="btn btn-default"name="button" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>
