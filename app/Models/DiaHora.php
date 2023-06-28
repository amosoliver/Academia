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

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario');
    }
}
