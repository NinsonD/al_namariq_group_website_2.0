<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Shop\Models\ProductCategory;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(ProductCategory::class)->constrained();
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->integer('qty')->nullable()->default(0);
            $table->decimal('price')->default(0);
            $table->decimal('sale_price')->nullable();
            $table->string('sku')->nullable()->unique();
            $table->boolean('is_new')->default(false);
            $table->boolean('is_popular')->default(false);
            $table->bigInteger('views')->default(0);
            $table->json('tags')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
