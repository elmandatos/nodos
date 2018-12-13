<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function nombre()
    {
    	return view('almacen');
    }
    public function validacion()
    {
    	# code...
    	return 'hola';
    }
}
