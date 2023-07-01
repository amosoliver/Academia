<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'id_status';

    public function selectList()
    {
        $status = $this->orderBy('ds_status')
            ->get();

        $arr = [];
        foreach ($status as $status) {
            $arr[$status->id_status] = $status->ds_status;
        }
        return $arr;
    }
}
