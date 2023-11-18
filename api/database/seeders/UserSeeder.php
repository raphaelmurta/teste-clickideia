<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::factory()->professor()->create([
            'name' => 'Professor',
            'email' => 'professor@clickideia.com.br'
        ]);

        // Criar um aluno
        User::factory()->aluno()->create([
            'name' => 'Aluno',
            'email' => 'aluno@clickideia.com.br'
        ]);
    }
}
