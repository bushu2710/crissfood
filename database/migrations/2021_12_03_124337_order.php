<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('product_ids');
            $table->foreignId('shipping_id');
            $table->foreignId('billing_id');
            $table->float('price');
            $table->json('per_product_qty');
            $table->integer('total_items');
            $table->varchar('contact');
            $table->string('payment_mode');
            $table->string('delivery_mode');
            $table->foreignId('vendor_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
