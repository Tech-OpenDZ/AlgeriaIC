<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlgeriaBusinessNetworkTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('algeria_business_network_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('network_id');
            $table->enum('locale',['en', 'fr', 'ar'])->index();
            $table->longText('description');
            $table->softDeletes();
            $table->timestamps();
            $table->unique(['network_id','locale']);
            $table->foreign('network_id')->references('id')->on('algeria_business_network')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('algeria_business_network_translates');
    }
}
