<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id'); 
            $table->string('transaction_id'); 
            $table->string('module_type');
            $table->double('price');
            $table->string('currency');
            $table->string('payment_mode');
            $table->string('payment_type');
            $table->string('status'); 
            $table->longText('note');
            $table->softDeletes();
            $table->timestamps(); 
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_transactions');
    }
}
