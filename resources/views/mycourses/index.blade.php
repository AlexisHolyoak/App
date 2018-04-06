@extends('adminlte::layouts.app')
@section('contentheader_title','Mis cursos')
@section('htmlheader_title')
	Mis cursos
@endsection
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box box-header with-border">
          <h2 class="box-title">Tus cursos</h3>
        </div>
        <div class="box-body">
          <div class="">
            Gracias por matricularte, aqui puedes hecharle un ojo a todos los cursos que posees(No olvides actualiar tu <a href="{{route('student.edit',$user->id)}}"> Ficha de matricula con tus datos correctamente.</a> )
          </div>
          @foreach($vouchers as $voucher)
          <form action="{{route('mycourses.store',$voucher->id)}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
						@if($course->where('id',$voucher->course_id)->first()->online)
            <div class="panel panel-primary">
              <div class="panel-heading">
                  <h1 class="panel-title">{!!$course->where('id',$voucher->course_id)->first()->nombre!!}</h1>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-xs-6">
                    <b>Fecha de inicio </b><p>{{$voucher->onlineinicio}}</p>
                    <b>Fecha de conclusion </b><p>(180 dias despues de la fecha de inicio)</p>
                  </div>
									<div class="col-xs-6">
										<b>Modalidad</b>
										<p>
											Online
										</p>
									</div>
									<!--
									<div class="col-xs-6">
										<b>Estado</b>
										<p>
											<label></label>
										</p>
									</div>-->
                </div>
              </div>
							<div class="panel-footer">
								<!--PARA LOS USUARIOS ONLINE EL ESTADO DEL CERTIFICADOD DEBE CERO UNO PARA ESTABLECER QUE TIENEN LA OPCION DISPONIBLE-->
								@if($voucher->certificado==0)
								<a href="{{route('voucher.certificadoonlinepdu',$voucher->id)}}" class="btn btn-primary"><i class="fa fa-cloud-download"></i> Descargar certificado (PDU)</a>
								@endif
							@if($voucher->student_id=='')
								<a href="#" class="btn btn-primary">Enviar ficha de matricula</a>
							@endif
							</div>
              </div>
							@endif
							@if($course->where('id',$voucher->course_id)->first()->presencial)
							<div class="panel panel-primary">
	              <div class="panel-heading">
	                  <h1 class="panel-title">{!!$course->where('id',$voucher->course_id)->first()->nombre!!}</h1>
	              </div>
	              <div class="panel-body">
	                <div class="row">
	                  <div class="col-xs-6">
	                    <b>Fecha de inicio </b><p>{{$group->where('id',$voucher->group_id)->first()->fechainicio}}</p>
	                  </div>
										<div class="col-xs-6">
											<b>Modalidad</b>
											<p>
												Presencial
											</p>
										</div>
										<div class="col-xs-6">
											 <b>Fecha de conclusion </b><p>{{$group->where('id',$voucher->group_id)->first()->fechaconclusion}}</p>
										</div>
										<div class="col-xs-6">
											<b>Dias</b>
											<p>
												@if($course->where('id',$voucher->course_id)->first()->lunes)
												Lunes
												@endif
												@if($course->where('id',$voucher->course_id)->first()->martes)
												Martes
												@endif
												@if($course->where('id',$voucher->course_id)->first()->miercoles)
												Miercoles
												@endif
												@if($course->where('id',$voucher->course_id)->first()->jueves)
												Jueves
												@endif
												@if($course->where('id',$voucher->course_id)->first()->viernes)
												Viernes
												@endif
												@if($course->where('id',$voucher->course_id)->first()->sabado)
												Sabado
												@endif
												@if($course->where('id',$voucher->course_id)->first()->domingo)
												Domingo
												@endif
											</p>
										</div>
										<!--handle certificado prev permission-->
										<!--
										<div class="col-xs-6">if($course->where('id',$voucher->id)->first()->lunes
											<b>Estado</b>
											<p>
												<label></label>
											</p>
										</div>-->
	                </div>
	              </div>
									<div class="panel-footer">
										<!--PARA LOS USUARIOS PRESENCIALES EL ESTADO DEL CERTIFICADOD DEBE SER UNO PARA ESTABLECER QUE TIENEN LA OPCION DISPONIBLE-->
										@if($voucher->certificado==1)
											@if($group->where('id',$voucher->group_id)->first()->estado ==0)
												<a href="{{route('voucher.certificadopresencialpdu',$voucher->id)}}" class="btn btn-primary"><i class="fa fa-cloud-download"></i> Descargar certificado (PDU)</a>
											@endif
										@endif
									@if($voucher->student_id=='')
										<button type="submit" name="button" class="btn btn-primary">Enviar mi ficha de matricula</button>
									@endif
									</div>
	              </div>
							@endif
            </form>
            @endforeach
						<div class="form-group">
							¿Deseas agregar otro curso? <a href="{{route('voucher.create')}}">¡Haz click Aqui!</a>
						</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
