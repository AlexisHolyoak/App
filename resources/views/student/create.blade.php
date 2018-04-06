@extends('adminlte::layouts.app')
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registro de matrícula del alumno</h3>
        </div>
      <form role="form" action="{{route('student.store')}}" method="post">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="nombre">Nombre completo</label>
            <input type="text"id="nombre" name="name" value="" class="form-control" placeholder="Escribe tu nombre..." required>
            <p class="text-aqua">Escribe el nombre que aparecera en tus certificados</p>
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="dni">Documento de indentificación (D.N.I. o pasaporte)</label>
            <input type="number"id="dni" name="dni" value="" class="form-control" placeholder="Escribe tu documento de identifación..." required>
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="nombre">Correo electronico</label>
            <input type="email"id="nombre" name="email" value="" class="form-control" placeholder="Escribe tu correo electronico..." required>
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="date">Fecha de nacimiento</label>
            <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="fechanacimiento" class="form-control pull-right" id="datepicker" data-date-format="yyyy/mm/dd" data-date-end-date="-1820d" required>
            </div>
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="direccion">Dirección</label>
            <input type="text"id="direccion" name="direccion" value="" class="form-control" placeholder="Escribe la direccion de tu domicilio..." required>
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="direccion">Telefono</label>
            <input type="text"id="direccion" name="telefono" value="" class="form-control" placeholder="Escribe tu telefono fijo...">
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="direccion">Celular</label>
            <input type="text"id="direccion" name="celular" value="" class="form-control" placeholder="Escribe tu numero móvil..." required>
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="direccion">Carrera o especialidad</label>
            <input type="text"id="direccion" name="especialidad" value="" class="form-control" placeholder="Escribe tu carrera..." required>
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="direccion">Centro laboral</label>
            <input type="text"id="laboral" name="centrolaboral" value="" class="form-control" placeholder="Escribe tu centro laboral..." required>
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="conexion">¿Como te enteraste de nosotros?</label>
            <select class="form-control" name="conexion">
              <option value="facebook">FACEBOOK</option>
              <option value="google">GOOGLE</option>
            </select>
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="comentarios">Comentarios</label>
            <textarea name="comentarios" rows="8" cols="80" style="resize:none;" class="form-control"></textarea>
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <div class="pretty p-default p-thick p-pulse p-bigger">
                <input type="checkbox" name="checkbox" />
                <div class="state p-primary-o">
                    <label>Poseo una discapacidad</label>
                </div>
            </div>
            <br />
            <br>
            <input id="showthis" name="discapacidad" size="50" type="text" class="form-control" placeholder="Escribe la discapacidad que posees..."/>
          </div>
        </div>
        <div class="box-footer">
          <a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
          <button type="submit" name="button" class="btn btn-primary pull-right">Registrar</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('style')
<link rel="stylesheet" href="{{asset('plugins/datepicker/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/iCheck/pretty-checkbox.min.css')}}">
@endsection
@section('script')
<script type="text/javascript" src="{{asset('plugins/datepicker/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
  $(function () {
    //datepicker
    $('#datepicker').datepicker({
      autoclose: true
    })
    //show discapacidad input
    $('input[name="discapacidad"]').hide();
    $('input[name="checkbox"]').on('click', function () {
        if ($(this).prop('checked')) {
            $('input[name="discapacidad"]').fadeIn();
        } else {
            $('input[name="discapacidad"]').val('');
            $('input[name="discapacidad"]').hide();
        }
    });
});
</script>
@endsection
