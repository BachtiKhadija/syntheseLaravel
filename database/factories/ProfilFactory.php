<?php

namespace Database\Factories;

use App\Models\Profil;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends Factory<Profil>
 */
class ProfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::factory(),
            'avatar' => fake()->imageUrl(),
            'telephone' => fake()->phoneNumber(),
            'bio' => fake()->sentence(),
            'adresse' => fake()->address(),
        ];
    }
}
