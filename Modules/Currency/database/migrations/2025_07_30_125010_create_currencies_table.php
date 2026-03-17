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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code');
            $table->string('symbol');
            $table->float('exchange_rate')->default(1);
            $table->boolean('is_default')->default(false);
            $table->boolean('status')->default(true);
            $table->enum('symbol_position', ['before_price', 'after_price', 'before_price_space', 'after_price_space'])->default('before_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
