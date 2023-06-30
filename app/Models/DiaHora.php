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
        $horas = $this->join('dias', 'diashoras.id_dia', '=', 'dias.id_dia')->
        join('horas', 'diashoras.id_hora', '=', 'horas.id_hora')->get();
        $arr = [];


    }




}
