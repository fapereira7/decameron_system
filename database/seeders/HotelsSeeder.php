<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('hotels')->insert([
                'nombre' => 'Hotel ' . $i,
                'direccion' => 'Dirección ' . $i,
                'ciudad' => 'Ciudad ' . $i,
                'nit' => 'NIT-' . $i,
                'numero_habitaciones' => rand(50, 200),
                'estado' => 'Activo'
            ]);
        }
    }
}
