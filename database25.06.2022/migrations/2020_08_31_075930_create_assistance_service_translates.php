<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssistanceServiceTranslates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistance_service_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assistance_id')->unsigned();
            $table->enum('locale', ['en', 'fr', 'ar'])->index();
            $table->string('title');
            $table->longText('description');
            $table->softDeletes(); 
            $table->unique(['assistance_id','locale']);
            $table->foreign('assistance_id')->references('id')->on('assistance_services')->onDelete('cascade');
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
        Schema::dropIfExists('assistance_service_translates');
    }
}
