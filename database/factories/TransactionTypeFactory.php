<?php

namespace Database\Factories;

use App\Models\TransactionCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionType>
 */
class TransactionTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_category_id' => TransactionCategory::factory(),
            'icon' => $this->faker->imageUrl(),
            'color' => $this->faker->hexColor(),
        ];
    }
}
