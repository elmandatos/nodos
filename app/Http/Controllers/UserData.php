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
                $user->rol = $row->tipo;
                $user->tipo_de_usuario = "Usuario";
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
            $hour = DB::table('hours')
            ->select('hours_id', DB::raw('time(sum(TIMEDIFF(hora_salida, hora_entrada))) as total'))
            ->whereNotNull('hora_salida')
            ->groupBy('hours_id');

            $users = DB::table('hours')
            ->joinSub($hour, 'total', function($join) {
                $join->on('hours.hours_id', '=', 'total.hours_id');
            })
            ->join('users', 'users.id', '=', 'hours.user_id')
            ->select('users.nombres', 'users.apellidos','hours.fecha', 'hours.hora_entrada', 'hours.hora_salida', 'total')
            ->orderBy('users.id', 'asc')
            ->get();

            $users = json_decode(json_encode($users), true);
            
            $excel->sheet('Registro de horas', function($sheet) use($users) {
                $sheet->setColumnFormat(array(
                    'C'=>'dd/mm/yy',
                    'D'=>'h:mm:ss',
                    'E'=>'h:mm:ss',
                    'F'=>'h:mm:ss',
                    'G'=>'[h]:mm:ss'
                ));

                $i = 2;
                $totalHorasFormula="=";

                $nombre = $users[0]['nombres'];
                foreach($users as $user){
                    if($user['nombres'] == $nombre){
                        $sheet->setCellValue('F'.$i,'=E'.$i.'-D'.$i);
                        if( $totalHorasFormula == "=" ){
                            $totalHorasFormula.="F$i";
                        }else{
                            $totalHorasFormula.="+F$i";
                            $i++;
                        }
                    }else {
                        $i++;
                        $sheet->setCellValue('G'.($i-2),"Total:");
                        $sheet->setCellValue('G'.($i-1),$totalHorasFormula);
                        $nombre = $user['nombres'];
                        $totalHorasFormula="=F$i";      
                    }
                }     
                $sheet->fromArray($users);
            });
        })->export('xlsx');
        
    }
}
