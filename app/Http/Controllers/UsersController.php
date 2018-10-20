<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UsersController extends Controller
{

    // function __construct(){
    //     $this->middleware("auth",["except" => ["show"]]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = DB::table("users")->get();
        $users =  User::all();
        return view("usuarios.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("usuarios.create");
    }

    public function createFile($matricula, $foto) {
        define('UPLOAD_DIR', '../public/usersImg/'); //Obtenemos la ruta donde guardaremos la foto
        $data = base64_decode($foto);   //Decodificamos la foto
        $file = UPLOAD_DIR . $matricula . '.png'; //Generamos la ruta completa del archivo
        $img = str_replace('../public/', '/', $file);   //Ruta Front-End
        $success = file_put_contents($file, $data); //Creamos la foto en el servidor
        return $img;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        

        
        //Procesamiento de Foto
        if($request->input("foto")!="")
            $img = $this->createFile($request->input("matricula"), $request->input("foto"));
        else
            $img = "/user.png";
        
        
        DB::table("users")->insert([
            "nombres" => ucwords($request->input("nombres")),
            "apellidos" => ucwords($request->input("apellidos")),
            "telefono" => $request->input("telefono"),
            "email" => strtolower($request->input("email")),
            "matricula" => strtoupper($request->input("matricula")),
            "carrera" => $request->input("carrera"),
            "rol" => $request->input("rol"),
            "foto" => $img,    //Guardamos la ruta en la BD
            "password" => bcrypt($request->input("password")),
            "tipo_de_usuario" => ucfirst($request->input("tipoDeUsuario")),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
       
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table("users")->where("id", $id)->first();
        return view("usuarios.show", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table("users")->where("id", $id)->first();
        return view("usuarios.edit", compact("user"));
    }

    public function generateQr($id)
    {
        return QrCode::size(399)->generate($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->nombres = ucwords($request->input("nombres"));
        $user->apellidos = ucwords($request->input("apellidos"));
        $user->email = strtolower($request->input("email"));
        $user->matricula = ucfirst($request->input("matricula"));
        if($request->input("foto") != $user->foto)
            $user->foto = $this->createFile($request->input("matricula"), $request->input("foto"));
        else
            $user->foto = "/user.png";

        $user->carrera = ucfirst($request->input("carrera"));
        $user->rol = $request->input("rol");
        $user->telefono = $request->input("telefono");
        $user->tipo_de_usuario = ucfirst($request->input("tipoDeUsuario"));
        $user->update();
        return redirect()->route("users.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("users")->where("id", $id)->delete();
        return redirect()->route("users.index");
    }

    public function search(Request $request) {

        $query = $request->search;
        $userExists = DB::table('users')
        ->where('nombres', 'LIKE', '%' . $query . '%')
        ->orWhere('apellidos', 'LIKE', '%' . $query . '%')
        ->exists();

        if($userExists) {
            $users = DB::table('users')
            ->where('nombres', 'LIKE', '%' . $query . '%')
            ->orWhere('apellidos', 'LIKE', '%' . $query . '%')->get();
            return view('usuarios.search', compact("users"));
            
        }else {
            return "usuario no existe";
        }
        
    }
}
