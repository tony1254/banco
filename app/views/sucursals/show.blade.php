@extends('layout')

@section('sucursals')active @stop
@section('content')
@if (Session::has('mensaje_registro'))

		<div class=  "{{Session::get('color') }}" >

			<span>{{ Session::get('mensaje_registro') }}


			</span>
		</div>

	@endif
@if (Auth::check())
@if (Auth::user()->rol<1)
@if ($existe==false)
 <div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/sucursals'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>
  <h1><span class="label label-danger">Sucursal No Existe!!</span></h1>	

@elseif ($existe==true)

@section('title') Sucursal {{$usr->id }} @stop
<h1><span class="label label-info">Informacion Sucursal </span></h1>
 <div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/sucursals'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>
	 <div class="row">
        <div class="form-group col-md-4">
	<table class="table table-striped">
	
	<tr>	
			<h3><td># Sucursal :</td><td>	<span class="label label-info">{{$usr->id}}</span></td></h3>
</tr>
<tr>
			<h3><td>Nombre :</td><td><span class="label label-info">	{{$usr->nombre}}</span></td></h3>
	</tr>
	
	<tr>
	<h3><td>Direccion :</td><td><span class="label label-info">	{{$usr->direccion}}</span></td></h3>
	</tr>
	<h3><td>telefono : </td><td><span class="label label-info">{{$usr->telefono}}</span></td></h3>
	</table>
	</div>
	</div>
 <div class="btn-group">
 <a href="{{ route('sucursals.edit', $usr->id) }}" class="btn btn-warning">Editar</a>
  <a>{{ Form::model($usr, array('url' => array('sucursals', $usr->id)
			,'method' => 'DELETE' ), array('role'=>'form')) }}
				{{Form::submit('Delete', array('class'=> 'btn btn-danger'))}}
				{{Form::close()}}</a>
</div>
  @endif
 @endif
  @endif
@stop