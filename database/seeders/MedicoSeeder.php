<?php

namespace Database\Seeders;

use App\Models\Medico;
use Illuminate\Database\Seeder;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $medico=new Medico() ;
        $medico->name='medico';
        $medico->email='medico@gmail.com';
        $medico->password=bcrypt('12345678');
        $medico->save();//save con  parentesis
    }
}
