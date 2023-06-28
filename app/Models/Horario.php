<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $primaryKey = 'id_horario';

    public function diaHora()
    {
        return $this->hasMany(DiaHora::class, 'id_dia_hora');
    }

    public function selectList()
{
    $diaHoras = $this->orderBy('hora_inicio')->get(['hora_inicio', 'hora_fim']);
    $arr = [];

    foreach ($diaHoras as $diaHora) {
        $arr[$diaHora->id_dia] = [
            'hora_inicio' => $diaHora->hora_inicio,
            'hora_fim' => $diaHora->hora_fim
        ];
    }

    return $arr;
}

}
