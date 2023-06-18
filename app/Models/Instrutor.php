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

    protected $fillable = [
        'id_instrutor',
        'nome'
    ];

    public function selectList($id_instrutor)
    {
        $instrutores = $this->orderBy('nome')
            ->where('id_instrutor', $id_instrutor)
            ->get();

        $arr = [];
        foreach ($instrutores as $instrutor) {
            $arr[$instrutor->id_instrutor] = $instrutor->nome;
        }
        return $arr;
    }
}
