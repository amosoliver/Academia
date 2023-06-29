<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    protected $primaryKey = 'id_dia';

    public function diaHora()
    {
        return $this->hasMany(DiaHora::class, 'id_dia_hora');
    }
    public function selectList()
    {
        $dias = $this->orderBy('ds_dia')
            ->get();
        $arr = [];
        foreach ($dias as $dia) {
            $arr[$dia->id_dia] = $dia->ds_dia;
        }
        return $arr;
    }
}
