<?php

class UsersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return View::make('users/index')->with('users',$users);
	}
	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function get_login()
	{
		
		return View::make('users/login'); 
		//
	}
		/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function get_logout()
	{
		$hola= new User;
		Auth::logout();
		$hola->email='vacio';	
		return View::make('users/login')->with('hola',$hola); 
		//
	}
		/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function post_login()
	{
	//	Auth::logout();+

		   $input =array(
'email'=>"",
'password'=>"",
		   	);

		   if (Input::has('email')) {
		   	 
		   	 $input = Input::all();
		   }
    $users = User::all();
    $hola= new User;
    $existe=False;
    foreach ($users as $user){
    	if ($user->email==$input['email']) {
    		$existe=True;

    		if(Hash::check($input['password'], $user->password)){
    			
    			Auth::login($user);
    			$hola= Auth::user();
    		}
    	}
    }
    if(Auth::check()){
    	$hola= Auth::user();
    }
    
if(is_null($hola->email)){
		$existe=false;    	
		$hola->email='error';

    }
    return View::make('users/login')->with('entrada',$input)->with('hola',$hola);

    

    
  // $chek= Auth::check();
//return "hola ",$chek;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return View::make('users/create');
		//
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		   $input = Input::all();
    $users = User::all();
    $personas = Persona::all();
     $pasa=True;


    /*
PARA REVISAR SI EL PASWORD CONSIDE SE CHEKA EL HASER
    foreach ($users as $user){
    	if (Hash::check($input['password'], $user->password)) {
    		$pasa=False;
    	}
    }*/

    foreach ($users as $user){
    	if ($user->dpi==$input['dpi']) {
    		$pasa=False;
    	}
    }
        foreach ($personas as $persona){
    	if ($persona->dpi==$input['dpi']) {
    		$pasa=False;
    	}
    }
    // al momento de crear el usuario la clave debe ser encriptada
    // para utilizamos la función estática make de la clase Hash
    // esta función encripta el texto para que sea almacenado de manera segura
    if($pasa){
    $input['password'] = Hash::make($input['password']);
 //$usr=[[dpi=>'2',password=>Hash::make($input['password']),rol=>1,email=>'tony']];
 //DB::table('users')->isnert($usr);

    $per=new Persona;
    $usr=new User;
    $per->dpi=$input['dpi'];
    $per->nombres=$input['nombres'];
    $per->apellidos=$input['apellidos'];
    $per->sexo=$input['sexo'];
    $per->fech_nac=$input['fech_nac'];
    $per->direccion=$input['direccion'];
    $per->telefono=$input['telefono'];
    $per->profecion=$input['profecion'];
    $per->email=$input['email'];
    $per->nacionalidad=$input['nacionalidad'];
    $per->save();

    $usr->dpi=$input['dpi'];
	$usr->password=$input['password'];
	$usr->rol=$input['rol'];
	$usr->email=$input['email'];
    //users::create($usr);
    $usr->save();
return Redirect::to('users')->with('mensaje_registro', 'Usuario Registrado')->with('color', 'alert alert-success');
    }else{
return Redirect::to('users')->with('mensaje_registro', 'Usuario o dpi ya exite')->with('color', 'alert alert-danger'); 
    }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		/*
		$users = User::all();
		 $usr=new User;
		 foreach ($users as $user){
    	if ($user->id==$id) {
    		$usr->id=$id;
    		$usr->dpi=$user->dpi;
    		$usr->rol=$user->rol;
    		$usr->email=$user->email;
    	}
    }
*/
    $usr = User::find($id);
    $personas = Persona::all();
    $per= new Persona;
        foreach ($personas as $persona){
    	if ($persona->dpi==$usr->dpi) {
    		$per=$persona;
    	}
    }
    $existe=true;
    if(is_null($usr)){
		$existe=false;    	
    }
		return View::make('users/show')->with('per', $per)->with('usr', $usr)->with('existe', $existe);
    }
	//}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usrr = User::find($id);
    $personas = Persona::all();
    $per= new Persona;
        foreach ($personas as $persona){
    	if ($persona->dpi==$usrr->dpi) {
    		$per=$persona;
    	}
    }
    $existe=true;
    if(is_null($usrr)){
		$existe=false;    	
    }

    $usr=(object) array(
    'id' =>$usrr->id ,
    "dpi" => $usrr->dpi ,
    "rol" => $usrr->rol ,
    "email" => $usrr->email,
    
    "nombres" =>$per->nombres ,
    "apellidos" =>$per->apellidos ,
    "sexo" =>$per->sexo ,
    "fech_nac" =>$per->fech_nac ,
    "direccion" =>$per->direccion ,
    "telefono" =>$per->telefono ,
    "profecion" =>$per->profecion ,
    "nacionalidad" =>$per->nacionalidad ,
);
    
    
		return View::make('users/edit')->with('per', $per)->with('usr', $usr)->with('existe', $existe);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{/*
		$usrr = User::find($id);
    $personas = Persona::all();
    $per= new Persona;
        foreach ($personas as $persona){
    	if ($persona->dpi==$usrr->dpi) {
    		$per=$persona;
    	}
    }
    $existe=true;
    if(is_null($usrr)){
		$existe=false;    	
    }

    $usr=(object) array(
    'id' =>$usrr->id ,
    "dpi" => $usrr->dpi ,
    "rol" => $usrr->rol ,
    "email" => $usrr->email,
    
    "nombres" =>$per->nombres ,
    "apellidos" =>$per->apellidos ,
    "sexo" =>$per->sexo ,
    "fech_nac" =>$per->fech_nac ,
    "direccion" =>$per->direccion ,
    "telefono" =>$per->telefono ,
    "profecion" =>$per->profecion ,
    "nacionalidad" =>$per->nacionalidad ,
);
    
    
		return View::make('users/edit')->with('per', $per)->with('usr', $usr)->with('existe', $existe);
	*/

	$usr = User::find($id);
    $personas = Persona::all();
    $idper=0;
        foreach ($personas as $persona){
    	if ($persona->dpi==$usr->dpi) {
    		$idper=$persona->id;
    	}
    }
    $per=Persona::find($idper);
    $existe=true;
    if(is_null($usr)){
		$existe=false;    	
    }else
   {
   	$input = Input::all();
  // 	$usr->fill($data);
   //	$usr->save();

   	$input['password'] = Hash::make($input['password']);


    $per->id=$idper;
    $per->dpi=$input['dpi'];
    $per->nombres=$input['nombres'];
    $per->apellidos=$input['apellidos'];
    $per->sexo=$input['sexo'];
    $salida=$input['fech_nac'];
 //   return  $salida;
 if($salida!=""){
    $per->fech_nac=$input['fech_nac'];
}
    $per->direccion=$input['direccion'];
    $per->telefono=$input['telefono'];
    $per->profecion=$input['profecion'];
    $per->email=$input['email'];
    $per->nacionalidad=$input['nacionalidad'];
    $per->save();

    $usr->dpi=$input['dpi'];
	$usr->password=$input['password'];
	$usr->rol=$input['rol'];
	$usr->email=$input['email'];
    //users::create($usr);
    $usr->save();
    	
    return View::make('users/show')->with('mensaje_registro', 'Usuario Actualizado')->with('color', 'alert alert-success')->with('per', $per)->with('usr', $usr)->with('existe', $existe);
   }
		return View::make('users/show')->with('mensaje_registro', 'Usuario no exite')->with('color', 'alert alert-danger')->with('per', $per)->with('usr', $usr)->with('existe', $existe); 
   
    
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	
		if(Auth::user()->id==$id)
		{

	return Redirect::route('users.index')->with('mensaje_registro', 'ERROR: Usuario Administrador actual imposible eliminarlo')->with('color', 'alert alert-danger');
	}else{
		$usr = User::find($id);
		User::destroy($id);
		    $personas = Persona::all();
    $idper=0;
        foreach ($personas as $persona){
    	if ($persona->dpi==$usr->dpi) {
    		$idper=$persona->id;
    	}
    }
    $per=Persona::destroy($idper);
    
		return Redirect::route('users.index');
	}
			}

}