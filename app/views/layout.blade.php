<!DOCTYPE html>
<html>
<head>
	<title> @yield('title','Aprendiendo Laravel') </title>
<link rel="shortcut icon" href="/content/logo.ico">



	{{HTML::style('assents/css/bootstrap.min.css', array('media'== 'screen'))}}
		<ul class="nav nav-tabs">

  <li class= @yield('home', 'nada')><a href="/"><img src="/content/logo.ico" alt="Smiley face" height="42" width="42">Banco <p></p>Los Cuatro</a></li>
  <li class= @yield('profile', 'nada')><a href="/users/create">User</a></li>


   <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      Dropdown <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li><a href="1">Profile</a></li>
      <li><a href="#">Profile</a></li>
    </ul>
  </li>
@if (Auth::check())
    @if(Auth::user()->rol<1)
    <li class= @yield('users', 'dropdown')>
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      Usuarios <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li><a href="/users">Listado</a></li>
      <li><a href="/users/create">create</a></li>
    </ul>
  </li>
   <li class= @yield('sucursals', 'dropdown')>
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      Sucursales <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li><a href="/sucursals">Listado</a></li>
      <li><a href="/sucursals/create">create</a></li>
    </ul>
  </li>
@endif
@endif
<li class= @yield('login', 'nada')><a href="/users/login">Login</a></li>
  @if (Auth::check())
  <div class="form-group ">
    Bienvenido : {{Auth::user()->email;}}
    <a href="/users/logout" class="btn btn-info">cerrar cesion</a>
    </div>
  @endif
  @if (Auth::guest())
    Invitado
<!-- Small modal -->
<button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Iniciar Session</button>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
<p></p>
  
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

@if (Auth::guest())

{{ Form::open(array('url' => 'users/login', 'method' => 'POST' ), array('role'=>'form')) }}
    <div class="row">
        <div class="form-group col-md-10">
    {{ Form::label('email', 'e-mail'); }}
    {{ Form::text('email',null,array('type'=>"email", 'placeholder'=>'nombre@dominio.extencion','class'=>'form-control')) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-10">
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

          </div>
  </div>
</div>
  @endif

</ul>
</head>
<body>
	<div id="wrap">
		<div class="container">
			@yield('content')
		</div>
	</div>
	{{HTML::script('assents/js/jquery.js')}}
	{{HTML::script('assents/js/bootstrap.min.js')}}
	
		
</body>
</html>