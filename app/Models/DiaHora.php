<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaHora extends Model
{
    protected $table = 'dias_horas';
    protected $primaryKey = 'id_dia_hora';

    public function dia()
    {
        return $this->belongsTo(Dia::class, 'id_dia');
    }

    public function hora()
    {
        return $this->belongsTo(Hora::class, 'id_hora');
    }

    public function selectList()
    {
        $diaHora = $this->join('dias', 'dias.id_dia', '=', 'dias_horas.id_dia')->
        join('horas', 'horas.id_hora', '=', 'dias_horas.id_hora')->get();
        $arr = [];
        foreach ($diaHora as $diaH) {
            $dia = $diaH->ds_dia;
            $horaInicio = substr($diaH->hora_inicio, 0, 5);
            $horaFim = substr($diaH->hora_fim, 0, 5);
            $arr[$diaH->id_dia_hora] = $dia . ' das ' . $horaInicio . ' às ' . $horaFim;
        }
        return $arr;
    }
}
