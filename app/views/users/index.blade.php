@extends('layout')
@section('title') Lista de Users @stop
@section('content')
@section('users')active @stop
@if (Auth::check()) 
@if (Auth::user()->rol<1) 
<h1>Lista de usuarios</h1>
	@if (Session::has('mensaje_registro'))

		<div class=  "{{Session::get('color') }}" >

			<span>{{ Session::get('mensaje_registro') }}


			</span>
		</div>

	@endif

	<table class="table table-striped">
		<tr>
			<th>DPI</th>
			<th>E-Mail</th>
			<th>Acciones</th>
		</tr>
		@foreach ($users as $user)
		<tr>
		<td>{{$user->dpi}}</td>
		<td>{{$user->email}}</td>
		<td>
			<a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Ver</a>
			<a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
			
		</td>
		<td><a>{{ Form::model($user, array('url' => array('users', $user->id)
			,'method' => 'DELETE' ), array('role'=>'form')) }}
				{{Form::submit('Delete', array('class'=> 'btn btn-danger'))}}
				{{Form::close()}}</a></td>
		</tr>
		@endforeach
	
	</table>
 <div class="btn-group">
  <button type="button" class="btn btn-success" onclick="window.location.href='/users/create'" > 
  <span class="glyphicon glyphicon-plus"></span> Crear
  </button>
  </div>
  @endif
  @endif
@stop