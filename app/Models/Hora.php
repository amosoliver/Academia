<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hora extends Model
{
    protected $table = 'horas';
    protected $primaryKey = 'id_hora';

    public function diaHora()
    {
        return $this->hasMany(DiaHora::class, 'id_dia_hora');
    }

    public function selectList()
    {
        $horas = $this->orderBy('hora_inicio')->get();
        $arr = [];

        foreach ($horas as $hora) {
            $horaInicio = substr($hora->hora_inicio, 0, 5);
            $horaFim = substr($hora->hora_fim, 0, 5);
            $arr[$hora->id_hora] = $horaInicio . ' às ' . $horaFim;
        }

        return $arr;
    }
}
