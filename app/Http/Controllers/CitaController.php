<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cita = Cita::all();
        return view('cita.index',compact('cita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cita=new Cita();
        $cita->Fecha_cita=$request->input('Fecha_cita');
        $cita->Hora_cita=$request->input('Hora_cita');
        $cita->Id_cliente=$request->input('Id_cliente'); 
        $cita->Id_medico=$request->input('Id_medico'); 
        $cita->save();
        return redirect()->route('cita.index');
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
        $cita=Cita::findOrFail($id);
        return view('cita.edit',['cita'=>$cita]);
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
        $cita=Cita::findOrFail($id);
        $cita->Fecha_cita=$request->input('Fecha_cita');
        $cita->Hora_cita=$request->input('Hora_cita');
        $cita->Id_cliente=$request->input('Id_cliente');
        $cita->Id_medico=$request->input('Id_medico'); 
        $cita->save();
        return redirect()->route('cita.index');
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
        $cita=Cita::findOrFail($id);
        $cita->delete();
        return redirect()->route('cita.index');
    }
}
