<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_translates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('banner_image_id')->unsigned();
            $table->enum('locale', ['en', 'fr', 'ar'])->index();
            $table->longText('header_text')->nullable();
            $table->longText('content')->nullable();
            $table->softDeletes(); 
            $table->unique(['banner_image_id','locale']);
            $table->foreign('banner_image_id')->references('id')->on('banner_images')->onDelete('cascade');
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
        Schema::dropIfExists('banner_translates');
    }
}
