<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hora;

class HorasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $horaInicio = strtotime('8:00');
        $horaFim = strtotime('18:00');

        while ($horaInicio < $horaFim) {
            $proximaHora = date('H:i', strtotime('+1 hour', $horaInicio));

            Hora::create([
                'hora_inicio' => date('H:i', $horaInicio),
                'hora_fim' => $proximaHora,
            ]);

            $horaInicio = strtotime('+1 hour', $horaInicio);
        }
    }
}
