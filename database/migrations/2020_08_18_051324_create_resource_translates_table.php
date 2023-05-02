<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource_id');
            $table->enum('locale', ['en', 'fr', 'ar'])->index();
            $table->string('title'); 
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->softDeletes();
            $table->timestamps(); 

            $table->unique(['resource_id','locale']);
            $table->foreign('resource_id')->references('id')->on('resources')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_translates');
    }
}
