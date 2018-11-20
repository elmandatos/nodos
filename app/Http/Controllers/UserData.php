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

    public function indexHours()
    {
        return view("usersData.userDataHours");
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
                $user->rol = $row->rol;
                $user->tipo_de_usuario = "Usuario";
                $user->foto = "/user.png";
                $user->save();
            });
        });

        return redirect()->route("users.index");
    }

    public function importUserHours(Request $request)
    {
        \Excel::load($request->excel, function($reader) {

            $excel = $reader->get();
            // iteracción
            $reader->each(function($row) {

                DB::table("hours")->insertGetId([
                    "user_id" => $row->user_id,
                    "fecha" => $row->fecha,
                    "hora_entrada" => $row->hora_entrada,
                    "hora_salida" => $row->hora_salida,
                ]);
            });
        });
        return redirect()->route("users.index");
    }

    public function exportUsersHours()
    {
        Excel::create('Users', function($excel) {

            $usersHours = DB::table('hours')
            ->join('users','users.id','=','hours.user_id')
            ->select('users.id', 'users.nombres', 'users.apellidos', 'hours.fecha', 'hours.hora_entrada',
                    'hours.hora_salida',
                DB::raw('TIMEDIFF(hora_salida,hora_entrada) as tiempo'))
            ->whereNotNull('hora_salida')
            ->orderBy('hours.user_id')
            ->orderBy('hours.fecha')
            ->get();

            $totalHoras = DB::table('hours')
            ->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(hora_salida,hora_entrada)))) as total'))
            ->whereNotNull('hora_salida')
            ->groupBy('user_id')
            ->get();

            $usersHours = json_decode(json_encode($usersHours), true);
            $totalHoras = json_decode(json_encode($totalHoras), true);

            $indice = 0;
            $usuario = 0;
            $espacio = array(" ");
            for ($i=0; $i < count($usersHours); $i++) {
                if($usersHours[$i]["id"] != $usuario){
                    $usuario = $usersHours[$i]["id"];
                    $usersHours[$i]["horas_totales"] = $totalHoras[$indice]["total"];
                    $indice++;
                    if($i!=0){
                        array_splice($usersHours, $i,0,[array("")]);
                        continue;
                    }
                }
            }

            $excel->sheet('Registro de horas', function($sheet) use($usersHours) {
                $sheet->setColumnFormat(array(
                    'D'=>'dd/mm/yy',
                    'E'=>'h:mm:ss',
                    'F'=>'h:mm:ss',
                    'G'=>'h:mm:ss',
                    'H'=>'[h]:mm:ss'
                ));
                $sheet->fromArray($usersHours);
            });
        })->export('xlsx');
    }

    public function exportUsersCelulasHours()
    {
        Excel::create('Usuarios Celulas', function($excel) {

            $usersHours = DB::table('hours')
            ->join('users','users.id','=','hours.user_id')
            ->select('users.id', 'users.nombres', 'users.apellidos', 'hours.fecha', 'hours.hora_entrada',
                    'hours.hora_salida',
                DB::raw('TIMEDIFF(hora_salida,hora_entrada) as tiempo'))
            ->whereNotNull('hora_salida')
            ->where('users.rol','Celulas de Innovación')
            ->orderBy('hours.user_id')
            ->get();

            $totalHoras = DB::table('hours')
            ->join('users','users.id','=','hours.user_id')
            ->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(hora_salida,hora_entrada)))) as total'))
            ->whereNotNull('hora_salida')
            ->where('users.rol','Celulas de Innovación')
            ->groupBy('hours.user_id')
            ->get();

            $usersHours = json_decode(json_encode($usersHours), true);
            $totalHoras = json_decode(json_encode($totalHoras), true);

            $indice = 0;
            $usuario = 0;
            $espacio = array(" ");
            for ($i=0; $i < count($usersHours); $i++) {
                if($usersHours[$i]["id"] != $usuario){
                    $usuario = $usersHours[$i]["id"];
                    $usersHours[$i]["horas_totales"] = $totalHoras[$indice]["total"];
                    $indice++;
                    if($i!=0){
                        array_splice($usersHours, $i,0,[array("")]);
                        continue;
                    }
                }
            }

            $excel->sheet('Registro de horas', function($sheet) use($usersHours) {
                $sheet->setColumnFormat(array(
                    'D'=>'dd/mm/yy',
                    'E'=>'h:mm:ss',
                    'F'=>'h:mm:ss',
                    'G'=>'h:mm:ss',
                    'H'=>'[h]:mm:ss'
                ));
                $sheet->fromArray($usersHours);
            });
        })->export('xlsx');
    }
}
