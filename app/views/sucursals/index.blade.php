@extends('layout')
@section('title') Lista de Sucursals @stop
@section('content')
@section('sucursals')active @stop
@if (Auth::check()) 
@if (Auth::user()->rol<1) 
<h1>Lista de sucursales</h1>
	@if (Session::has('mensaje_registro'))

		<div class=  "{{Session::get('color') }}" >

			<span>{{ Session::get('mensaje_registro') }}


			</span>
		</div>

	@endif

	<table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Direccion</th>
			<th>Telefono</th>
		</tr>
		@foreach ($sucursals as $sucursal)
		<tr>
		<td>{{$sucursal->id}}</td>
		<td>{{$sucursal->nombre}}</td>
		<td>{{$sucursal->direccion}}</td>
		<td>{{$sucursal->telefono}}</td>
		<td>
			<a href="{{ route('sucursals.show', $sucursal->id) }}" class="btn btn-info">Ver</a>
			<a href="{{ route('sucursals.edit', $sucursal->id) }}" class="btn btn-warning">Editar</a>
			
		</td>
		<td>
		<a>{{ Form::model($sucursal, array('url' => array('sucursals', $sucursal->id)
			,'method' => 'DELETE' ), array('role'=>'form')) }}
				{{Form::submit('Delete', array('class'=> 'btn btn-danger'))}}
				{{Form::close()}}</a></td>
		</tr>
		@endforeach
	
	</table>
 <div class="btn-group">
  <button type="button" class="btn btn-success" onclick="window.location.href='/sucursals/create'" > 
  <span class="glyphicon glyphicon-plus"></span> Crear
  </button>
  </div>
  @endif
  @endif
@stop