<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $piezas = DB::table('piezas')->select('nombre','foto','cantidad')->get();
        return view('prestamos.index', compact('piezas'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request) {
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
     public function buscar(){
        return json_encode(DB::table('users')->select('nombres','apellidos','foto')->get());
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
        return json_encode(DB::table('piezas')->select('nombre','foto')->get());
    }
}
