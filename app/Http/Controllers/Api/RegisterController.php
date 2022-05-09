<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function store (Request $request ){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed',
            'roles'=>'required',
            
        ]);
        $user= User::create($request->all());
        return response($user,200);
    }
}
