<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Carro;

class CarroController extends Controller{
	function agregar(){
			$carros = Carro::all();
		return view ('agregar',compact('carros'));
	}

	function procesar(Request $datos)
	{
		$_POST = $datos->toArray();
		$nuevo = Carro::create();
		$nuevo->marca=$_POST["marca"];
		$nuevo->modelo=$_POST["modelo"];
		$nuevo->linea=$_POST["linea"];
		$nuevo->save();
		return redirect('/carro_agregar');
	}

	function eliminar($id){

		$seleccionado = Carro::find($id);
		$seleccionado->delete();
		return redirect('/carro_agregar');

	}

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