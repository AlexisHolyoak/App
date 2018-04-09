@extends('adminlte::layouts.app')
@section('main-content')
@section('htmlheader_title')
	Mis comprobantes
@endsection
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registros de mis comprobantes enviados</h3>
        </div>
				<div class="box-body">
              <div class="table-responsive">
                <table id="dataTables" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="display:none;">
                  <thead>
                    <tr>
                      <th data-priority="1">Nombre del curso</th>
											<th data-priority="3">Modalidad</th>
											<th data-priority="4">Fecha de inicio</th>
											@if($user->hasRole('administrador'))
											<th data-priority="6">Usuario</th>
											<th data-priority="5">Correo</th>
											@endif
                      <th data-priority="7">Comprobante</th>
                      <th data-priority="8">Estado</th>
                      <th data-priority="10">Fecha de envio</th>
                      <th data-priority="2" width="1%">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
										@foreach($vouchers as $voucher)
                    <tr>
                      <td>{!!$voucher->CNOMBRE!!}</td>
											<td>
											@if($voucher->CONLINE)
												Online
											@endif
											@if($voucher->CPRESENCIAL)
												Presencial
											@endif</td>
											<td>
											@if($voucher->CPRESENCIAL)
												{{$voucher->GINICIO}}
											@endif
											@if($voucher->CONLINE)
												{{$voucher->VINICIO}}
											@endif
											</td>
											@if($user->hasRole('administrador'))
											<td>{{$voucher->UNAME}}</td>
											<td><a href="mailto:{{$voucher->UEMAIL}}">{{$voucher->UEMAIL}}</a> </td>
											@endif
                      <td><a href="{{route('file.comprobante',$voucher->VID)}}" target="_blank">Previsualizar comprobante</a></td>
											@if($voucher->VESTADO==0)
											<td><span class="label label-danger">En observación</span></td>
											@else
											<td><span class="label label-success">Aprovada</span></td>
											@endif
                      <td>{{$voucher->VCREATEDAT}}</td>
                      <td>
													@if($voucher->VESTADO==0)
													@if($user->hasRole('administrador'))
													<a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#bs-aprove-{{$voucher->VID}}">Aprobar</a>
													@endif
                          <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#bs-eliminar-{{$voucher->VID}}"><i class="fa fa-close"></i></a>
													@endif
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

@foreach($vouchers as $voucher)
@include('voucher.destroy')
@endforeach
@if($user->hasRole('administrador'))
	@foreach($vouchers as $voucher)
	@include('voucher.aprove')
	@endforeach
@endif
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
	$('#dataTables').DataTable();
});
</script>

@endsection
