<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessIntelligenceTranslates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_intelligence_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('b_intelligence_id');
            $table->enum('locale', ['en', 'fr', 'ar'])->index();
            $table->string('title');
            $table->longText('description'); 
            $table->softDeletes();
            $table->timestamps(); 

            $table->unique(['b_intelligence_id','locale']);
            $table->foreign('b_intelligence_id')->references('id')->on('business_intelligences')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_intelligence_translates');
    }
}
