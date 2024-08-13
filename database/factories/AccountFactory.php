<?php

namespace Database\Factories;

use App\Models\BankingProvider;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'banking_provider_id' =>  BankingProvider::factory(),
            'user_id' => User::factory(),
            'color' => $this->faker->hexColor(),
        ];
    }
}
