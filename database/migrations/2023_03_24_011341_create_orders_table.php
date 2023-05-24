'<?php

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
            $table->integer('userid');
            $table->string('fullname');
            $table->string('shipping_phoneNumber');
            $table->string('shipping_city');
            $table->string('shipping_postalcode');
            $table->string('shipping_streetinfo');
            $table->integer('product_id');
            $table->string('email');
            $table->string('product_name');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->string('status');
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
