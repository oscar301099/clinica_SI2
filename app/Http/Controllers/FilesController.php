<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Bitacora ;
use App\Models\User;



class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        $files=File::all();
        return view('subir.index',compact('files'));
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
    public function store(Request $request,$id )
    {
        
    $path = $request->file('files')->store('public');
    //$fileName = "miarchivo.pdf";  
    //dd($path);
    //$url = Storage::url($path);
    //dd($path);
    $s=explode("/", $path);
    
    $s[1];
    //dd($s);

     File::create([
            'name'=>$s[1],
           'ID_User'=> Auth::user()->id
     ]);
     $bitacora=new Bitacora();
     $usuario=User::findOrFail($id);
     $bitacora->ID_User=$usuario->id;
     $bitacora->Accion=('subio archivos');
       
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
        dd('Upload');
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
    public function subirArchivo(Request $request)
 {
        //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
        $request->file('archivo')->store('public');
        dd("subido y guardado");
        
 }

    
  
}
