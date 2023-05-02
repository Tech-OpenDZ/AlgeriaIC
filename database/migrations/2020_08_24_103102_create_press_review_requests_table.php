<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePressReviewRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('press_review_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->string('keyword')->nullable();
            $table->text('sector_id')->nullable();
            $table->text('zone_id')->nullable();
            $table->text('source')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('press_review_requests');
    }
}
