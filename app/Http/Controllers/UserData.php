<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
                $user->nombres = $row->nombre;
                $user->apellidos = $row->email;
                $user->telefonos = bcrypt('secret');
                $user->save();
            });
        });

        return "Terminado";
    }
}
