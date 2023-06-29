<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            ['ds_status' => 'Marcada'],
            ['ds_status' => 'Desmarcada'],
            ['ds_status' => 'Reagendada'],
            ['ds_status' => 'Cancelada'],
            ['ds_status' => 'Adiada']
        ];

        Status::insert($status);
    }
}
