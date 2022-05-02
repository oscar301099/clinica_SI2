<?php

namespace App\Http\Controllers;

use App\Models\especialidad;
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
        $medicos = Medico::all();
        $especialidades = especialidad::all();
        return view('medico.index',compact('medicos','especialidades'));
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
        $usuario->assignRole('Medico');
        $usuario->save();

        $especialidades = new especialidad();
        $especialidades->descripcion = $request->input('descripcion');
        $especialidades->id_medico = $medico->id;
        $especialidades->save();


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
        $especialidades=especialidad::where('id_medico',$medico->id);
        $especialidades->delete();
        $medico->delete();
      //  $user = User::where('id', $medico->id);
     //   $user->delete();

        return redirect()->route('medico.index');
    }
    public function especialidad($id)
    {
        $medico= Medico::findOrFail($id);
        return view('medico.especialidad',compact('medico'));
    }
    public function esp_store(Request $request)
    {
       $especialidades = new Especialidad();
       $especialidades->descripcion = $request->input('descripcion');
       $especialidades->id_medico = $request->input('id_medico');
       $especialidades->save();
       return redirect()->route('medico.index');
    }
}
