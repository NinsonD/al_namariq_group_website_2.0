<?php

use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('order_no');

            $table->double('subtotal_default')->default(0);
            $table->double('tax_default')->default(0);
            $table->double('discount_default')->default(0);
            $table->double('shipping_charge_default')->default(0);
            $table->double('amount_default')->default(0);

            $table->string('subtotal')->default(0);
            $table->string('tax')->default(0);
            $table->string('discount')->default(0);
            $table->string('shipping_charge')->default(0);
            $table->string('paid_amount');

            $table->string('gateway_charge')->nullable();
            $table->string('payable_with_charge')->nullable();
            $table->string('paid_currency')->nullable();

            $table->string('payment_method');
            $table->string('transaction_id')->nullable();
            $table->enum('payment_status', ['pending', 'success', 'rejected','refund'])->default('pending');
            $table->enum('order_status', ['draft', 'pending', 'processing', 'success','refund','rejected'])->default('pending');
            $table->json('payment_details')->nullable();
            $table->longText('order_note')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
