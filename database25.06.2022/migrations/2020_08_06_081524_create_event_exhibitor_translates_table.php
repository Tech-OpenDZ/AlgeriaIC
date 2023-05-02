<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventExhibitorTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_exhibitor_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exhibitor_id'); 
            $table->enum('locale', ['en', 'fr', 'ar'])->index();
            $table->string('name');
            $table->softDeletes();
            $table->timestamps(); 

            $table->unique(['exhibitor_id','locale']);
            $table->foreign('exhibitor_id')->references('id')->on('event_exhibitors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_exhibitor_translates');
    }
}
