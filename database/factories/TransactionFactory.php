<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\TransactionType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'note' => $this->faker->sentence,
            'transaction_types_id' => TransactionType::factory(),
            'account_id' => Account::factory(),
        ];
    }
}
