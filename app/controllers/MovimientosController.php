<?php

class MovimientosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	$movimientos = Movimiento::all();

		return View::make('movimientos/index')->with('movimientos',$movimientos);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('movimientos/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		   $input = Input::all();

    $movimientos = Movimiento::all();
     $pasa=FALSE;
     $cheques= Chuequesxcuentum::all();    	

$cuentas = Cuentum::all();
$sante=0;
    foreach ($cuentas as $cuenta){
    	if ($cuenta->id==$input['cuenta']) {
    		$pasa=TRUE;    		
    		$sante=$cuenta->monto;
    		$cret=$cuenta->id;
    		
    		
    	}
    }
    $cuentax=Cuentum::find($cret);


if($input['numero']>$cuentax->cheques){
				$pasa=FALSE;    
				return Redirect::to('movimientos')->with('mensaje_registro', 'Cuenta no posee ese cheque')->with('color', 'alert alert-danger');		
    		}

if($pasa==FALSE){
    return Redirect::to('movimientos')->with('mensaje_registro', 'Cuenta retiro no existe')->with('color', 'alert alert-danger');     		
    }

     foreach ($cuentas as $cuenta){
    	if ($cuenta->id==$input['cuenta_recibe']) {
    		$pasa=TRUE;    		
    		$creb=$cuenta->id;
    	}
    }

if($pasa==FALSE){

    return Redirect::to('movimientos')->with('mensaje_registro', 'Cuenta que recibe no existe')->with('color', 'alert alert-danger');     		
    }
    foreach ($movimientos as $movimiento){
    	if ($movimiento->tipo==$input['tipo']) {
    		if ($movimiento->numero==$input['numero']) {
    			if ($movimiento->cuenta==$input['cuenta']) {
    				if ($movimiento->cuenta_recibe==$input['cuenta_recibe']) {
				    		$pasa=FALSE;
				    		return Redirect::to('movimientos')->with('mensaje_registro', 'Transaccion ya fue reliazada')->with('color', 'alert alert-danger'); 
    				}
    			}
    		}
    	}
    }
    
if($pasa){
	 // entra y sale revisa  si la cuenta que sale 
		foreach ($cheques as $cheque){
    	if($input['cuenta']==$cheque->cuenta){
    	if($input['numero']==$cheque->numero){
			$pasa=FALSE;
			return Redirect::to('movimientos')->with('mensaje_registro', 'Chqeue ya cobrado')->with('color', 'alert alert-danger');
		}}
	}

	
 }


    if($pasa){

    
    $usr=new movimiento;
    $usr->numero=$input['numero'];
	$usr->tipo=$input['tipo'];
	$usr->cuenta=$input['cuenta'];
	$usr->nombres=$input['nombres'];
	$usr->apellidos=$input['apellidos'];
	$usr->dpi=$input['dpi'];
	$usr->fech_creo=$input['fech_creo'];
	$usr->fech_finalizo=$input['fech_finalizo'];
	$usr->cuenta_recibe=$input['cuenta_recibe'];
	$usr->user=Auth::user()->id;
	$usr->saldo_ant=$sante;
	$usr->monto=$input['monto'];

    //users::create($usr);
    $usr->save();

     $csaliente = Cuentum::find($cret);
     $centrante = Cuentum::find($creb);
     	$csaliente->monto=$csaliente->monto-$input['monto'];
     	if($input['tipo']!=1){
	     	$centrante->monto=$centrante->monto+$input['monto'];
	     	$centrante->save();
 		}
			 $csaliente->save();

     $ccheque =new Chuequesxcuentum;
     	$ccheque->numero=$input['numero'];
     	$ccheque->cuenta=$input['cuenta'];
     	$ccheque->monto=$input['monto'];
     $ccheque->save();



return Redirect::to('movimientos')->with('mensaje_registro', 'Movimiento Registrado')->with('color', 'alert alert-success');
    }else{
return Redirect::to('movimientos')->with('mensaje_registro', 'Movimiento ya exite')->with('color', 'alert alert-danger'); 
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
		
		 $usr = Movimiento::find($id);
    $existe=TRUE;
    if(is_null($usr)){
		$existe=FALSE;    	
    }
		return View::make('movimientos/show')->with('usr', $usr)->with('existe', $existe);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
			$usr = movimiento::find($id);
    $existe=TRUE;
    if(is_null($usr)){
		$existe=FALSE;    	
    }
		return View::make('movimientos/edit')->with('usr', $usr)->with('existe', $existe);
	
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
 $usr = movimiento::find($id);
    $existe=TRUE;
    if(is_null($usr)){
		$existe=FALSE;    	
    }else{


		 $input = Input::all();


    $usr->id=$input['id'];
	$usr->nombre=$input['nombre'];
	$usr->direccion=$input['direccion'];
	$usr->telefono=$input['telefono'];
    //users::create($usr);
    $usr->save();
return View::make('movimientos/show')->with('mensaje_registro', 'movimiento Actualizado')->with('color', 'alert alert-success')->with('usr', $usr)->with('existe', $existe);
    }
return View::make('movimientos/show')->with('mensaje_registro', 'Usuario ya exite')->with('color', 'alert alert-danger')->with('usr', $usr)->with('existe', $existe); 
    
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	Movimiento::destroy($id);

		return Redirect::route('movimientos.index');
	}

}