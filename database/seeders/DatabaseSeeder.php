<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\BankingProvider;
use App\Models\Transaction;
use App\Models\TransactionCategory;
use App\Models\TransactionType;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 Users
        User::factory()->count(10)->create()->each(function ($user) {
            // Each User has 2-3 Accounts
            $accounts = Account::factory()->count(rand(2, 3))->create([
                'user_id' => $user->id,
            ]);

            // Each Account has 5-10 Transactions
            $accounts->each(function ($account) use ($user) {
                Transaction::factory()->count(rand(5, 10))->create([
                    'user_id' => $user->id,
                    'account_id' => $account->id,
                ]);
            });
        });

        // Create 5 Banking Providers
        BankingProvider::factory()->count(5)->create();

        // Create 5 Transaction Categories and their types
        TransactionCategory::factory()->count(5)->create()->each(function ($category) {
            TransactionType::factory()->count(3)->create([
                'transaction_category_id' => $category->id,
            ]);
        });
    }
}
