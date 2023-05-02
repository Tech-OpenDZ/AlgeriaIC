<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTranslates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('business_id');
            $table->enum('locale', ['en', 'fr', 'ar'])->index();
            $table->string('title');
            $table->string('place'); 
            $table->softDeletes();
            $table->timestamps(); 

            $table->unique(['business_id','locale']);
            $table->foreign('business_id')->references('id')->on('business_meetings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_translates');
    }
}
