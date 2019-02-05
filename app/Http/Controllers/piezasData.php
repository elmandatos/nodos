<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class piezasData extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("piezasData.index");
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
    public function importPiezas(Request $request)
    {
        \Excel::load($request->excel, function($reader) {

            $excel = $reader->get();

            // iteracción
            $reader->each(function($row) {
                foreach ($row as $key) {
                    DB::table('piezas')->insert([
                        "nombre" => $key->nombre,
                        "modelo" => $key->n_de_serie,
                        "descripcion" => $key->descripcion,
                        "cantidad" => $key->cantidad,
                        "anaquel" => $key->ubicacion,
                        "id_estado" => "1",
                        "foto" => "/box.png",
                        "created_at" =>CARBON::now(),
                    ]);
                    // echo $key->nombre;
                }
                    
                
            });
        });

        return redirect()->route("almacen.index");
    }
}
