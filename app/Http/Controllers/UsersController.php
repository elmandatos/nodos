<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\EmailsController;
class UsersController extends Controller
{

    function __construct(){
        $this->middleware("auth",["except" => ["show"]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users =  User::paginate(5);

      return view("usuarios.index")->withUsers($users);
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

    public function createFile($telefono, $foto) {
        define('UPLOAD_DIR', '../public/usersImg/'); //Obtenemos la ruta donde guardaremos la foto
        $data = base64_decode($foto);   //Decodificamos la foto
        $file = UPLOAD_DIR . $telefono . '.png'; //Generamos la ruta completa del archivo
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
    public function store(Request $request)
    {
        //reglas del request
        $rules = [
            "nombres" => "required",
            "apellidos" => "required",
            "telefono" => "required",
            "email" => "required|email",
            "carrera" => "required",
            "rol" => "required",
            "matricula" => "",
            "tipoDeUsuario" => "required|in:administrador,asistente,usuario",
            "foto" => "",
        ];

        $inputs = array_keys($request->all());

        // se agregan reglas de validacion
        if(in_array("password",$inputs)){
            $rules["password"] = "required";
            $rules["confirmarContraseña"] = "required";
        }
        //se hacen validaciones
        $this->validate($request,$rules);

        //Procesamiento de Foto
        if($request->input("foto")!="")
            $img = $this->createFile($request->input("telefono"), $request->input("foto"));
        else
            $img = "/user.png";
        if($request->input("matricula")!= NULL)
          $matricula = strtoupper($request->input("matricula"));
        else
          $matricula = null;

        DB::table("users")->insert([
            "nombres" => mb_convert_case($request->input("nombres"),MB_CASE_TITLE),
            "apellidos" => mb_convert_case($request->input("apellidos"),MB_CASE_TITLE),
            "telefono" => $request->input("telefono"),
            "email" => strtolower($request->input("email")),
            "matricula" => $matricula ,
            "carrera" => $request->input("carrera"),
            "rol" => $request->input("rol"),
            "foto" => $img,    //Guardamos la ruta en la BD
            "password" => bcrypt($request->input("password")),
            "tipo_de_usuario" => ucfirst($request->input("tipoDeUsuario")),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
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
      $tiempoTotal = DB::table("hours")
      ->select(DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(hora_salida,hora_entrada)))) as tiempo"))
      ->where("user_id",$id)
      ->where("hora_salida","<>","NULL")
      ->get();

      $fecha = Carbon::now()->toDateString();

      $statusEntrada =DB::select("SELECT COUNT(*) as total FROM `hours` WHERE `hora_salida` IS NULL AND `fecha` = '".$fecha."' AND user_id = $id");
      $statusEntrada=json_decode(json_encode($statusEntrada), true);

      $statusEntrada = $statusEntrada[0]["total"];

      return view("usuarios.show",  compact("user","tiempoTotal","statusEntrada"));
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
        $email = new EmailsController();
        $qr = $email->sendUserEmail($id);
         return redirect()->route("users.index");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //reglas del request
        $rules = [
            "nombres" => "required",
            "apellidos" => "required",
            "telefono" => "required",
            "email" => "required|email",
            "carrera" => "required",
            "rol" => "required",
            "foto" => "",
        ];


        $this->validate($request,$rules);

        $user = User::findOrFail($id);
        if($request->input("matricula")!= NULL)
          $matricula = strtoupper($request->input("matricula"));
        else
          $matricula = null;

        $user->nombres = mb_convert_case($request->input("nombres"),MB_CASE_TITLE);
        $user->apellidos = mb_convert_case($request->input("apellidos"),MB_CASE_TITLE);
        $user->email = strtolower($request->input("email"));
        $user->matricula = $matricula;
        if($request->input("foto") != $user->foto)
            $user->foto = $this->createFile($request->input("telefono"), $request->input("foto"));


        $user->carrera = ucfirst($request->input("carrera"));
        $user->rol = $request->input("rol");
        $user->telefono = $request->input("telefono");
        $user->tipo_de_usuario = ucfirst($request->input("tipoDeUsuario"));
      $user->update();
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
        $imgNotFound = false;

        $query = $request->search;
        $userExists = DB::table('users')
        ->where('nombres', 'LIKE', '%' . $query . '%')
        ->orWhere('apellidos', 'LIKE', '%' . $query . '%')
        ->exists();

        if($userExists) {
            $users = DB::table('users')
            ->where('nombres', 'LIKE', '%' . $query . '%')
            ->orWhere('apellidos', 'LIKE', '%' . $query . '%')->get();
            return view('usuarios.index', compact("users","imgNotFound"));

        }else {
            $users = array();
            $imgNotFound = true;
            return view('usuarios.index', compact("users","imgNotFound"));
        }

    }
}
