@extends('adminlte::layouts.app')
@section('contentheader_title','Mis alumnos presenciales')
@section('htmlheader_title')
	Mis Alumnos presenciales
@endsection
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registros de alumnos presenciales</h3>
        </div>
				<div class="box-body">
              <div class="table-responsive">
                <table id="dataTables" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="display:none;">
                  <thead>
                    <tr>
                      <th data-priority="1">Nombre del alumno</th>
											<th data-priority="3">D.N.I.</th>
                      <th data-priority="8">Fecha de nacimiento</th>
                      <th data-priority="9">Dirección</th>
                      <th data-priority="14 ">Email</th>
                      <th data-priority="7">Celular</th>
                      <th data-priority="11">Telefono</th>
                      <th data-priority="12">Carrera</th>
                      <th data-priority="10">Centro laboral</th>
                      <th data-priority="13">Discapacidad</th>
                      <th data-priority="4">Curso</th>
                      <th data-priority="5">Fecha de inicio</th>
                      <th data-priority="6">Fecha de conclusión</th>
                      <th data-priority="16">Medio de conexión</th>
                      <th data-priority="17">Estado del grupo</th>
                      <th data-priority="2" width="1%">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
										@foreach($vouchers as $voucher)
									<tr>
										<td>{{$voucher->SNOMBRE}}</td>
										<td>{{$voucher->SDNI}}</td>
										<td>{{$voucher->SNACIMIENTO}}</td>
										<td>{{$voucher->SDIRECCION}}</td>
										<td>{{$voucher->SEMAIL}}</td>
										<td>{{$voucher->SCEL}}</td>
										<td>{{$voucher->STEL}}</td>
										<td>{{$voucher->SESPECIALIDAD}}</td>
										<td>{{$voucher->SLABORAL}}</td>
										<td>@if(!empty($voucher->SDISCAPACIDAD))
											{{$voucher->SDISCAPACIDAD}}
										@else
										Ninguno
										@endif</td>
										<td>{!!$voucher->CNOMBRE!!}</td>
										<td>{{$voucher->GINICIO}}</td>
										<td>{{$voucher->GCONCLUSION}}</td>
										<td>{{$voucher->SCONEXION}}</td>
										<td>
											@if($voucher->GESTADO==1)
											ACTIVO
										@endif
											@if($voucher->GESTADO==0)
											CONCLUIDO
										@endif
										</td>
										<td>
											<a href="#" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#bs-presencial-{{$voucher->ID}}">Certificado</a>
											<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> </a> </td>
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
@foreach($vouchers as $voucher)
@include('presencial.certificado')
@endforeach
@endsection
@section('style')
<link rel="stylesheet" href="{{asset('plugins/datatables/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables/css/responsive.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/iCheck/pretty-checkbox.min.css')}}">
@endsection
@section('script')
<script type="text/javascript" src="{{asset('plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/responsive.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/js/vfs_fonts.js')}}"></script>
<script type="text/javascript">
$(function () {
	$('#dataTables').fadeIn();
	$('#dataTables').DataTable({
    dom: 'Blfrtip',
      buttons:[{
        extend: 'pdf',
           footer: true,
           title:'Reporte de alumnos',
           exportOptions: {
                columns: [0,1,2,3,6,7,10]
            }
      },
      {
            extend: 'excel',
            title:'Reporte de alumnos',
            exportOptions: {
                columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14]
             }
      },
      {
            extend: 'print',
            title:'Reporte de alumnos',
            exportOptions: {
                columns: [0,1,2]
             }
      }]
  });
});
</script>

@endsection
