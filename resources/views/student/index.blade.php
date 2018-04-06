@extends('adminlte::layouts.app')
@section('main-content')
@section('htmlheader_title')
	Alumnos
@endsection
<!--FOR ADMIN USERS-->
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registros de alumno</h3>
          <a href="{{route('student.create')}}" class="btn btn-primary pull-right">Nuevo Alumno</a>
        </div>
        <div class="box-body">
          <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="table-responsive">
              <table id="dataTables" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="display:none;">
                <thead>
                  <tr>
                    <th data-priority="1">Nombre y Apellidos</th>
                    <th data-priority="3">D.N.I.</th>
                    <th data-priority="4">Fecha de nacimiento</th>
                    <th data-priority="5">Direccion</th>
                    <th data-priority="6">Email</th>
                    <th data-priority="7">Telefono</th>
                    <th data-priority="8">Celular</th>
                    <th data-priority="9">Carrera</th>
                    <th data-priority="10">Centro laboral</th>
                    <th data-priority="11">Discapacidad</th>
                    <th data-priority="12">Fecha de registro</th>
                    <th data-priority="13">Fecha de actualización</th>
                    <th data-priority="2" width="1%">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($students as $student)
                  <tr>
                    <td>{{{$student->name}}}</td>
                    <td>{{{$student->dni}}}</td>
                    <td>{{{$student->fechanacimiento}}}</td>
                    <td>{{{$student->direccion}}}</td>
                    <td>{{{$student->email}}}</td>
                    <td>{{{$student->telefono}}}</td>
                    <td>{{{$student->celular}}}</td>
                    <td>{{{$student->especialidad}}}</td>
                    <td>{{{$student->centrolaboral}}}</td>
                    <td>{{{$student->discapacidad}}}</td>
                    <td>{{$student->created_at}}</td>
                    <td>{{$student->updated_at}}</td>
                    <td><a href="" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#bs-{{$student->id}}">Eliminar</a>
                        <a href="" class="btn btn-primary btn-xs">Cursos</a>
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
                columns: [0,1,2,3,4,5,6,7,8,9,10,11,]
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
