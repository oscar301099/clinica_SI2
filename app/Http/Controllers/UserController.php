<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // dd(json_decode(json_encode(Auth::user()->id)));
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'error' => 'Por favor verifique sus credenciales!!',
        ]);
    }
    public function index()
    {
        //
        $users = User::all();
        // return $users;
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $mecanicos = DB::table('mecanicos')->whereNull('user_id')->get();
        $roles = Role::all();
        return view('users.create', compact('roles'));
        // return view('users.create', compact('mecanicos', 'roles'));
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
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
            'roles'=>'required',
            
        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt(($request->password));
        $usuario->save();

        $usuario->roles()->sync($request->roles);
        
        
            return view('users.index');
            
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
        $user = User::find($id);
        return view('users.show', compact('user'));
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
        $user = User::find($id);
        // $empleados = DB::table('empleados')->whereNull('user_id')->get();
        //empleado que tiene el $user->id
        // $e = DB::table('empleados')->where('user_id', $user->id)->count();

        // $empleado = DB::table('empleados')->where('user_id', $user->id)->first();
        $roles = Role::all();
        $rol = DB::table('model_has_roles')->where('model_id', $user->id)->first();
        $rol_name = DB::table('roles')->where('id', $rol->role_id)->first();
        return view('users.edit', compact('user', 'roles', 'rol', 'rol_name'));

        return view('users.edit', compact('user', 'empleados', 'roles', 'rol', 'rol_name', 'empleado', 'e'));
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'name'=> "unique:users,name,$user->id",
            'roles'=>'required',
            // 'empleados'=> 'required',
        ]);

        $usuario = User::find($user->id);
        if($usuario->name <> $request->name){
            $usuario->name = $request->name;
        }
        if($request->password <> ''){
            $usuario->password = bcrypt(($request->password));
        }
        $usuario->save();
        $usuario->roles()->sync($request->roles);

        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        User::destroy($user->id);
        
        return redirect('users');
    }
}
