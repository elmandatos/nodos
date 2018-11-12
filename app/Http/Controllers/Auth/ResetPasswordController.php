<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use DB;
class ResetPasswordController extends Controller
{
    public function showResetForm(){
      return view("auth.resetPassword");
    }

    public function resetPassword(Request $request){
      $user=DB::table("users")
      ->where(["email" => $request->input("email")])
      ->update(["password" => bcrypt($request->input("password"))]);
      return  redirect()->route("users.index");
    }
}
