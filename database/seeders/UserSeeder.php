<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user=new User() ;
        $user->name='admin';
        $user->email='admin@gmail.com';
        $user->password=bcrypt('12345678');
        $user->assignRole('Admin');//bcrypt encripta la contraseña 
        $user->save();//save con  parentesis
        //
        $user=new User() ;
        $user->name='paciente';
        $user->email='paciente@gmail.com';
        $user->password=bcrypt('12345678');
        $user->assignRole('cliente');//bcrypt encripta la contraseña 
        $user->save();//save con  parentesis
        
        //
        $user=new User() ;
        $user->name='medico';
        $user->email='medico@gmail.com';
        $user->password=bcrypt('12345678');//bcrypt encripta la contraseña 
        $user->assignRole('Medico');
        $user->save();//save con  parentesis
        //save con  parentesis
    }
}
