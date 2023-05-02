<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsSourceTranslateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_sources', function (Blueprint $table) {
            $table->dropColumn('title');
        });

        Schema::create('news_source_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('news_source_id');
            $table->string('title',255);
            $table->enum('locale', ['en', 'fr', 'ar'])->index();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['news_source_id','locale']);
            $table->foreign('news_source_id')->references('id')->on('news_sources')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_source_translates');
    }
}
