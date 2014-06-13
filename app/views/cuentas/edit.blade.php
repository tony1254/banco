@extends('layout')
@section('title') Registro de cuentas @stop
@section('cuentas')active @stop
@section('content')
@if ($existe==false)
<h1><span class="label label-danger">cuenta No Existe!!</span></h1>	
 <div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/cuentas'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>
@elseif ($existe==true)
@section('title') cuenta {{$usr->id }} @stop
<h1><span class="label label-warning">Edicion de cuenta </span></h1>

 <div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/cuentas'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>


{{ Form::model($usr, array('url' => array('cuentas', $usr->id)
,'method' => 'PATCH' ), array('role'=>'form')) }}

    <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('id', 'ID'); }}
    {{ Form::text('id',null,array('placeholder'=>'xxxx xxxxx xxxx','class'=>'form-control')) }}
        </div>
    </div>
            <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('tipo_cuenta', 'Tipo de Cuenta'); }}
   {{ Form::select('tipo_cuenta',array('0' => 'Monetaria', '1' => 'Ahorro'));}}
        </div>
        </div>
<div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('moneda', 'Moneda'); }}
   {{ Form::select('moneda',array('0' => 'Q', '1' => '$'));}}
        </div>
    </div>
            <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('fech_creo', 'Fecha de Creo'); }}
      {{ Form::label('fech_creo',  date("d-m-Y")  ); }}
        </div>
    </div>  
    <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('cheques', 'cheques'); }}
    {{ Form::text('cheques',null,array('placeholder'=>'xxxx xxxx','class'=>'form-control')) }}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('monto', 'monto'); }}
    {{ Form::text('monto',null,array('placeholder'=>'xxxx xxxx','class'=>'form-control')) }}
        </div>
    </div>

       <button type="submit" class="btn btn-success" value="Registrar" >
     <span class="glyphicon glyphicon-floppy-disk" ></span>
     Grabar</button>

{{ Form::close() }}

@endif
@stop