<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
class PagesController extends Controller
{
    public function home(){
        return view('qr');
    }
}
