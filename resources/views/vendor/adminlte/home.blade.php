@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Gesap
@endsection
@section('main-content')
<div class="container-fluid spark-screen">
	<div class="row">
			@if($user->hasRole('alumno'))
			<div class="alert alert-warning">
				<h4><i class="icon fa fa-warning"></i> Ficha de matricula!</h4>
				Actualiza los datos de matricula, es fácil y solo tendras que hacerlo una vez, recuerda que tienes que hacerlo antes de poder acceder a tus cursos :)
				<br><a href="{{route('student.edit',$user->id)}}"style="text-decoration:none;" class="btn btn-danger btn-sl">TU FICHA DE MATRICULA</a>
			</div>
			<div class="alert alert-success">
				<h4><i class="icon fa fa-check"></i> Mis cursos!</h4>
				Si ya actualizaste tu ficha de matricula, por favor haz click aqui para obtener acceso a la información virtual de tu(s) cursos(s).
				<br><a href="{{route('mycourses.index')}}"style="text-decoration:none;" class="btn btn-primary btn-sl">MIS CURSOS</a>
			</div>
			@endif
			@if(!$user->hasRole('administrador') and !$user->hasRole('alumno'))
				<div class="col-md-5 col-md-offset-3">
 				 <div class="box box-primary">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{asset('img/comprobante.png')}}" alt="User profile picture">
                <h3 class="profile-username text-center">BIENVENIDO</h3>
                <p class="text-muted text-center">Envianos tu comprobante</p>
                <ul class="list-group list-group-unbordered text-center">
                    <b>Hola, Aqui podras escoger el curso en el cual te quieras matricular. Usa esta opción cuando ya hayas obtenido tu comprobante de pago, puedes enviar tu comprobante en formate JPEG y PNG, asegurate que los datos sean legibles :)</b>
                </ul>
                <a href="{{route('voucher.create')}}" class="btn btn-primary btn-block"><b>Registrar mi pago</b></a>
              </div>
              <!-- /.box-body -->
          </div>
 			 </div>
			 @endif
			 @if($user->hasRole('administrador'))
			 @section('contentheader_title','Administrador')
			 <div class="row">
				 <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{$usercount}}</h3>
                <p>Usuarios Registrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('user.index')}}" class="small-box-footer">
                Mas información <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
					<div class="col-lg-3 col-xs-6">
             <!-- small box -->
             <div class="small-box bg-green">
               <div class="inner">
                 <h3>{{$stdcount}}</h3>
                 <p>Alumnos matriculados</p>
               </div>
               <div class="icon">
                 <i class="ion ion-university"></i>
               </div>
               <a href="{{route('student.index')}}" class="small-box-footer">
                 Mas información <i class="fa fa-arrow-circle-right"></i>
               </a>
             </div>
           </div>
					 <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3>{{$grpcount}}</h3>
                  <p>Grupos creados</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-pie"></i>
                </div>
                <a href="{{route('group.index')}}" class="small-box-footer">
                  Mas información <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
						<div class="col-lg-3 col-xs-6">
               <!-- small box -->
               <div class="small-box bg-red">
                 <div class="inner">
                   <h3>{{$crscount}}</h3>
                   <p>Cursos disponibles</p>
                 </div>
                 <div class="icon">
                   <i class="ion ion-ios-compose"></i>
                 </div>
                 <a href="{{route('course.index')}}" class="small-box-footer">
                   Mas información <i class="fa fa-arrow-circle-right"></i>
                 </a>
               </div>
             </div>
					 </div>
					 <div class="row">
						 <div class="col-md-3">
						 	<div class="box box-widget ">
						 		<div class="box-header bg-navy">
						 			<h3 class="widget-user-username">Información en detalle</h3>
						 		</div>
						 		<div class="box-footer no-padding">
						 			<ul class="nav nav-stacked">
						 				<li><a href="#">Grupos disponibles <span class="pull-right badge bg-blue">{{$grpdisponible}}</span></a></li>
						 				<li><a href="#">Grupos concluidos <span class="pull-right badge bg-aqua">{{$grpestado}}</span></a></li>
						 				<li><a href="#">Groupos en curso <span class="pull-right badge bg-green">{{$grpactual}}</span></a></li>
						 				<li><a href="#">Alumnos online <span class="pull-right badge bg-red">{{$stdonline}}</span></a></li>
						 				<li><a href="#">Alumnos presencial <span class="pull-right badge bg-red">{{$stdpresencial}}</span></a></li>
						 			</ul>
						 		</div>
						 	</div>
						 </div>
						 <!-- Calendar -->
						 <div class="box box-solid bg-purple-gradient col-md-4" >
						 <div class="box-header ui-sortable-handle" style="cursor: move;">
						 	<i class="fa fa-calendar"></i>
						 	<h3 class="box-title">Calendario</h3>
						 	<div class="pull-right box-tools">
						 		<div class="btn-group">
						 			<button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
						 				<i class="fa fa-bars"></i></button>
						 			<ul class="dropdown-menu pull-right" role="menu">
						 				<li><a href="{{route('group.create')}}">Crear grupo</a></li>
						 			</ul>
						 		</div>
						 		<button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
						 		</button>
						 		<button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
						 		</button>
						 	</div>
						 </div>
						 <div class="box-body no-padding">
							 <div class="" id="datepicker" class="datepicker" style="width:100%">

							 </div>
						 </div>
						 </div>
						 <!----------------------------------------->
						 <div class="col-md-5">
						 <!-- Custom Tabs (Pulled to the right) -->
						 <div class="nav-tabs-custom">
						 <ul class="nav nav-tabs pull-right">
						 	<li class="active"><a href="#tab_1-1" data-toggle="tab">Cursos</a></li>
							<li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Más Opciones <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#tab_2-2" data-toggle="tab">Grupos</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#tab_3-2" data-toggle="tab">Comprobantes</a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#tab_4-2" data-toggle="tab">Certificados</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li>
						 	<li class="pull-left header"><i class="fa fa-th"></i>Ayuda</li>
						 </ul>
						 <div class="tab-content">
						 	<div class="tab-pane active" id="tab_1-1">
						 		<b>Como usar el modulo de cursos:</b>

						 		<p>Aqui podras consultar información de como usar el modulo de cursos</p>
						 		Para crear un curso solo tienes que tener en cuenta que puede ser online o presencial,
								si posees un curso con ambas modalidades registra cada uno independientemente, es decir crea un curso
								con modalidad online y otro para presencial, recuerda que los cursos online no poseen ni dias ni cantidad de
								horas ni hora de inicio ni de conclusión,asi que deja esos espacios en blanco. Si el curso otorga PDU's no olvides
								registrar la cantidad que otorga.
								Si deseas crear un nuevo curso puedes hacerlo dando <a href="{{route('course.create')}}">¡Click Aqui!</a>
						 	</div>
						 	<!-- /.tab-pane -->
						 	<div class="tab-pane" id="tab_2-2">
								<b>Como usar el modulo grupos:</b>

						 		<p>Aqui podras consultar información de como usar el modulo de grupos</p>
						 		Para crear un grupo nuevo primero selecciona el curso que se dictara en dicho grupo, La fecha de inicio es obligatoria,
								tambien registra el orden del grupo en el mes es decir Primer grupo, Segundo Grupo, dependiendo de cual esta primero.
								La fecha de conclusión es un campo no obligatorio pero te recomiendo poner una fecha de conclusión referencial. Ten en cuenta
								El sistema no concluira el grupo en dicha fecha para hacerlo tu tendras que dar click en la opción de concluir, cuando
								hagas eso estaras otorgando su certificado a todos los alumnos inscritos en dicho grupo. Consulta la ayuda de certificados para obtener más información.
								Si deseas crear un nuevo curso puedes hacerlo dando <a href="{{route('group.create')}}">¡Click Aqui!</a>
						 	</div>
						 	<!-- /.tab-pane -->
						 	<div class="tab-pane" id="tab_3-2">
								<b>Como usar el modulo de comprobantes:</b>

						 		<p>Aqui podras consultar información de como usar el modulo de comprobantes</p>
						 		El usuario te enviara un comprobante al correo solicitando la aprobación para su inscripción en dicho grupo. asegurate
								de verificar la validez de dicha comprobante. Cuando apruebes la comprobante el usuario se volvera un alumno. de esta
								forma podra acceder a registrar su ficha de matricula, una vez hecho esto podra ver los datos del grupo en el cual se
								inscribio.
								Si deseas ver la lista de comprobantes de los usuarios y su estado <a href="{{route('voucher.index')}}">¡Click Aqui!</a>
						 	</div>
						 	<!-- /.tab-pane -->
							<!-- /.tab-pane -->
						<div class="tab-pane" id="tab_4-2">
							<b>Como usar el modulo de certificados:</b>

							<p>Aqui podras consultar información de como usar el modulo de certificados</p>
							Si el alumno esta inscrito de manera presencial
							podra ver su certificado de manera automatica cuando concluyas el grupo, si
							no deseas que el alumno pueda ver su certificado puedes hacerlo buscando al alumno <a href="{{route('presencial.index')}}">Haciendo click Aqui!</a> y luego
							anulandole la disponibilidad de previsualizar su certificado, esta opción se puede hacer antes o despues de concluido el grupo. Lo ideal si quieres anular que
							el alumno visualice su certificado seria hacerlo antes de culminado el grupo.
							<p>

							</p>
							Si el alumno esta inscrito en una modalidad online
							Por defecto un alumno online no podra visualizar su certificado. Para ello tendra que sustentar la aprovación de su curso online y luego de eso puedes otorgarle
							el permiso de ver su certificado <a href="{{route('online.index')}}">Haciendo click Aqui!</a>
						</div>
						<!-- /.tab-pane -->
						 </div>
						 <!-- /.tab-content -->
						 </div>
						 <!-- nav-tabs-custom -->
						 </div>
						 <!----------------------------------------->

					 </div>
			 @endif
		</div>
	</div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('plugins/slick/slick.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/slick/slick-theme.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datepicker/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/ionicons/css/ionicons.min.css')}}">
<style media="screen">
.list-group li {
	list-style: none;
	display:inline;
}
.Absolute-Center {
  margin: auto;
  position: absolute;
  top: 0; left: 0; bottom: 0; right: 0;
}
.datepicker-inline {
    width: 100%;
}
.datepicker table {
    width: 100%;
}
</style>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('plugins/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datepicker/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datepicker/locales/bootstrap-datepicker.es.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
      $('#slickcourses').slick({
				centerMode: true,
      centerPadding: '60px',
      slidesToShow: 3,
      prevArrow: $('.prev'),
      nextArrow: $('.next'),
			});
    });
</script>
<script type="text/javascript">
$(function () {
	//datepicker
	$('#datepicker').datepicker({
		 language: 'es',
		 todayHighlight: true,
		 container: 'div#dpcalendar,',
	});
});
</script>

@endsection
