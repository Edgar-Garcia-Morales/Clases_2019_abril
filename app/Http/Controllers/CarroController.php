<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Carro;

class CarroController extends Controller{
	function agregar(){
			$carros = Carro::all();
		return view ('agregar',compact('carros'));
	}
}