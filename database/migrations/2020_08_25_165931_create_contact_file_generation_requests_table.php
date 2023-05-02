<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactFileGenerationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_file_generation_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->string('turnover_from')->nullable();
            $table->string('turnover_to')->nullable();
            $table->string('capital_from')->nullable();
            $table->string('capital_to')->nullable();
            $table->text('sector_id')->nullable();
            $table->text('zone_id')->nullable();
            $table->text('creation_date_from')->nullable();
            $table->text('creation_date_to')->nullable();
            $table->text('number_of_employees_from')->nullable();
            $table->text('number_of_employees_to')->nullable();
            
            $table->string('file_path')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('status')->default('pending');
            $table->string('token')->nullable();

            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_file_generation_requests');
    }
}
