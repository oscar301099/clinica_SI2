<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\User;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medico = Medico::all();
        return view('medico.index',['medico'=>$medico]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('medico.create');
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
        $request->validate([
            'nombre' => 'required'
        ]);
        $medico=new Medico();
        $medico->nombre=$request->input('nombre');
        $medico->email=$request->input('email');
        $medico->celular=$request->input('celular'); 
        $medico->password = bcrypt($request->input('password') );

        $medico->save();
        $usuario = new User();
        $usuario->name =$medico->nombre;
        $usuario->email = $medico->email;
        $usuario->password = bcrypt($request->input('password') );
        $usuario->save();
        return redirect()->route('medico.index');
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
        $medico=Medico::findOrFail($id);
        $usuario=User::findOrFail($id);
        return view('medico.edit',['medico'=>$medico]);
       
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
        
        
        $medico=Medico::findOrFail($id);
        $usuario=User::findOrFail($id);
        $medico->nombre=$request->input('nombre');
        $medico->email=$request->input('email');
        $medico->celular=$request->input('celular');
        
        $medico->save();
        
        return redirect()->route('medico.index');

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
        $medico=Medico::findOrFail($id);
        $medico->delete();
        return redirect()->route('medico.index');
    }
}
