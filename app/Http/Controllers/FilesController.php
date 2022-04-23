<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request)
    {
       $maxsize=(int )ini_get('upload_max_filesize')*10240;
       $files=$request->file('files');
       dd($files);
       $ID_User=Auth::id();
       foreach($files as $file){
        File::create([
            'name'=>$file->getClientOriginalName(),
            'ID_User'=>$ID_User
        ]);
       }
       return "subido";
     
    
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
