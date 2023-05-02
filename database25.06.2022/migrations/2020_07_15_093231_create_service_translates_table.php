<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_id');
            $table->enum('locale',['en', 'fr', 'ar'])->index();
            $table->string('name');
            $table->longText('description');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['service_id','locale']);
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_translates');
    }
}
