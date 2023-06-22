<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Aluno extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_aluno';

    public function selectList($id_aluno)
    {
        $alunos = $this->orderBy('nome')
            ->where('id_aluno', $id_aluno)
            ->get();

        $arr = [];
        foreach ($alunos as $aluno) {
            $arr[$aluno->id_aluno] = $aluno->nome;
        }
        return $arr;
    }
}
