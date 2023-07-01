<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Aluno;


class AlunosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Use Faker to generate fake data
        $faker = Faker::create();

        // Create 5 fake student records
        for ($i = 0; $i < 5; $i++) {
            Aluno::create([
                'nome' => $faker->name,
                'cpf' => $faker->unique()->numerify('###########'), // 11-digit unique CPF
                'email' => $faker->unique()->email,
                'dt_nascimento' => $faker->date('Y-m-d', '-18 years'), // Random birth date within the last 18 years
                'id_instrutor' => rand(1,2), // Assuming 'id_instrutor' can be any random value between 1 and 10
            ]);
        }
    }
}
