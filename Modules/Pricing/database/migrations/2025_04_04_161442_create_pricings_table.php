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
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->float('price');
            $table->integer('serial')->nullable();
            $table->enum('expiration', ['monthly', 'yearly'])->default('monthly');
            $table->text('btn_url')->nullable();
            $table->boolean('is_popular')->default(0);
            $table->boolean('show_on_home')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricings');
    }
};
