<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateInventario;

class InventoryController extends Controller
{
    public function nombre()
    {
    	return view('almacen');
    }
    public function validacion(CreateInventario $request)
    {
    	return $request -> all();
    	
    }
}
