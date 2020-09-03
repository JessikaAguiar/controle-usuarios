<?php

use Illuminate\Database\Seeder;
use App\Perfil;

class PerfilsTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $perfils = [
            'admin',
            'professor',
            'diretor'
        ];
        foreach($perfils as $perfil)
        {
            Perfil::create([
                "nome" => $perfil
            ]);
        }
        
    }
}