@extends('layout')

@section('users')active @stop
@section('content')
@if ($existe==false)
<h1><span class="label label-danger">Usuario No Existe!!</span></h1>	
 <div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/users'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>
@elseif ($existe==true)
@section('title') Users {{$usr->id }} @stop
<h1><span class="label label-warning">Edicion de Usuario </span></h1>

 <div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/users'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>

{{ Form::model($usr, array('url' => array('users', $usr->id)
,'method' => 'PATCH' ), array('role'=>'form')) }}
    <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('dpi', 'DPI'); }}
    {{ Form::text('dpi',null,array('placeholder'=>'xxxx xxxxx xxxx','class'=>'form-control')) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('password', 'Contraseña'); }}     
    {{ Form::password('password',array('placeholder'=>'********','class'=>'form-control')); }}
            </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('rol', 'ROL: '); }}
    @if (Auth::check())
      @if (Auth::user()->rol<1)
     {{ Form::select('rol',array('0' => 'Administrador', '1' => 'Cajero', '2' => 'Cliente'));}}
     @endif
    @endif
    @if (Auth::check())
      @if (Auth::user()->rol==1)
      @if ($usr->rol==0)
      {{ Form::label('rol','Administrador'); }}
      @endif
      @if ($usr->rol==1)
      {{ Form::label('rol','Cajero'); }}
      @endif
      @if ($usr->rol==2)
      {{ Form::label('rol','Cliente'); }}
      @endif
     
     @endif
    @endif
    
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('email', 'e-mail'); }}
    {{ Form::email('email',null,array('type'=>"email", 'placeholder'=>'nombre@dominio.extencion','class'=>'form-control')) }}
        </div>
    </div>

<div class="well">
    <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('nombres', 'Nombres'); }}
    {{ Form::text('nombres',null,array('placeholder'=>'xxxx xxxxx xxxx','class'=>'form-control')) }}
        </div>
        <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('apellidos', 'Apellidos'); }}
    {{ Form::text('apellidos',null,array('placeholder'=>'xxxx xxxxx xxxx','class'=>'form-control')) }}
        </div>
        </div>
    </div>
            <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('sexo', 'Sexo'); }}
   {{ Form::select('sexo',array('0' => 'Masculino', '1' => 'Femenino'));}}
        </div>
    
        <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('fech_nac', 'Fecha de Nacimiento'); }}
    {{ Form::date('fech_nac',null) }}
        </div>
    </div>    
    </div>

        <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('direccion', 'Direccion'); }}
    {{ Form::text('direccion',null,array('placeholder'=>'xxxx xxxxx xxxx','class'=>'form-control')) }}
        </div>
        <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('telefono', 'Telefono'); }}
    {{ Form::text('telefono',null,array('placeholder'=>'xxxx xxxxx xxxx','class'=>'form-control')) }}
        </div>
        </div>
        </div>
            <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('profecion', 'Profecion'); }}
    {{ Form::text('profecion',null,array('placeholder'=>'xxxx xxxxx xxxx','class'=>'form-control')) }}
        </div>
        <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('nacionalidad', 'Nacionalidad'); }}
    {{ Form::text('nacionalidad',null,array('placeholder'=>'xxxx xxxxx xxxx','class'=>'form-control')) }}
        </div>
    </div>

    </div>
  </div>     
    
       <button type="submit" class="btn btn-warning" value="Registrar" >
     <span class="glyphicon glyphicon-floppy-disk" ></span>
     Grabar Cambios	</button>

{{ Form::close() }}



@endif
@stop