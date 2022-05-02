<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Medico;
use App\Models\User;
use App\Models\file;
use App\Models\historialclinico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class historiaclinica extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //x
        // dd(json_decode(json_encode($files)));
        $historiaclinicas= historialclinico::join('files', 'files.id_historialclinico', 'historialclinico.id')
        ->select('historialclinico.*', 'files.name as nombre')   
        ->where('Id_cliente',Auth::user()->id)->orWhere('Id_medico',Auth::user()->id)->get();
        // dd(json_decode(json_encode($historiaclinicas)));
        // $historiaclinicas->map(function ($item, $key) {
        //     // dd(json_decode(json_encode($item)));
        //     $path=explode('files/',$item->nombre);
        //     $path=$path[1];
        //     $item->nombre =$path;
        //     return $item;
        // });
        // dd(json_decode(json_encode($historiaclinicas)));
        return view('historialclinica.index',compact('historiaclinicas'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('historialclinica.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $historiaclinica=new historialclinico();
        $historiaclinica->actividad=$request->input('actividad');
        $historiaclinica->alergias=$request->input('alergias');
        $historiaclinica->Fecha_ingreso=$request->input('Fecha_ingreso'); 
        $historiaclinica->Fecha_salida=$request->input('Fecha_salida'); 
        $historiaclinica->enfermedad=$request->input('enfermedad'); 
        $historiaclinica->medicamentos=$request->input('medicamentos'); 
        $historiaclinica->Id_cliente=$request->input('Id_cliente');
        $historiaclinica->Id_medico=$request->input('Id_medico'); 
        $historiaclinica->save();
        $bitacora=new Bitacora();
        $bitacora->ID_User=Auth::user()->id;
        $bitacora->Accion=('creo historia');
        $bitacora->save();

        $path = Storage::disk('s3')->put('files', $request->file('files'),'public');
        
        File::create([
                'name'=>$path,
              'id_historialclinico'=> $historiaclinica->id
        ]);
        return redirect()->route('historiaclinica.index');
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
       
        $historiaclinica=historialclinico::findOrFail($id);
      
        $bitacora=new Bitacora();
        $bitacora->ID_User=Auth::user()->id;
        $bitacora->Accion=('edito historial');
        $bitacora->save();
        return view('historialclinica.edit',['historiaclinica'=>$historiaclinica]);
      //  $historiaclinica=historiaclinica::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id,Request $request)
    {
        //
        $historiaclinica=historialclinico::findOrFail($id);
        $historiaclinica->actividad=$request->input('actividad');
        $historiaclinica->alergias=$request->input('alergias');
        $historiaclinica->Fecha_ingreso=$request->input('Fecha_ingreso'); 
        $historiaclinica->Fecha_salida=$request->input('Fecha_salida'); 
        $historiaclinica->enfermedad=$request->input('enfermedad'); 
        $historiaclinica->medicamentos=$request->input('medicamentos'); 
        $historiaclinica->Id_cliente=$request->input('Id_cliente');
        $historiaclinica->Id_medico=$request->input('Id_medico'); 
        $historiaclinica->save();
        $bitacora=new Bitacora();
        $bitacora->ID_User=Auth::user()->id;
        $bitacora->Accion=('actualizo historial');
        $bitacora->save();
        return redirect()->route('historiaclinica.index');
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
        $historiaclinica=historialclinico::findOrFail($id);
        $historiaclinica->delete();
        $bitacora=new Bitacora();
        $bitacora->ID_User=Auth::user()->id;
        $bitacora->Accion=('elimino historial');
        $bitacora->save();
        return redirect()->route('historiaclinica.index');
    }
}
