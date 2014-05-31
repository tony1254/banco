@extends('layout')
@section('title') Login @stop
@section('content')
@section('login')active @stop

<h1><span class="label label-info">Login</span></h1>
@if (isset($hola))
@if ($hola->email=='error')

        <h3><div class=  "label label-danger" >
{{ 'Error: no se pudo econtrar su usario o su contraseña es incorrecta.'}}
           
        </div></h3>
        
{{ Form::model(Input::all(), array('url' => 'users/login', 'method' => 'POST' ), array('role'=>'form')) }}
    @endif
@if ($hola->email=='vacio')
<h3>
        <div class=  "label label-warning" >
{{ 'Seccion finalizada!!'}}
        </div></h3>
{{ Form::open(array('url' => 'users/login', 'method' => 'POST' ), array('role'=>'form')) }}
    @endif
@if (Auth::check())
            <h3><span class=  "label label-success" >
            {{ 'Seccion Iniciada!! Bienvenido '}}{{ $hola->email;}}
            </span></h3>

    @endif
@endif
@if(!isset($hola))
{{ Form::open(array('url' => 'users/login', 'method' => 'POST' ), array('role'=>'form')) }}
@endif

@if (Auth::guest())


    <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('email', 'e-mail'); }}
    {{ Form::text('email',null,array('type'=>"email", 'placeholder'=>'nombre@dominio.extencion','class'=>'form-control')) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
    {{ Form::label('password', 'Contraseña'); }}     
    {{ Form::password('password',array('placeholder'=>'********','class'=>'form-control')); }}
            </div>
    </div>
    
    
    
       <button type="submit" class="btn btn-info" value="Registrar" >
     <span class="glyphicon glyphicon-floppy-disk" ></span>
     Login</button>
      <div class="btn-group">
  <button type="button" class="btn btn-success" onclick="window.location.href='/users/create'" > 
  <span class="glyphicon glyphicon-plus"></span> Crear
  </button>
  </div>

{{ Form::close() }}
     
@endif
@if (Auth::check())  <div class="invisible"><span >
{{$usr=Auth::user();}}  </span> </div>
<div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/users/logout'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> cerrar cesion
  </button>
  </div>

     <div class="row">
        <div class="form-group col-md-4">
    <table class="table table-striped">
    
    <tr>    
            <h3><td># Usuario :</td><td>    <span class="label label-info">{{$usr->id}}</span></td></h3>
</tr><tr>
            <h3><td>DPI :</td><td><span class="label label-info">   {{$usr->dpi}}</span></td></h3>
    </tr>
    <tr>
<h3><td>Rol :   </td><td><span class="label label-info">
    @if ($usr->rol==0)
        Administrador
    @endif
    @if ($usr->rol==1)
        Cajero
    @endif
    @if ($usr->rol==2)
        Cliente
    @endif
    </span></td></h3>
    </tr>
    <tr>

    </tr>
    <h3><td>e-mail : </td><td><span class="label label-info">{{$usr->email}}</span></td></h3>
    </table>
    </div>
    </div>

    


  @endif
@stop