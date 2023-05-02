<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOurServiceTranslates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_service_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id')->unsigned();
            $table->enum('locale', ['en', 'fr', 'ar'])->index();
            $table->string('services_title');
            $table->longText('services_description');
            $table->string('i2b_title');
            $table->longText('i2b_description');
            $table->string('subscription_title');
            $table->longText('subscription_description');
            $table->string('online_services_title');
            $table->longText('online_services_description');
            $table->string('advertisement_title');
            $table->longText('advertisement_description');
            $table->string('files');
            $table->softDeletes(); 
            $table->unique(['service_id','locale']);
            $table->foreign('service_id')->references('id')->on('our_services')->onDelete('cascade');
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
        Schema::dropIfExists('our_service_translates');
    }
}
