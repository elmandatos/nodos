<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use UsersController;
use DB;
use Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EmailsController extends Controller
{
    /**
     * Generacion y envio por EMAIL de los codigos QR
     */

    // function __construct(){
    //     $this->middleware("auth");
    // }

    public function sendAllEmails() {
        $users = DB::table("users")->get();
        foreach($users as $user) {
            $qr = QrCode::format('png')->size(399)->generate($user->id, '../public/qrcodes/qrcode_id.png');
            Mail::send("email.plantillaEmail",
            ['qr' => $qr],
            function($message) use ($user){
                $message->from('nodocreativo.itm@gmail.com', 'QR - Favor de no responder a este correo');
                $message ->attach('../public/qrcodes/qrcode_id.png');
                $message->to($user->email)->subject('QR de acceso al Nodo creativo');
            });
        }
        return redirect()->route("users.index");
    }

    public function sendUserEmail($id) {
        $user = DB::table("users")->where("id", $id)->first();

        $qr = QrCode::format('png')->size(399)->generate($user->id, '../public/qrcodes/qrcode_id.png');
        // return $qr;
        Mail::send("email.plantillaEmail",['qr' => $qr],
        function($message) use ($user){
            $message->from('nodocreativo.itm@gmail.com', 'QR - Favor de no responder a este correo');
            $message ->attach('../public/qrcodes/qrcode_id.png');
            $message->to($user->email)->subject('QR de acceso al Nodo creativo');
        });
    }
}
