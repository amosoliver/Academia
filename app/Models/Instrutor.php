<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Instrutor extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_instrutor';

    public function selectList()
    {
        $instrutores = $this->orderBy('nome')
            ->get();
        $arr = [];
        foreach ($instrutores as $instrutor) {
            $arr[$instrutor->id_instrutor] = $instrutor->nome;
        }
        return $arr;
    }
}
