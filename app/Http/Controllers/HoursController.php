<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\ Http\Request;

class HoursController extends Controller
{
    public function get_in($id){
        date_default_timezone_set("America/Mexico_City");
        DB::table("hours")->insert([
            "user_id" => $id,
            "fecha" => Carbon::now()->toDateString(),
            "hora_entrada" => Carbon::now()->toTimeString(),
            // "hora_salida" => Carbon::now()->toTimeString(),
        ]);
        return redirect()->route("home");
    }

    function get_out($id){
        date_default_timezone_set("America/Mexico_City");
        $currentDate = Carbon::now()->toDateString();
        //actualizar hora de salida, de un usuario
        DB::table("hours")
        ->where([
            "user_id" => $id,
            "fecha" => $currentDate,
            "hora_salida" => null
        ])
        ->update(["hora_salida"=>Carbon::now()->toTimeString()]);
        return redirect()->route("home");
    }
}
