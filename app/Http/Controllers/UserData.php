<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;
use Excel;

class UserData extends Controller
{
    public function index() 
    {
        return view("usersData.index");
    }

    public function importUsers(Request $request) 
    {
        \Excel::load($request->excel, function($reader) {
 
            $excel = $reader->get();
    
            // iteracción
            $reader->each(function($row) {    
                $user = new User;
                $user->nombres = $row->nombres;
                $user->apellidos = $row->apellidos;
                $user->telefono = $row->telefono;
                $user->email = $row->email;
                $user->matricula = $row->matricula;
                $user->carrera = $row->carrera;
                $user->rol = $row->tipo;
                $user->tipo_de_usuario = "Usuario";
                $user->save();
            });
        });

        return redirect()->route("users.index");
    }
}
