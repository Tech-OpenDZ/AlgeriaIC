<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsPageTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_page_translates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('cms_page_id');
            $table->enum('locale',['en', 'fr', 'ar'])->index();
            $table->string('title');
            $table->longText('content');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['cms_page_id','locale']);
            $table->foreign('cms_page_id')->references('id')->on('cms_pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_page_translates');
    }
}
