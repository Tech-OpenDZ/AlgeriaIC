<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('event_id');
            $table->enum('locale', ['en', 'fr', 'ar'])->index();
            $table->string('title'); 
            $table->longText('description'); 
            $table->string('place'); 
            $table->string('source'); 
            $table->string('event_type')->nullable();
            $table->string('event_edition')->nullable();
            $table->longText('event_summary')->nullable();
            $table->string('organizer_agency'); 
            $table->longText('organizer_address');
            $table->softDeletes();
            $table->timestamps(); 

            $table->unique(['event_id','locale']);
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_translates');
    }
}
