<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ad_id')->unique();
            $table->string('title');
            $table->string('location');
            $table->string('ad');
            $table->integer('publication_order')->default(0);
            $table->string('advertisement_type');
            $table->string('formula_type')->nullable();
            $table->string('for_keyword')->nullable();
            $table->text('keywords')->nullable();
            $table->text('sponsorised_link')->nullable();
            $table->string('calculation_by')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('number_of_display')->default(0);
            $table->integer('number_of_clicks')->default(0);
            $table->integer('actual_number_of_displays')->default(0);
            $table->integer('actual_number_of_clicks')->default(0);
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->tinyInteger('status');
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('advertisements');
    }
}
