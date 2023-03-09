<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = ['Estándar', 'Junior', 'Suite'];
        $acomodaciones = [
            'Estándar' => ['Sencilla', 'Doble'],
            'Junior' => ['Triple', 'Cuádruple'],
            'Suite' => ['Sencilla', 'Doble', 'Triple']
        ];
        
        for ($i = 1; $i <= 10; $i++) {
            $tipo = $tipos[rand(0, 2)];
            $acomodacion = $acomodaciones[$tipo][rand(0, count($acomodaciones[$tipo])-1)];
            $hotel_id = rand(1, 10);
            
            DB::table('rooms')->insert([
                'tipo' => $tipo,
                'acomodacion' => $acomodacion,
                'hotel_id' => $hotel_id,
                'estado' =>  'Activo'
            ]);
        }
    }
}
