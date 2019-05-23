<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Cliente;

class ClientesController extends Controller{

	function listar(){
			$Clientes = Cliente::all();
		return view ('Clientes.listar',compact('Clientes'));
	}

	function agregar(Request $datos)
	{
		$_POST = $datos->toArray();
		$nuevo = Cliente::create();
		$nuevo->nombre=$_POST["nombre"];
		$nuevo->correo=$_POST["correo"];
		$nuevo->telefono=$_POST["telefono"];
		$nuevo->save();
		return redirect('/clientes');
	}
	function eliminar($id){
		try {
			$seleccionado = Cliente::find($id);
			$seleccionado->delete();
			return redirect('/clientes');
		} catch (\Exception $e) {
            
            $error = $e->getMessage();
            $num   = $e->getCode();
            if ($num == 23000) 
            	return redirect('/clientes')->with('error', 'Ese cliente esta en uso');
            else
            	return redirect('/clientes')->with('error', "Ha ocurrido un error con el codigo: " . $num );

    }
	}

function actualiza_nombre(Request $datos)
	{
		$_POST = $datos->toArray();
		$nuevo = Cliente::find($_POST["id"]);
		$nuevo->nombre=$_POST["nombre"];
		$nuevo->save();
		return $nuevo->toJson();
	}













/////////

	function modificar($id){

		$seleccionado = Carro::find($id);
		return view ('modificar',compact('seleccionado'));

	}

	function procesar2(Request $datos)
	{
		$_POST = $datos->toArray();
		$nuevo = Carro::find($_POST["id"]);
		$nuevo->marca=$_POST["marca"];
		$nuevo->modelo=$_POST["modelo"];
		$nuevo->linea=$_POST["linea"];
		$nuevo->save();
		return redirect('/carro_agregar');
	}



}