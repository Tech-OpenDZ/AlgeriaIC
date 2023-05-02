<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_zones', function (Blueprint $table) { 
            $table->increments('id');
            $table->unsignedInteger('event_id');
            $table->unsignedInteger('zone_id');
            $table->softDeletes();
            $table->timestamps(); 
           
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_zones');
    }
}
