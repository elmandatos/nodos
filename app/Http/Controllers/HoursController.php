<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\ Http\Request;

class HoursController extends Controller
{
    public function get_in($id){
        date_default_timezone_set("America/Mexico_City");
        $currentDate = Carbon::now()->toDateString();
          DB::table("hours")->insert([
              "user_id" => $id,
              "fecha" => Carbon::now()->toDateString(),
              "hora_entrada" => Carbon::now()->toTimeString(),
          ]);
        // $ultimo = DB::table("hours")
        // ->where([
        //     "user_id" => $id,
        //     "fecha" => $currentDate,
        //     "hora_salida" => null,
        // ])->get();

        // if($ultimo = 0){
        //
        //   DB::table("hours")->insert([
        //       "user_id" => $id,
        //       "fecha" => Carbon::now()->toDateString(),
        //       "hora_entrada" => Carbon::now()->toTimeString(),
        //   ]);
        // }

        // return redirect()->route("home");
    }

    function get_out($id){
        date_default_timezone_set("America/Mexico_City");
        $currentDate = Carbon::now()->toDateString();
        $currentTime = Carbon::now()->toTimeString();

        //se encuantra el ultimo registro
        $hours_id = DB::table("hours")
        ->where([
            "user_id" => $id,
            "fecha" => $currentDate,
            // "hora_salida" => null,
        ])->max("hours_id");

        //se actualiza hora de salida
        DB::table("hours")
        ->where([
            "hours_id" => $hours_id,
            "hora_salida" => null
        ])->update(["hora_salida"=>$currentTime]);

        // return redirect()->route("home");
    }
}
