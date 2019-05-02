<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class Controlador extends Controller{
	function saludar (){
		echo "hola";
	}
	function despedir(){
		echo "adios";
	}

	function saludar_ingles (){
		return view('hola');
	}
	function despedir_ingles (){
		return view('despide');
	}

	function saludar_italiano (){
		return view('ciao');
	}
	function despedir_italiano (){
		return view('addio');
	}

}