@extends('adminlte::layouts.app')
@section('contentheader_title','Comprobante')
@section('htmlheader_title')
	Crear un nuevo comprobante
@endsection
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registra tu comprobante para el curso</h3>
        </div>
        <form class="" action="{{route('voucher.store')}}" method="post" files="true" enctype="multipart/form-data" name="myForm" id="myForm" onsubmit="waitingDialog.show('Enviando comprobante');">
          {{ csrf_field() }}
					@if(count($errors)>0)
						@foreach ($errors->all() as $error)
						<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-info"></i> Alerta!</h4>
	                {{$error}}
	          </div>
						@endforeach
					@endif
        <div class="box-body">

					<div class="form-group col-md-8 col-md-offset-2">
						<label for="modalidad">Selecciona la modalidad en la que quieres llevar tu curso.</label>
						<br>
						<div class="form-control text-center">
							<div class="pretty p-default p-thick p-pulse p-bigger">
									<input type="radio" name="modalidad" value="0" required />
									<div class="state p-primary-o">
											<label>ONLINE</label>
									</div>
							</div>
							<div class="pretty p-default p-thick p-pulse p-bigger">
									<input type="radio" name="modalidad" value="1" />
									<div class="state p-primary-o">
											<label>PRESENCIAL</label>
									</div>
							</div>
						</div>

					</div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="name">Nombre del curso</label>
            <select class="form-control" name="courses" id="courses"></select>
          </div>
					<!--DIV PARA MANEJAR A LOS USUARIOS QUE NECESITAN CURSO PRESENCIAL-->
          <div class="form-group col-md-8 col-md-offset-2" hidden id="iniciopdiv" name="iniciopdiv">
            <label for="fechainicio">Fecha de inicio</label>
            <select class="form-control" name="fechainicio" id="fechainicio"disabled>
            </select>
          </div>
					<!--DIV PARA MANEJAR A LOS USUARIOS QUE NECESITAN CURSO PRESENCIAL-->
					<!--DIV PARA MANEJAR A LOS USUARIOS QUE NECESITAN CURSO ONLINE-->
					<div class="form-group col-md-8 col-md-offset-2" hidden id="inicioodiv" name="inicioodiv">
            <label for="onlineinicio">Fecha de apartura de tu plataforma
							<br>(Escoge la fecha que quieres empezar a estudiar tu curso virtual)</label>
            <input type="date" name="onlineinicio" class="form-control">
          </div>
					<div class="form-group col-md-8 col-md-offset-2" hidden id="cierre" name="cierre">
            <label for="fechainicio">Fecha de cierre de la plataforma (Son 180 dias de acceso)</label>
            <input type="text" name="fechacierre" id="fechacierre" value="dd/mm/aaaa" class="form-control" disabled>
          </div>
					<!--DIV PARA MANEJAR A LOS USUARIOS QUE NECESITAN CURSO ONLINE-->
					<div class="form-group col-md-8 col-md-offset-2" hidden>
            <label for="display_name">Cantidad de Horas</label>
            <label for="" class="form-control"></label>
          </div>
					<div class="form-group col-md-8 col-md-offset-2" hidden>
            <label for="display_name">Incluye</label>
            <label for="" class="form-control"></label>
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="">Adjunta imagen de tu comprobante(max 1200kb)</label>
            <input type="file" name="imagen" value="" class="form-control"  accept="image/x-png,image/jpeg"required onchange="loadFile(event)" >
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <img src="" alt="" id="output" border="5" class="img-thumbnail"  style="display:none;">
          </div>
					<div class="form-group col-md-8 col-md-offset-2">
            <label for="descripcion">Comentario</label>
            <textarea name="comentario" rows="8" cols="80" style="resize:none;" class="form-control" value="" ></textarea>
          </div>
        </div>
				<div class="progress" style="margin-top:100px">
				    <div class="progress-bar active" id="progressbar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
				        <span class="sr-only">0% Complete</span>
				    </div>
				</div>
        <div class="box-footer">
          <button type="button" name="button" class="btn btn-default">Cancelar</button>
          <button type="submit" name="button" class="btn btn-primary pull-right" >Registrar</button>
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
<script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/momentes.js')}}"></script>
<script type="text/javascript" src="{{asset('js/loading.js')}}"></script>
<script type="text/javascript">
var loadFile = function(event) {
	$('#output').show();
	var output = document.getElementById('output');
	output.src = URL.createObjectURL(event.target.files[0]);
};
</script>
<script type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('input[type=date][name=onlineinicio]').change(function() {
		var new_date = moment(this.value, "YYYY-MM-DD").add(180, 'days').format('LL');
		$('input[name=fechacierre]').val(new_date);
	});
    $('input[type=radio][name=modalidad]').change(function() {
			$('#fechainicio').empty();
			$('input[type=date][name=onlineinicio]').val("");
			var id=1;
			$('#courses').prop('disabled', false);
        if (this.value == '1') {
					//handle presencial
					$('input[type=date][name=onlineinicio]').prop('required',false);
					$('#fechainicio').prop('required',true);
					$('#iniciopdiv').show();
					$('#cierre').hide();
					$('#inicioodiv').hide();
					$.get('/ajax-presencial/'+id,function(data){
						$('#courses').empty();
						$('#courses').append('<option value="0" disabled selected>Seleccione un curso...</option>');
		        $.each(data,function(index,o){
		          $('#courses').append('<option value="'+o.id+'">'+o.nombre+'</option>')
		        });
		      });
        }
        else if (this.value == '0') {
					//handle online chosen
					$('#cierre').show();
					$('#iniciopdiv').hide();
					$('#inicioodiv').show();
					$('input[type=date][name=onlineinicio]').prop('required',true);
					$('#fechainicio').prop('required',false);
					$.get('/ajax-online/'+id,function(data){
						$('#courses').empty();
						$('#courses').append('<option value="0" disabled selected>Seleccione un curso...</option>');
		        $.each(data,function(index,o){
		          $('#courses').append('<option value="'+o.id+'">'+o.nombre+'</option>')
		        });
		      });
        }
    });
		//MUESTRA LAS FECHA DE INICIO DISPONIBLE (SOLO MUESTRA 5), SEGUN EL CURSO SELECCIONADOS
		$('#courses').change(function(e){
		$('#fechainicio').empty();
    var id=e.target.value;
    $('#fechainicio').prop('disabled', false);
    $.get('/ajax-inicios/'+id, function(data){
        //$('#fechainicio').append('<option value="0" disabled selected>Seleccione una fecha de inicio...</option>');
        $.each(data, function(index, o){
            $('#fechainicio').append('<option value="'+o.id+'">'+o.orden+': '+o.fechainicio+'</option>');
        });
    	});
		});
});
</script>
@endsection
