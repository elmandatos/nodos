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
            Mail::send("email.all",
            ['qr' => $qr],
            function($message) use ($user){
                $message->from('ivan.lopez3k@gmail.com', 'probando 1 2 3');
                $message ->attach('../public/qrcodes/qrcode_id.png');
                $message->to($user->email)->subject('test email');
            });
        }
        return redirect()->route("users.index");
    }

    public function sendUserEmail($id) {
        $user = DB::table("users")->where("id", $id)->first();

        $qr = QrCode::format('png')->size(399)->generate($user->id, '../public/qrcodes/qrcode_id.png');
        Mail::send("email.all",
        ['qr' => $qr],
        function($message) use ($user){
            $message->from('ivan.lopez3k@gmail.com', 'probando 1 2 3');
            $message ->attach('../public/qrcodes/qrcode_id.png');
            $message->to($user->email)->subject('test email');
        });

        return redirect()->route("users.index");
    }
}
