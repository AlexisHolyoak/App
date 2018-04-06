@extends('adminlte::layouts.app')
@section('contentheader_title','Roles')
@section('htmlheader_title')
	Crear un nuevo rol
@endsection
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registro de roles del sistema</h3>
        </div>
        <form class="" action="{{route('role.store')}}" method="post">
          {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="name">Nombre del rol</label>
            <input type="text"id="name" name="name" value="" class="form-control" placeholder="Escribe el nombre del rol..." required>
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="display_name">Nombre del rol que se previsualizara</label>
            <input type="text"id="name" name="display_name" value="" class="form-control" placeholder="Escribe el nombre del rol que se mostrara...">
          </div>
          <div class="form-group col-md-8 col-md-offset-2">
            <label for="comentarios">Descripción</label>
            <textarea name="description" rows="8" cols="80" style="resize:none;" class="form-control"></textarea>
          </div>
        </div>
        <div class="box-footer">
          <button type="button" name="button" class="btn btn-default">Cancelar</button>
          <button type="submit" name="button" class="btn btn-primary pull-right">Registrar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
