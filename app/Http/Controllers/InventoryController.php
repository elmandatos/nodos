<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function nombre($nombre='Invitado')
    {
    	return view('almacen', compact('nombre'));
    }
}
