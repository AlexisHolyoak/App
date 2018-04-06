@extends('adminlte::layouts.app')
@section('contentheader_title','Usuarios')
@section('htmlheader_title')
	Usuarios
@endsection
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registros de usuarios</h3>
          <!---<a href="{{route('user.create')}}" class="btn btn-primary pull-right">Nuevo Rol</a>-->
        </div>
				<div class="box-body">
          <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="table-responsive">
              <table id="dataTables" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="display:none;">
                <thead>
                  <tr>
                    <th data-priority="1">Nombre del usuario</th>
                    <th data-priority="3">Usuario</th>
                    <th data-priority="4">Fecha de creación</th>
										<td data-priority="5">Rol</td>
                    <th data-priority="2" width="1%">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $usuario)
                  <tr>
                    <td>{{{$usuario->name}}}</td>
                    <td>{{{$usuario->email}}}</td>
                    <td>{{$usuario->created_at}}</td>
										<td>{{$usuario->roles->first() ? $usuario->roles->first()->display_name :'Ningun rol'}}</td>
                    <td><a href="" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#bs-{{$usuario->id}}">Rol</a>
                        <a href="" class="btn btn-primary btn-xs">Permisos</a>
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
  @foreach($users as $usuario)
@include('user.otorgarrol')
  @endforeach
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
           title:'Reporte de usuarios',
           exportOptions: {
                columns: [0,1,2]
            }
      },
      {
            extend: 'excel',
            title:'Reporte de usuarios',
            exportOptions: {
                columns: [0,1,2]
             }
      },
      {
            extend: 'print',
            title:'Reporte de usuarios',
            exportOptions: {
                columns: [0,1,2]
             }
      }]
  });
});
</script>
@endsection
