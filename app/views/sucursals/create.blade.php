@extends('layout')
@section('title') Registro de Sucursales @stop
@section('sucursals')active @stop
@section('content')
<h1><span class="label label-success">Registro Sucursales</span></h1>


 <div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/sucursals'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>






{{ Form::open(array('url' => '/sucursals', 'method' => 'POST' ), array('role'=>'form')) }}
    <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('id', 'ID'); }}
    {{ Form::text('id',null,array('placeholder'=>'xxxx xxxxx xxxx','class'=>'form-control')) }}
        </div>
    </div>
<div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('nombre', 'Nombre'); }}
    {{ Form::text('nombre',null,array('placeholder'=>'xxxx xxxxx xxxx','class'=>'form-control')) }}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('direccion', 'Direccion'); }}
    {{ Form::text('direccion',null,array('placeholder'=>'Direccion','class'=>'form-control')) }}
        </div>
    </div>
    <div class="row">
    <div class="form-group col-md-4">
    {{ Form::label('telefono', 'Telefono'); }}
    {{ Form::text('telefono',null,array('placeholder'=>'xxxx xxxx','class'=>'form-control')) }}
        </div>
    </div>
       <button type="submit" class="btn btn-success" value="Registrar" >
     <span class="glyphicon glyphicon-floppy-disk" ></span>
     Grabar</button>

{{ Form::close() }}
@stop