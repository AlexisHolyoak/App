@extends('adminlte::layouts.app')
@section('contentheader_title','Cursos')
@section('htmlheader_title')
	Cursos
@endsection
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registros de cursos</h3>
          <a href="{{route('course.create')}}" class="btn btn-primary pull-right">Nuevo Curso</a>
        </div>
				<div class="box-body">
              <div class="table-responsive">
                <table id="dataTables" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="display:none;">
                  <thead>
                    <tr>
                      <th data-priority="1">Nombre del curso</th>
											<th data-priority="2">Dias</th>
                      <th>Horas</th>
                      <th>Hora de inicio</th>
                      <th>Hora de conclusión</th>
                      <th>Tipo</th>
											<th>Días</th>
											<th>Incluye</th>
											<th>PDU</th>
                      <th>Descripción</th>
                      <th data-priority="3" width="1%">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
										@foreach($courses as $course)
                    <tr>
                      <td>{!!$course->nombre!!}</td>
											<td>{{$course->dias}}</td>
											<td>{{$course->horas}}</td>
											<td>{{$course->horainicio}}</td>
											<td>{{$course->horaconclusion}}</td>
											<td>@if($course->online == 1)
												Online
											@endif
											@if($course->presencial == 1)
												Presencial
											@endif
											</td>
											<td>@if($course->lunes)
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
												</td>
												<td>{{$course->incluye}}</td>
												<td>{{$course->pdu}}</td>
												<td>{{$course->descripcion}}</td>
                      <td><a href="{{route('course.edit',$course->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                          <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#bs-delete-modal-lg"><i class="fa fa-close"></i></a>
                      </td>
                    </tr>
										@endforeach
                  </tbody>
                </table>
              </div>
				</div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('style')
<link rel="stylesheet" href="{{asset('plugins/datatables/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables/css/responsive.bootstrap.min.css')}}">
@endsection
@section('script')
<script type="text/javascript" src="{{asset('plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/responsive.bootstrap.min.js')}}"></script>
<!--
<script type="text/javascript" src="{{asset('plugins/datatables/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/vfs_fonts.js')}}"></script>
-->
<script type="text/javascript">
$(function () {
	$('#dataTables').fadeIn();
	$('#dataTables').DataTable({
		responsive: true
	});
});
</script>

@endsection
