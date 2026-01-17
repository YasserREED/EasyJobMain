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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->cascadeOnDelete()->constrained();

            $table->unsignedBigInteger('cv_service');
 
            $table->foreign('cv_service')->references('id')->on('cv_services');
        
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');

            $table->string('tran_ref')->unique();
            $table->string('cart_description');
            $table->string('cart_currency');
            $table->string('tran_total');

            $table->string('customer_name');
            $table->string('customer_email');

            $table->string('payment_method');

            $table->string('trace');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
