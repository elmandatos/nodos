<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Carbon\Carbon;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table("users")->get();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        DB::table("users")->insert([
            "nombres" => ucwords($request->input("nombres")),
            "apellidos" => ucwords($request->input("apellidos")),
            "telefono" => $request->input("telefono"),
            "correo" => strtolower($request->input("correo")),
            "matricula" => strtoupper($request->input("matricula")),
            "carrera" => $request->input("carrera"),
            "rol" => $request->input("rol"),
            "foto" => $request->input("foto"),
            "tipo_de_usuario" => ucfirst($request->input("tipoDeUsuario")),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        // return $request->all();
        return redirect()->route("users.index");
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
        $user = DB::table("users")->where("id", $id)->update([
            "nombres" => ucwords($request->input("nombres")),
            "apellidos" => ucwords($request->input("apellidos")),
            "telefono" => $request->input("telefono"),
            "correo" => strtolower($request->input("correo")),
            "matricula" => strtoupper($request->input("matricula")),
            "carrera" => $request->input("carrera"),
            "rol" => $request->input("rol"),
            "foto" => $request->input("foto"),
            "tipo_de_usuario" => ucfirst($request->input("tipoDeUsuario")),
            "updated_at" => Carbon::now(),
        ]);
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
}
