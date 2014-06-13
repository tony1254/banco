@extends('layout')

@section('movimientos')active @stop
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
  <button type="button" class="btn btn-default" onclick="window.location.href='/movimientos'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>
  <h1><span class="label label-danger">movimiento No Existe!!</span></h1>	

@elseif ($existe==true)

@section('title') movimiento {{$usr->id }} @stop
<h1><span class="label label-info">Informacion movimiento </span></h1>
 <div class="btn-group">
  <button type="button" class="btn btn-default" onclick="window.location.href='/movimientos'" > 
  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
  </button>
  </div>
	 <div class="row">
        <div class="form-group col-md-4">
	<table class="table table-striped">
	
	<tr>	
			<h3><td># movimiento :</td><td>	<span class="label label-info">{{$usr->numero}}</span></td></h3>
</tr>
<tr>
			<h3><td>tipo :</td><td><span class="label label-info">	{{$usr->tipo}}</span></td></h3>
	</tr>
	
	<tr>
	<h3><td>cuenta :</td><td><span class="label label-info">	{{$usr->cuenta}}</span></td></h3>
	</tr>
	<tr>
	<h3><td>cuenta recibio:</td><td><span class="label label-info">	{{$usr->cuenta_recibe}}</span></td></h3>
	</tr>
	<h3><td>monto : </td><td><span class="label label-info">{{$usr->monto}}</span></td></h3>
	
	</table>
	</div>
	</div>
 <div class="btn-group">
 
  <a>{{ Form::model($usr, array('url' => array('movimientos', $usr->id)
			,'method' => 'DELETE' ), array('role'=>'form')) }}
				{{Form::submit('Delete', array('class'=> 'btn btn-danger'))}}
				{{Form::close()}}</a>
</div>
  @endif
 @endif
  @endif
@stop