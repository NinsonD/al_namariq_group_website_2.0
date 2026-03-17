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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id')->default(0);
            $table->string('coupon_code')->unique();
            $table->decimal('min_price', 8, 2)->default(0);
            $table->decimal('discount', 8, 2)->default(0);
            $table->enum('discount_type', ['percentage', 'amount'])->default('percentage');
            $table->unsignedInteger('per_user_limit')->default(1);
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status')->default(true);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
