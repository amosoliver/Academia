<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diasSemana = [
            'Segunda-feira',
            'Terça-feira',
            'Quarta-feira',
            'Quinta-feira',
            'Sexta-feira'
        ];

        foreach ($diasSemana as $dia) {
            DB::table('dias')->insert([
                'ds_dia' => $dia,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
