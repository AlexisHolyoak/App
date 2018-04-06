@extends('adminlte::layouts.app')
@section('contentheader_title','Cursos')
@section('htmlheader_title')
	Actualizar un curso
@endsection
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Actualizar un curso</h3>
        </div>
        <form enctype="multipart/form-data" class="" action="{{route('course.update',$course->id)}}" method="post" files="true" >
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="MAX_FILE_SIZE" value="30971520">
        <div class="box-body">
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="name">Nombre del curso</label>
            <input type="text"id="name" name="nombre" value="{{$course->nombre}}" class="form-control" placeholder="Escribe el nombre del curso..." required>
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="display_name">Dias</label>
            <input type="text"id="dias" name="dias" value="{{$course->dias}}" class="form-control" placeholder="Escriba la cantidad de dias que dura el curso">
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <label for="precio">Precio</label>
            <input type="number"id="precio" name="precio" value="{{$course->precio}}" class="form-control" placeholder="Escriba el precio del curso">
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <label for="display_name">Cantidad de Horas</label>
            <input type="number"id="horas" name="horas" value="{{$course->horas}}" class="form-control" placeholder="Escribe la cantidad de horas del curso">
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <label for="display_name">Hora inicio</label>
            <input type="time"id="horainicio" name="horainicio" value="{{$course->horainicio}}" class="form-control" placeholder="Escribe el nombre del rol que se mostrara...">
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <label for="display_name">Hora conclusión</label>
            <input type="time"id="dias" name="horaconclusion" value="{{$course->horaconclusion}}" class="form-control" placeholder="Escribe el nombre del rol que se mostrara...">
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <div class="pretty p-default p-thick p-pulse p-bigger">
                <input type="checkbox" name="lunes" {{($course->lunes)? 'checked':''}}/>
                <div class="state p-primary-o">
                    <label>Lunes</label>
                </div>
            </div>
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <div class="pretty p-default p-thick p-pulse p-bigger">
                <input type="checkbox" name="martes" {{($course->martes)? 'checked':''}} />
                <div class="state p-primary-o">
                    <label>Martes</label>
                </div>
            </div>
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <div class="pretty p-default p-thick p-pulse p-bigger">
                <input type="checkbox" name="miercoles" {{($course->miercoles)? 'checked':''}} />
                <div class="state p-primary-o">
                    <label>Miercoles</label>
                </div>
            </div>
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <div class="pretty p-default p-thick p-pulse p-bigger">
                <input type="checkbox" name="jueves" {{($course->jueves)? 'checked':''}}/>
                <div class="state p-primary-o">
                    <label>Jueves</label>
                </div>
            </div>
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <div class="pretty p-default p-thick p-pulse p-bigger">
                <input type="checkbox" name="viernes" {{($course->viernes)? 'checked':''}} />
                <div class="state p-primary-o">
                    <label>Viernes</label>
                </div>
            </div>
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <div class="pretty p-default p-thick p-pulse p-bigger">
                <input type="checkbox" name="sabado" {{($course->sabado)? 'checked':''}} />
                <div class="state p-primary-o">
                    <label>Sabado</label>
                </div>
            </div>
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <div class="pretty p-default p-thick p-pulse p-bigger">
                <input type="checkbox" name="domingo" {{($course->domingo)? 'checked':''}} />
                <div class="state p-primary-o">
                    <label>Domingo</label>
                </div>
            </div>
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
						<label for="domingo">Selecciona tipos de modalidad</label>
            <div class="pretty p-default p-thick p-pulse p-bigger">
                <input type="checkbox" name="presencial" {{($course->presencial)? 'checked':''}} />
                <div class="state p-primary-o">
                    <label>Presencial</label>
                </div>
            </div>
						<div class="pretty p-default p-thick p-pulse p-bigger">
                <input type="checkbox" name="online"  {{($course->online)? 'checked':''}}/>
                <div class="state p-primary-o">
                    <label>Online</label>
                </div>
            </div>
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
						<label for="incluye">Incluye</label>
            <input type="text"id="name" name="incluye" value="{{$course->incluye}}" class="form-control" placeholder="Escribe lo que incluye el curso">
					</div>
					<div class="form-group col-md-8 col-md-offset-2">
            <label for="display_name">PDU's</label>
            <input type="number"id="pdu" name="pdu" value="{{$course->pdu}}" class="form-control" placeholder="Escriba la cantidad de PDU+s que tiene el curso">
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <label for="">Adjunta imagen de plantilla para el certificado</label>
            <input type="file" name="plantilla" value="" class="form-control"  accept="image/x-png,image/jpeg" onchange="loadFile(event)" >
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <img src="" alt="" id="output" border="5" class="img-thumbnail"  style="display:none;">
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" rows="8" cols="80" style="resize:none;" class="form-control">{{$course->descripcion}}</textarea>
          </div>
        </div>
        <div class="box-footer">
          <button type="button" name="button" class="btn btn-default">Cancelar</button>
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
@endsection
@section('script')
<script type="text/javascript">
var loadFile = function(event) {
	$('#output').show();
	var output = document.getElementById('output');
	output.src = URL.createObjectURL(event.target.files[0]);
};
</script>
@endsection
