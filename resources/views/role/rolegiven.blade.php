@extends('adminlte::layouts.app')
@section('contentheader_title','Roles')
@section('htmlheader_title')
	Rol alumno concedido
@endsection
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Rol alumno</h3>
        </div>
        <form class="" name="myform" action="{{route('role.studentrol')}}" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="box-body">
            Felicidades!, acabas de conceder al usuario el rol alumno. Te estoy redireccionando a la pagina de usuarios.
						<input type="hidden" name="idvoucher" value="{{$voucher->id}}">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
$( window ).on( "load", function() {
     console.log( "window loaded" );
     document.myform.submit();
 });
</script>
@endsection
