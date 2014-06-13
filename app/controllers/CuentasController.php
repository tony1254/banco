<?php

class CuentasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cuentas = Cuentum::all();

		return View::make('cuentas/index')->with('cuentas',$cuentas);
	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('cuentas/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		 $input = Input::all();
		 
    $cuentas = Cuentum::all();
    $user = User::find($input['id_user']);
     $pasa=True;

/*    foreach ($cuentas as $cuenta){
    	if ($cuenta->id==$input['id']) {
    		$pasa=False;
    	}
    }
  */  		 
    
    if(is_null($user)){
		$pasa=False;
		return Redirect::to('cuentas')->with('mensaje_registro', 'Usuario no Encontrado')->with('color', 'alert alert-danger'); 
    }
    /*if($input['id']==""){
    			$pasa=False;
    return Redirect::to('cuentas')->with('mensaje_registro', '# Cuenta Vacio')->with('color', 'alert alert-danger'); 
    }*/
    if($pasa){
    $cxu= new Cuentasxusuario;
    $usr=new Cuentum;
    //$usr->id=$input['id'];
	$usr->tipo_cuenta=$input['tipo_cuenta'];
	$usr->moneda=$input['moneda'];
	$usr->fech_creo=$input['fech_creo'];
	$usr->cheques=$input['cheques'];
	$usr->monto=$input['monto'];

    //users::create($usr);
    $usr->save();
    	$cxu->cuenta=$usr->id;
	$cxu->user=$input['id_user'];


$cxu->save();
return Redirect::to('cuentas')->with('mensaje_registro', 'Cuenta Registrado')->with('color', 'alert alert-success');
    }else{
return Redirect::to('cuentas')->with('mensaje_registro', 'Cuenta ya exite')->with('color', 'alert alert-danger'); 
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
		 $usr = Cuentum::find($id);
    $existe=true;
    if(is_null($usr)){
		$existe=false;    	
    }
		return View::make('cuentas/show')->with('usr', $usr)->with('existe', $existe);
	
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usr = Cuentum::find($id);
    $existe=true;
    if(is_null($usr)){
		$existe=false;    	
    }
		return View::make('cuentas/edit')->with('usr', $usr)->with('existe', $existe);
	
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
 $usr = Cuentum::find($id);
    $existe=true;
    if(is_null($usr)){
		$existe=false;    	
    }else{


		 $input = Input::all();


       $usr->id=$input['id'];
	$usr->tipo_cuenta=$input['tipo_cuenta'];
	$usr->moneda=$input['moneda'];
	
	$usr->cheques=$input['cheques'];
	$usr->monto=$input['monto'];
    //users::create($usr);
    $usr->save();
return View::make('cuentas/show')->with('mensaje_registro', 'cuenta Actualizado')->with('color', 'alert alert-success')->with('usr', $usr)->with('existe', $existe);
    }
return View::make('cuentas/show')->with('mensaje_registro', 'Usuario ya exite')->with('color', 'alert alert-danger')->with('usr', $usr)->with('existe', $existe); 
    
	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		Cuentum::destroy($id);

		return Redirect::route('cuentas.index');
	}

}