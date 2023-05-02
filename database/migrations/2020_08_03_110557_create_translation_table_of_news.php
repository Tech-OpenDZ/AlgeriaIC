<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationTableOfNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('news_id');
            $table->enum('locale',['en', 'fr', 'ar'])->index();
            $table->text('title');
            $table->string('source');
            $table->longText('description');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['news_id','locale']);
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_translates');
    }
}
