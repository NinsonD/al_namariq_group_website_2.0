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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(0);
            $table->unsignedBigInteger('blog_category_id')->nullable()->default(null);
            $table->string('slug')->unique();
            $table->string('image')->nullable()->default(null);
            $table->bigInteger('views')->default(0);
            $table->boolean('show_homepage')->default(false);
            $table->boolean('is_popular')->default(false);
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
        Schema::dropIfExists('blogs');
    }
};
