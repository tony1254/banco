@extends('layout')

@section('users')active @stop
@section('content')

@if (Session::has('mensaje_registro'))

		<div class=  "{{Session::get('color') }}" >

			<span>{{ Session::get('mensaje_registro') }}


			</span>
		</div>

	@endif

@if (Auth::check())

@if (Auth::user()->rol<=1)
@if ($existe==false)
 <div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/users'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>
  <h1><span class="label label-danger">Usuario No Existe!!</span></h1>	

@elseif ($existe==true)

@section('title') Users {{$usr->id }} @stop
<h1><span class="label label-info">Informacion Usuario </span></h1>
 <div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/users'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>
	 <div class="row">
        <div class="form-group col-md-4">
	<table class="table table-striped">
	
	<tr>	
			<h3><td># Usuario :</td><td>	<span class="label label-info">{{$usr->id}}</span></td></h3>
</tr><tr>
			<h3><td>DPI :</td><td><span class="label label-info">	{{$usr->dpi}}</span></td></h3>
	</tr>
	<tr>
<h3><td>Rol :	</td><td><span class="label label-info">
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
	<tr>
			<h3><td>Nombres :</td><td><span class="label label-info">	{{$per->nombres}}</span></td></h3>
				<h3><td>Apellidos :</td><td><span class="label label-info">	{{$per->apellidos}}</span></td></h3>
	</tr>
	<tr>
			<h3><td>Sexo :</td><td><span class="label label-info">	
	@if ($per->sexo==0)
		Masculino
	@endif
	@if ($per->sexo==1)
		Femenino
	@endif

			</span></td></h4>
				<h3><td>Fecha de Nacimiento :</td><td><span class="label label-info">	{{$per->fech_nac}}</span></td></h4>
	</tr>
	<tr>
			<h3><td>Direccion :</td><td><span class="label label-info">	{{$per->direccion}}</span></td></h3>
				<h3><td>Telefono :</td><td><span class="label label-info">	{{$per->telefono}}</span></td></h3>
	</tr>	
	<tr>
			<h3><td>email :</td><td><span class="label label-info">	{{$per->email}}</span></td></h3>
				<h3><td>Nacionalidad :</td><td><span class="label label-info">	{{$per->nacionalidad}}</span></td></h3>
	</tr>		
	</table>
	</div>
	</div>

	


  @endif
 @endif
  @endif
  <div class="btn-group">
 <a href="{{ route('users.edit', $usr->id) }}" class="btn btn-warning">Editar</a>
  <a>{{ Form::model($usr, array('url' => array('users', $usr->id)
			,'method' => 'DELETE' ), array('role'=>'form')) }}
				{{Form::submit('Delete', array('class'=> 'btn btn-danger'))}}
				{{Form::close()}}</a>
</div>
@stop