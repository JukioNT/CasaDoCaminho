<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estado_civils')->insert([
            ['estado_civil' => 'Solteiro(a)'],
            ['estado_civil' => 'Casado(a)'],
            ['estado_civil' => 'Divorciado(a)'],
            ['estado_civil' => 'Viúvo(a)'],
            ['estado_civil' => 'Separado Judicialmente']
        ]);
    }
}
