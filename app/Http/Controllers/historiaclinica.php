<?php

namespace App\Http\Controllers;
use App\Models\Medico;
use App\Models\User;
use App\Models\historialclinico;
use Illuminate\Http\Request;

class historiaclinica extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $historiaclinicas= historialclinico::all();
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
        //
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
    public function update(Request $request, $id)
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
        return redirect()->route('historiaclinica.index');
    }
}
