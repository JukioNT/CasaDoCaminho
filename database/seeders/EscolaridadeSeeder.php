<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscolaridadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('escolaridades')->insert([
            ['escolaridade' => 'Ensino Fundamental Incompleto'],
            ['escolaridade' => 'Ensino Fundamental Completo'],
            ['escolaridade' => 'Ensino Médio Incompleto'],
            ['escolaridade' => 'Ensino Médio Completo'],
            ['escolaridade' => 'Ensino Superior Incompleto'],
            ['escolaridade' => 'Ensino Superior Completo']
        ]);
    }
}
