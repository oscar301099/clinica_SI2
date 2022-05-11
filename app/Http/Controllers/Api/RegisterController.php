<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class RegisterController extends Controller
{
    //
    
    public function store (Request $request ){
        try {
            // run your code here
            $request->validate([
            
                'name'=>'required',
                'email'=>'required|unique:users',
                'password'=>'required',    
            ]);
            $user= User::create($request->all());
            return response($user,200);
        }
        catch (Exception $e) {
            //code to handle the exception
            return response($e,400);
        }
        
    }
}
