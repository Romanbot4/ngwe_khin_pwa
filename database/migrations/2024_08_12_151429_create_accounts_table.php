<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->char('name', 255);
            $table->unsignedBigInteger('banking_provider_id');
            $table->unsignedBigInteger('user_id');
            $table->char('color', 255);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('banking_provider_id')->references('id')->on('banking_providers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
