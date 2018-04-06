@extends('adminlte::layouts.app')
@section('contentheader_title','Grupos')
@section('htmlheader_title')
	Crear un nuevo grupo
@endsection
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registro de un nuevo grupo</h3>
        </div>
        <form class="" action="{{route('group.store')}}" method="post">
          {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="name">Nombre del curso</label>
            <div class="input-group input-group-sm">
                  <select class="form-control" id="special2" style="width: 100%;" name="course_id">
                    <option value=""></option>
										@foreach($courses as $course)
                    <option value="{{$course->id}}">
											{!!$course->nombre!!}
											@if($course->lunes)
												Lunes
											@endif
											@if($course->martes)
												Martes
											@endif
											@if($course->miercoles)
												Miercoles
											@endif
											@if($course->jueves)
												Jueves
											@endif
											@if($course->viernes)
												Viernes
											@endif
											@if($course->sabado)
												Sabado
											@endif
											@if($course->domingo)
												Domingo
											@endif
											@if($course->online)
												Online
											@endif
											@if($course->presencial)
												Presencial
											@endif
											@if($course->dias != '')
												{{$course->dias}} dias
											@endif
											@if($course->horas != '')
												{{$course->horas}} horas
											@endif
											@if($course->horainicio != '')
												- Empieza a la: {{$course->horainicio}}
											@endif
											@if($course->horaconclusion != '')
												,Termina a la: {{$course->horaconclusion}}
											@endif
										</option>
										@endforeach
                  </select>
                  <span class="input-group-btn">
                      <a href="{{route('course.create')}}" class="btn btn-default"><i class="fa fa-plus"></i> </a>
                  </span>
                </div>
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="display_name">Fecha inicio</label>
            <input type="date"id="fechainicio" name="fechainicio" value="" class="form-control" placeholder="Escriba la cantidad de dias que dura el curso">
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
						<label for="orden">Orden</label>
						<select class="form-control" name="orden" required>
							<option value="">Seleccione una opción</option>
							<option value="Primer grupo">Primer grupo</option>
							<option value="Segundo grupo">Segundo grupo</option>
							<option value="Tercer grupo">Tercer grupo</option>
							<option value="Cuarto grupo">Cuarto grupo</option>
						</select>
					</div>
					<div class="form-group col-md-8 col-md-offset-2">
            <label for="display_name">Fecha conclusión</label>
            <input type="date"id="fechaconclusion" name="fechaconclusion" value="" class="form-control" placeholder="Escriba la cantidad de dias que dura el curso">
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <div class="pretty p-default p-thick p-pulse p-bigger">
                <input type="checkbox" name="estado" checked disabled />
                <div class="state p-primary-o">
                    <label>Estado</label>
                </div>
            </div>
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" rows="8" cols="80" style="resize:none;" class="form-control"></textarea>
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
