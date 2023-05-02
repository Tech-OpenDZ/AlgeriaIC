<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by'); 
            $table->string('event_logo');
            $table->date('start_date');
            $table->date('end_date');
            $table->tinyInteger('is_featured');
            $table->double('price_per_square_meter');
            $table->string('organizer_contact');
            $table->bigInteger('organizer_telephone')->nullable();
            $table->bigInteger('organizer_mobile')->nullable();
            $table->bigInteger('organizer_fax')->nullable(); 
            $table->string('organizer_email');
            $table->string('organizer_website')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
