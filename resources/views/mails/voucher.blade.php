<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<style type="text/css">
	.btn {
			background-color: #4CAF50; /* Green */
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
		}
		.responsive {
			max-width: 500px;
	    height: auto;
			width:100%;
	}
	</style>
</head>
<body>
	<h2>Solicitud de matricula</h2>
	<div class="modalidad">
		@if($course->online)
		<h4>Modalidad</h4> Online
		@endif
		@if($course->presencial)
		<h4>Modalidad</h4> Presencial
		@endif
	</div>
	<div class="group">
		@if(!empty($group))
		<div class="group-start">
			<h4>Fecha de inicio: </h4> {{$group->fechainicio}}
		</div>
		<div class="group-end">
			<h4>Fecha de conclusión: </h4> {{$group->fechaconclusion}}
		</div>
		@else
		<div class="apertura">
			<h4>Fecha deseada de apertura de plataforma: </h4> {{$vouchers->onlineinicio}}
		</div>
		@endif
	</div>
	<div class="course">
		<div class="course-title">
			<h4>Nombre del curso: </h4> {{$course->nombre}}
		</div>
		<div class="dias">
			<h4>Dias: </h4>
			@if($course->lunes)
			- Lunes <br>
			@endif
			@if($course->martes)
			- Martes <br>
			@endif
			@if($course->miercoles)
			- Miercoles <br>
			@endif
			@if($course->jueves)
			- Jueves <br>
			@endif
			@if($course->viernes)
			- Viernes <br>
			@endif
			@if($course->sabado)
			- Sabado <br>
			@endif
			@if($course->domingo)
			- Domingo <br>
			@endif
		</div>
	</div>
	<div class="usuario">
		<div class="usuario-name">
			<h4>Nombre del usuario: </h4> {{$usuario->name}}
		</div>
		<div class="usuario-email">
			<h4>Correo del usuario: </h4> <a href="mailto:{{$usuario->email}}">{{$usuario->email}}</a>
		</div>
	</div>
	<div class="voucher">
		<div class="comentario">
			<h4>Comentario: </h4> {{$vouchers->comentario}}
		</div>
		<div class="Fecha">
			<h4>Enviado: </h4> {{$vouchers->created_at}}
		</div>
	</div>
	<div class="rol">
		<a href="{{ URL::to('/rolegiven/'.$vouchers->id) }}" class="btn">APROBAR SOLICITUD</a>
	</div>
</body>
</html>
