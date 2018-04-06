@extends('adminlte::layouts.app')
@section('contentheader_title','Grupos')
@section('htmlheader_title')
	Editar un grupo
@endsection
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Actualización del grupo</h3>
        </div>
        <form class="" action="{{route('group.update',$groups->id)}}" method="post">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="name">Detalle del curso</label>
            <div class="input-group input-group-sm">
                  <textarea name="detalle" rows="8" cols="80" style="resize:none;" class="form-control" disabled>{!!$course->nombre!!} | {{$course->horainicio}} - {{$course->horaconclusion}} | @if($course->lunes) Lunes @endif @if($course->martes) Martes @endif @if($course->miercoles) Miercoles @endif @if($course->jueves) Jueves @endif @if($course->viernes) Viernes @endif @if($course->sabado) Sabado @endif @if($course->domingo) Domingo @endif</textarea>
            </div>
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="display_name">Fecha inicio</label>
            <input type="date"id="fechainicio" name="fechainicio" value="{{$groups->fechainicio}}" class="form-control" placeholder="Escriba la cantidad de dias que dura el curso" required>
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
						<label for="orden">Orden</label>
						<select class="form-control" name="orden" required>
							<option value="">Seleccione una opción</option>
							<option value="Primer grupo" {{($groups->orden=='Primer grupo') ? ' selected' : ''}}>Primer grupo</option>
							<option value="Segundo grupo" {{($groups->orden=='Segundo grupo') ? ' selected' : ''}}>Segundo grupo</option>
							<option value="Tercer grupo" {{($groups->orden=='Tercer grupo') ? ' selected' : ''}}>Tercer grupo</option>
							<option value="Cuarto grupo" {{($groups->orden=='Cuarto grupo') ? ' selected' : ''}}>Cuarto grupo</option>
						</select>
					</div>
					<div class="form-group col-md-8 col-md-offset-2">
            <label for="display_name">Fecha conclusión</label>
            <input type="date"id="fechaconclusion" name="fechaconclusion" value="{{$groups->fechaconclusion}}" class="form-control" placeholder="Escriba la cantidad de dias que dura el curso" required>
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <label for="descripcion">Descripción</label>
            <textarea name="observacion" rows="8" cols="80" style="resize:none;" class="form-control"></textarea>
          </div>
        </div>
        <div class="box-footer">
          <a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
          <button type="submit" name="button" class="btn btn-primary pull-right">Actualizar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('plugins/iCheck/pretty-checkbox.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2/select2-bootstrap.min.css')}}">
@endsection
@section('script')

<script type="text/javascript" href="{{asset('plugins/select2/select2.min.js')}}"></script><!--
<script type="text/javascript">
$(document).ready(function() {
	$('#special2').select2();
});
</script>-->
@endsection
