@extends('layout')

@section('movimientos')active @stop
@section('content')
@if ($existe==false)
<h1><span class="label label-danger">movimiento No Existe!!</span></h1>	
 <div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/movimientos'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>
@elseif ($existe==true)
@section('title') movimiento {{$usr->id }} @stop
<h1><span class="label label-warning">Edicion de movimiento </span></h1>

 <div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/movimientos'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>

{{ Form::model($usr, array('url' => array('movimientos', $usr->id)
,'method' => 'PATCH' ), array('role'=>'form')) }}

         <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('tipo', 'tipo'); }}
   {{ Form::select('tipo',array('0' => 'cheque', '1' => 'transaccion'));}}
        </div>
        </div>
  <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('numero', 'numero'); }}
    {{ Form::text('numero',null,array('placeholder'=>'xxxx xxxxx xxxx','class'=>'form-control')) }}
        </div>
    </div>
<div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('cuenta', 'cuenta'); }}
    {{ Form::text('cuenta',null,array('placeholder'=>'xxxx xxxxx xxxx','class'=>'form-control')) }}
        </div>
    </div>


    <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('nombres', 'nombres'); }}
    {{ Form::text('nombres',null,array('placeholder'=>'xxx xxxx','class'=>'form-control')) }}
        </div>
    </div>
        <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('apellidos', 'apellidos'); }}
    {{ Form::text('apellidos',null,array('placeholder'=>'xxx xxxx','class'=>'form-control')) }}
        </div>
    </div>
    <div class="row">
    <div class="form-group col-md-4">
    {{ Form::label('dpi', 'dpi'); }}
    {{ Form::text('dpi',null,array('placeholder'=>'xxxx xxxx','class'=>'form-control')) }}
        </div>
    </div>
     <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('fech_creo', 'Fecha que creo'); }}
         {{ Form::label('fech_creo',  date("d-m-Y H:m:s ")  ); }}
      
        </div>
    </div>    
    
     <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('fech_finalizo', 'Fecha que finalizo'); }}
    {{ Form::label('fech_creo',  date("d-m-Y H:m:s ")  ); }}
     
        </div>
    </div>    
    
        <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('cuenta_recibe', 'cuenta_recibe'); }}
    {{ Form::text('cuenta_recibe',null,array('placeholder'=>'xxx xxxx','class'=>'form-control')) }}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('monto', 'monto'); }}
    {{ Form::text('monto',null,array('placeholder'=>'xxx xxxx','class'=>'form-control')) }}
        </div>
    </div>
       <button type="submit" class="btn btn-success" value="Registrar" >
     <span class="glyphicon glyphicon-floppy-disk" ></span>
     Grabar</button>

{{ Form::close() }}


@endif
@stop