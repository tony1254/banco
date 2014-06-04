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
		return Input::all();
		 $input = Input::all();
    $cuentas = Cuentum::all();
     $pasa=True;

    foreach ($cuentas as $cuenta){
    	if ($cuenta->id==$input['id']) {
    		$pasa=False;
    	}
    }

    if($pasa){
    
    $usr=new cuenta;
    $usr->id=$input['id'];
	$usr->tipo_cuenta=$input['tipo_cuenta'];
	$usr->moneda=$input['moneda'];
	$usr->monto=$input['monto'];
    //users::create($usr);
    $usr->save();
return Redirect::to('cuentas')->with('mensaje_registro', 'Usuario Registrado')->with('color', 'alert alert-success');
    }else{
return Redirect::to('cuentas')->with('mensaje_registro', 'Usuario ya exite')->with('color', 'alert alert-danger'); 
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
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}