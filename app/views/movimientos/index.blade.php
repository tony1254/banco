@extends('layout')
@section('title') Lista de movimientos @stop
@section('content')
@section('movimientos')active @stop
@if (Auth::check()) 
@if (Auth::user()->rol<=1) 
<h1>Lista de movimientoes</h1>
	@if (Session::has('mensaje_registro'))

		<div class=  "{{Session::get('color') }}" >

			<span>{{ Session::get('mensaje_registro') }}


			</span>
		</div>

	@endif

	<table class="table table-striped">
		<tr>
			<th>numero</th>
			<th>tipo</th>
			<th>Cuenta</th>
			<th>Nombre</th>
			<th>apellidos</th>
			<th>dpi</th>
			<th>monto</th>
			<th>User</th>
		</tr>
		@foreach ($movimientos as $movimiento)
		<tr>
		<td>{{$movimiento->numero}}</td>
		<td>{{$movimiento->tipo}}</td>
		<td>{{$movimiento->cuenta}}</td>
		<td>{{$movimiento->nombres}}</td>	
		<td>{{$movimiento->apellidos}}</td>	
		<td>{{$movimiento->dpi}}</td>
		<td>{{$movimiento->monto}}</td>
		<td>{{$movimiento->user}}</td>
			
		
		<td>
			<a href="{{ route('movimientos.show', $movimiento->id) }}" class="btn btn-info">Ver</a>
@if (Auth::check()) 
@if (Auth::user()->rol<=1) 
			
			
		</td>
		<td>
		<a>{{ Form::model($movimiento, array('url' => array('movimientos', $movimiento->id)
			,'method' => 'DELETE' ), array('role'=>'form')) }}
				{{Form::submit('Delete', array('class'=> 'btn btn-danger'))}}
				{{Form::close()}}</a></td>
		</tr>
		@endif
		@endif
		@endforeach
	
	</table>
 <div class="btn-group">
  <button type="button" class="btn btn-success" onclick="window.location.href='/movimientos/create'" > 
  <span class="glyphicon glyphicon-plus"></span> Crear
  </button>
  </div>
  @endif
  @endif
@stop