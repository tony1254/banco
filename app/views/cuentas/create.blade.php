@extends('layout')
@section('title') Registro de cuentas @stop
@section('cuentas')active @stop
@section('content')
<h1><span class="label label-success">Registro cuentas</span></h1>


 <div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/cuentas'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>






{{ Form::open(array('url' => '/cuentas', 'method' => 'POST' ), array('role'=>'form')) }}
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
    {{ Form::label('fech_nac', 'Fecha de Nacimiento'); }}
    {{ Form::date('fech_nac') }}
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
@stop