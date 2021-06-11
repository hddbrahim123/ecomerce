<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('order_number');
            $table->float('total_price');
            $table->integer('total_item');
            $table->boolean('is_paid')->default(false);
            $table->enum('payement_method',['paypal','card']);
            $table->enum('status',['pending','processing','completed','decline'])->default('pending');

            $table->string('shipping_fullName');
            $table->string('shipping_email');
            $table->string('shipping_address');
            $table->string('shipping_city');
            $table->string('shipping_state');
            $table->string('shipping_zipcode');
            
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
        Schema::dropIfExists('orders');
    }
}
