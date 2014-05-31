@extends('layout')

@section('sucursals')active @stop
@section('content')
@if ($existe==false)
<h1><span class="label label-danger">Sucursal No Existe!!</span></h1>	
 <div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/sucursals'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>
@elseif ($existe==true)
@section('title') Sucursal {{$usr->id }} @stop
<h1><span class="label label-warning">Edicion de Sucursal </span></h1>

 <div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/sucursals'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>

{{ Form::model($usr, array('url' => array('sucursals', $usr->id)
,'method' => 'PATCH' ), array('role'=>'form')) }}

    <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('id', 'ID'); }}
    {{ Form::text('id',null,array('placeholder'=>'xxxx xxxxx xxxx','class'=>'invisible')) }}
    <div class="col-sm-10">
      <p class="form-control-static">{{$usr->id}}</p>
    </div>
        </div>
    </div>
<div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('nombre', 'Nombre'); }}
      <p class="form-control-static">{{ Form::text('nombre',null,array('placeholder'=>'xxxx xxxxx xxxx','class'=>'form-control')) }}</p>
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


@endif
@stop