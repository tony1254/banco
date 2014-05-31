<?php

class SucursalsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	$sucursals = Sucursal::all();

		return View::make('sucursals/index')->with('sucursals',$sucursals);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sucursals/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		   $input = Input::all();
    $sucursals = Sucursal::all();
     $pasa=True;

    foreach ($sucursals as $sucursal){
    	if ($sucursal->id==$input['id']) {
    		$pasa=False;
    	}
    }

    if($pasa){
    
    $usr=new Sucursal;
    $usr->id=$input['id'];
	$usr->nombre=$input['nombre'];
	$usr->direccion=$input['direccion'];
	$usr->telefono=$input['telefono'];
    //users::create($usr);
    $usr->save();
return Redirect::to('sucursals')->with('mensaje_registro', 'Usuario Registrado')->with('color', 'alert alert-success');
    }else{
return Redirect::to('sucursals')->with('mensaje_registro', 'Usuario ya exite')->with('color', 'alert alert-danger'); 
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
		 $usr = Sucursal::find($id);
    $existe=true;
    if(is_null($usr)){
		$existe=false;    	
    }
		return View::make('sucursals/show')->with('usr', $usr)->with('existe', $existe);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usr = Sucursal::find($id);
    $existe=true;
    if(is_null($usr)){
		$existe=false;    	
    }
		return View::make('sucursals/edit')->with('usr', $usr)->with('existe', $existe);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

 $usr = Sucursal::find($id);
    $existe=true;
    if(is_null($usr)){
		$existe=false;    	
    }else{


		 $input = Input::all();


    $usr->id=$input['id'];
	$usr->nombre=$input['nombre'];
	$usr->direccion=$input['direccion'];
	$usr->telefono=$input['telefono'];
    //users::create($usr);
    $usr->save();
return View::make('sucursals/show')->with('mensaje_registro', 'Sucursal Actualizado')->with('color', 'alert alert-success')->with('usr', $usr)->with('existe', $existe);
    }
return View::make('sucursals/show')->with('mensaje_registro', 'Usuario ya exite')->with('color', 'alert alert-danger')->with('usr', $usr)->with('existe', $existe); 
    
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		Sucursal::destroy($id);

		return Redirect::route('sucursals.index');
	}

}