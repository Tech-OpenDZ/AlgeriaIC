<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTranslate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_translate', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('contact_id')->nullable();
            $table->enum('locale', ['en', 'fr', 'ar'])->index();
            $table->string('name'); 
            $table->text('jobtitle');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['contact_id','locale']);
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_translate');
    }
}
