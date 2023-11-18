<?php

namespace Database\Factories;

use App\Enums\UserRoleEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // senha padrão para teste
            'remember_token' => Str::random(10),
        ];
    }

    public function professor()
    {
        return $this->state([
            'role' => UserRoleEnum::Professor->value,
        ]);
    }

    public function aluno()
    {
        return $this->state([
            'role' => UserRoleEnum::Aluno->value,
        ]);
    }
}
