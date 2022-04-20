<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $role1= Role::create(['name'=>'Admin']);
       $role2= Role::create(['name'=>'cliente']);
       $role3= Role::create(['name'=>'Medico']);
       permission::create(['name'=>'GestionarPerfil'])->syncRoles([$role1]) ; //en el name poner el nombre del permiso
    }
}
