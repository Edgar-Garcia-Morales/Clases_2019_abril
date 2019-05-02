<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class carro extends Model
{
	protected $table='carro';
	public $timestamps =false;
	protected $fillable = ['marca','modelo','linea'];
}