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
       $piezas = DB::table('piezas')->paginate(5);
       $makePages = true;
       return view('inventario.index', compact('piezas', 'makePages'));
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

    public function createFile($nombre, $foto) {
        define('UPLOAD_DIR', '../public/almacenImg/'); //Obtenemos la ruta donde guardaremos la foto
        $data = base64_decode($foto);   //Decodificamos la foto
        $file = UPLOAD_DIR . $nombre . '.png'; //Generamos la ruta completa del archivo
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
        $rules = [
            "nombre"   => "required|max:255",
            "cantidad" => "required",
            "anaquel"  => "required",
            "estado"   => "required"
        ];

        $this->validate($request, $rules);

        $id_estado = $request->input('estado');
        if($request->input('cantidad') == 0) 
            $id_estado = 3;
        elseif($id_estado == 3)
            $id_estado = 1;

        $id = DB::table('piezas')->insertGetId([
            'nombre'      => $request->input('nombre'),
            'modelo'      => $request->input('modelo'),
            'cantidad'    => $request->input('cantidad'),
            'descripcion' => $request->input('descripcion'),
            'anaquel'     => $request->input('anaquel'),
            'id_estado'   => $id_estado,
            'created_at'  => CARBON::now()
        ]);

        if($request->input("foto") != "")
            $img = $this->createFile($id, $request->input("foto"));
        else
            $img = "/box.png";

        DB::table('piezas')->where('id_piezas',$id)->update(['foto' => $img]);

        return redirect()->route('almacen.index');
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
         $rules = [
            "nombre"   => "required|max:255",
            "cantidad" => "required",
            "anaquel"  => "required",
            "estado"   => "required"
        ];


        $this->validate($request, $rules);

        $id_estado = $request->input('estado');
        if($request->input('cantidad') == 0) 
            $id_estado = 3;
        elseif($id_estado == 3)
            $id_estado = 1;
        
        if($request->input("foto") != "/box.png")
        {
            if($request->input("foto") != "/almacenImg/$id.png")
            {
                $img = $this->createFile($id, $request->input("foto"));
                DB::table('piezas')->where('id_piezas',$id)->update([
                    "foto" => $img,
                ]);
            }
        }

        DB::table('piezas')->where('id_piezas',$id)->update([
            'nombre'      => $request->input('nombre'),
            'modelo'      => $request->input('modelo'),
            'cantidad'    => $request->input('cantidad'),
            'descripcion' => $request->input('descripcion'),
            'anaquel'     => $request->input('anaquel'),
            'id_estado'   => $id_estado,
            'updated_at'  => CARBON::now(),
        ]);

        return redirect()->route('almacen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::table('piezas')->where('id_piezas',$id)->delete();

        return redirect()->route('almacen.index');
    }

    public function search(Request $request) {
        $makePages = false;
        $query = $request->pieza_a_consultar;
        $existePieza = DB::table('piezas')
        ->where('nombre', 'LIKE', '%' . $query . '%')
        ->exists();

        if($existePieza) {
            $piezas = DB::table('piezas')
            ->where('nombre', 'LIKE', '%' . $query . '%')->get();
            return view('inventario.index', compact("piezas", 'makePages'));

        }else {
            $piezas = array();
            return view('inventario.index', compact("piezas", 'makePages'));
        }
    }

    public function buscar(){
        return json_encode(DB::table('piezas')->select('nombre','foto')->get());
    }
    
}
