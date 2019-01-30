<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrestamosController extends Controller
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
        // $prestamos = DB::table('prestamos')
        //             ->join('users',  'users.id',         '=', 'prestamos.id_usuario')
        //             ->join('piezas', 'piezas.id_piezas', '=', 'prestamos.id_piezas')
        //             ->select('prestamos.id', 'users.nombres', 'piezas.nombre', 'prestamos.cantidad', 'prestamos.estado')
        //             ->get();
        // Consulta para IDs de usuarios distintos, devuelve arreglo de objetos
        $lista_usuarios = DB::table('prestamos')
                            ->join('users', 'users.id', '=', 'prestamos.id_usuario')
                            ->select('users.nombres as nombreUsuario', 'users.apellidos as apellidoUsuario', 'users.foto as foto')
                            ->where('prestamos.estado','activo')
                            ->distinct()
                            ->get();

        // Generar Tarjeta de prestatario (de acuerdo al ID)
        return view('prestamos.index', compact('lista_usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $id_p = DB::table('prestamos')->select('id','cantidad')->where('id_usuario',$request->input('hidden-nombre'))->where('id_piezas',$request->input('piezasH'))->where('estado','activo')->first();
        
        if (!(DB::table('prestamos')->where('id_usuario',$request->input('hidden-nombre'))->where('id_piezas',$request->input('piezasH'))->where('estado','activo')->exists()))
        {
            DB::table('prestamos')->insert([
                    'id_usuario' =>$request->input('hidden-nombre'),
                    'id_piezas' =>$request->input('piezasH'),
                    'cantidad' =>$request->input('cantidad'),
                    'estado' =>"activo",
                    'hora_ingreso'=>CARBON::now(),
                ]);
            }
        else{
            $ncantidad = $request->input('cantidad') + $id_p->cantidad;
            DB::table('prestamos')->where('id',$id_p->id)->update([
                'cantidad' =>$ncantidad,
            ]);
        }

        return redirect()->route('prestamos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
        DB::table('prestamos')->where('id',$id)->update([
                'estado'      => "inactivo",
            ]);
        
        DB::table('prestamos')->insert([
                    'id_usuario' =>$request->input('nombre'),
                    'id_piezas' =>$request->input('piezas'),
                    'cantidad' =>$request->input('cantidad'),
                    'estado' =>"activo",
                    'hora_ingreso'=>CARBON::now(),
                ]);
        return redirect()->route('prestamos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id_pieza = DB::table('prestamos')->select('id_piezas')->where('id','LIKE','%'.$id."%")->first();
        $id_usuario = DB::table('prestamos')->select('id_usuario')->where('id','LIKE','%'.$id.'%')->first();
        $ids = DB::table('prestamos')->select('id')->where('id_usuario', $id_usuario->id_usuario)->where('id_piezas', $id_pieza->id_piezas)->get();

        foreach ($ids as $id) {
            DB::table('prestamos')->where('id',$id->id)->update([
                'estado'      => "inactivo",
            ]);
        }
        return redirect()->route('prestamos.index');
    }
    public function searchUsuarios(Request $request) {
        $query = $request->usuario_a_consultar;
        $existeUsuario = DB::table('users')
        ->where('nombres', 'LIKE', '%' . $query . '%')
        ->exists();

        if($existeUsuario) {
            $users = DB::table('users')
            ->where('nombres', 'LIKE', '%' . $query . '%')->get();
            return view('usuarios.index', compact("users"));

        }else {
            $users = array();
            return view('usuarios.index', compact("users"));
        }
    }
     public function buscarUsuarios(){
        return json_encode(DB::table('users')->select('id','nombres','apellidos','foto')->get());
    }

    public function searchPieza(Request $request) {
        $query = $request->pieza_a_consultar;
        $existePieza = DB::table('piezas')
        ->where('nombre', 'LIKE', '%' . $query . '%')
        ->exists();

        if($existePieza) {
            $piezas = DB::table('piezas')
            ->where('nombre', 'LIKE', '%' . $query . '%')->get();
            return view('inventario.index', compact("piezas"));

        }else {
            $piezas = array();
            return view('inventario.index', compact("piezas"));
        }
    }

    public function buscarPieza(){
        return json_encode(DB::table('piezas')->select('id_piezas','nombre','foto')->get());
    }

    public function jsonUsers(){
        $usersPrestamos = DB::table('prestamos')
                            ->join('users', 'users.id', '=', 'prestamos.id_usuario')
                            ->select('users.id','users.foto as foto', 'users.nombres as nombreUsuario', 'users.apellidos as apellidoUsuario')
                            ->where('prestamos.estado','activo')
                            ->distinct()
                            ->get();
        return json_encode($usersPrestamos);
    }

    public function jsonPiezas(){
        $piezasPrestamos = DB::table('prestamos')
                            ->join('piezas', 'piezas.id_piezas', '=', 'prestamos.id_piezas')
                            ->select(
                                array(  'piezas.id_piezas',
                                        'piezas.foto as fotoPieza',
                                        'piezas.nombre as nombrePieza', 
                                        DB::raw('SUM(prestamos.cantidad) as cantidadPieza'))
                            )
                            ->where('prestamos.estado','activo')
                            ->groupBy('prestamos.id_piezas')
                            ->get();
        return json_encode($piezasPrestamos);
    }

    public function jsonIdPrestamos($nombre, $apellido){
            $prestamos =  DB::table('prestamos')
                        ->join('users', 'users.id', '=', 'prestamos.id_usuario')
                        ->join('piezas', 'piezas.id_piezas', '=', 'prestamos.id_piezas')
                        ->select('prestamos.id as idPrestamo', 'piezas.id_piezas as idPieza', 'piezas.foto as fotoPieza', 'piezas.nombre as nombrePieza', 'prestamos.cantidad as cantidadPrestamo')
                        ->where('users.nombres', 'LIKE', '%' . $nombre . '%')
                        ->where('users.apellidos', 'LIKE', '%' . $apellido . '%')
                        ->where('prestamos.estado','activo')
                        ->get();
            return json_encode($prestamos);
        }
    
    // public function jsonIdPrestamos($id_usuario, $id_pieza){
    //         $idPrestamos = DB::table('prestamos')
    //                         ->select('id')
    //                         ->where('id_usuario', $id_usuario)
    //                         ->where('id_piezas',  $id_pieza)
    //                         ->where('estado','activo')
    //                         ->first();
    //         return json_encode($idPrestamos);
    //     }
}
