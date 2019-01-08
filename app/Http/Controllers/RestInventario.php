<?php


namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RestInventario extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $piezas = DB::table('piezas')->get();

       return view('inventario.index', compact('piezas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('inventario.CreateInventario');
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
        DB::table('piezas')->insert([
            'nombre' => $request->input('nombre'),
            'modelo' => $request->input('modelo'),
            'cantidad' => $request->input('cantidad'),
            'descripcion' => $request->input('descripcion'),
            'anaquel' => $request->input('anaquel'),
            'created_at'=>CARBON::now(),
        ]);

        return view('inventario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pieza = DB::table('piezas')->where('id_piezas',$id)->first();
        return view('inventario.show', compact('pieza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pieza = DB::table('piezas')->where('id_piezas',$id)->first();
        return view('inventario.edit', compact('pieza'));
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

        DB::table('piezas')->where('id_piezas',$id)->update([
            'nombre' => $request->input('nombre'),
            'modelo' => $request->input('modelo'),
            'cantidad' => $request->input('cantidad'),
            'descripcion' => $request->input('descripcion'),
            'anaquel' => $request->input('anaquel'),
            'updated_at'=>CARBON::now(),
        ]);

        return redirect()->route('inventario.index');
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
}
