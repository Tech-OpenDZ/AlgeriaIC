<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sector_id')->unsigned();
            $table->enum('locale', ['en', 'fr', 'ar'])->index();
            $table->string('name');
            $table->softDeletes();
            $table->timestamps(); 
            $table->unique(['sector_id','locale']);
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sector_translates');
    }
}
