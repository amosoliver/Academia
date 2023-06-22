<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Pacote extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pacote';

    public function selectList()
    {
        $pacotes = $this->orderBy('ds_pacote')
            ->get();
        $arr = [];
        foreach ($pacotes as $pacote) {
            $arr[$pacote->id_pacote] = $pacote->ds_pacote;
        }
        return $arr;
    }
}
