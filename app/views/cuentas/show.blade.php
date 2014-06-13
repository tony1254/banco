@extends('layout')

@section('cuentas')active @stop
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
  <button type="button" class="btn btn-default" onclick="window.location.href='/cuentas'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>
  <h1><span class="label label-danger">cuenta No Existe!!</span></h1>	

@elseif ($existe==true)

@section('title') cuenta {{$usr->id }} @stop
<h1><span class="label label-info">Informacion cuenta </span></h1>
 <div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/cuentas'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>
	 <div class="row">
        <div class="form-group col-md-4">
	<table class="table table-striped">
	
	<tr>	
			<h3><td># cuenta :</td><td>	<span class="label label-info">{{$usr->id}}</span></td></h3>
</tr>
<tr>
			<h3><td>tipo_cuenta :</td><td><span class="label label-info">	{{$usr->tipo_cuenta}}</span></td></h3>
	</tr>
	<tr>
	<h3><td>moneda :</td><td><span class="label label-info">	{{$usr->moneda}}</span></td></h3>
	</tr>
	<tr>
	<h3><td>fech_creo :</td><td><span class="label label-info">	{{$usr->fech_creo}}</span></td></h3>
	</tr>
	<tr>
	<h3><td>cheques :</td><td><span class="label label-info">	{{$usr->cheques}}</span></td></h3>
	</tr>

	<h3><td>monto : </td><td><span class="label label-info">{{$usr->monto}}</span></td></h3>
	</table>
	</div>
	</div>
 <div class="btn-group">
 <a href="{{ route('cuentas.edit', $usr->id) }}" class="btn btn-warning">Editar</a>
  <a>{{ Form::model($usr, array('url' => array('cuentas', $usr->id)
			,'method' => 'DELETE' ), array('role'=>'form')) }}
				{{Form::submit('Delete', array('class'=> 'btn btn-danger'))}}
				{{Form::close()}}</a>
</div>
  @endif
 @endif
  @endif
@stop