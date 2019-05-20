<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Evento;
use App\Http\Models\Cliente;

class EventosController extends Controller{

	function listar(){
			$Eventos = Evento::all();
			$Clientes = Cliente::all();
		return view ('Eventos.listar',compact('Eventos','Clientes'));
	}

	function agregar(Request $datos)
	{
		$_POST = $datos->toArray();
		var_dump($_POST);
		$nuevo = new Evento();
		$nuevo->fill($_POST);
		$nuevo->save();
		return redirect('/eventos');
	}
	function eliminar($id){
		$seleccionado = Cliente::find($id);
		$seleccionado->delete();
		return redirect('/clientes');
	}

function actualiza_nombre(Request $datos)
	{
		$_POST = $datos->toArray();

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