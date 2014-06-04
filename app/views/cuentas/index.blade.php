@extends('layout')
@section('title') Lista de Cuentas @stop
@section('content')
@section('cuentas')active @stop
@if (Auth::check()) 
@if (Auth::user()->rol<1) 
<h1>Lista de Cuentas</h1>
	@if (Session::has('mensaje_registro'))

		<div class=  "{{Session::get('color') }}" >

			<span>{{ Session::get('mensaje_registro') }}


			</span>
		</div>

	@endif

	<table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>Tipo de Cuenta</th>
			<th>Cheques</th>
			<th>Monto</th>
		</tr>
		@foreach ($cuentas as $cuenta)
		<tr>
		<td>{{$cuenta->id}}</td>
		<td>{{$cuenta->tipo_cuenta}}</td>
		<td>{{$cuenta->cheques}}</td>
		<td>{{$cuenta->monto}}</td>
		<td>
			<a href="{{ route('cuentas.show', $cuenta->id) }}" class="btn btn-info">Ver</a>
			<a href="{{ route('cuentas.edit', $cuenta->id) }}" class="btn btn-warning">Editar</a>
			
		</td>
		<td>
		<a>{{ Form::model($cuenta, array('url' => array('cuentas', $cuenta->id)
			,'method' => 'DELETE' ), array('role'=>'form')) }}
				{{Form::submit('Delete', array('class'=> 'btn btn-danger'))}}
				{{Form::close()}}</a></td>
		</tr>
		@endforeach
	
	</table>
 <div class="btn-group">
  <button type="button" class="btn btn-success" onclick="window.location.href='/cuentas/create'" > 
  <span class="glyphicon glyphicon-plus"></span> Crear
  </button>
  </div>
  @endif
  @endif
@stop