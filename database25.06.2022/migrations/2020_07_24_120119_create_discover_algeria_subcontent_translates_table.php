<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscoverAlgeriaSubcontentTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discover_algeria_subcontent_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subcontent_id');
            $table->enum('locale', ['en', 'fr', 'ar'])->index();
            $table->string('sub_content_title');
            $table->longText('sub_content_description');
            $table->softDeletes();
            $table->timestamps(); 
            $table->unique(['subcontent_id','locale'],'subcontent_id_locale_unique_key');
            $table->foreign('subcontent_id')->references('id')->on('discover_algeria_subcontents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discover_algeria_subcontent_translates');
    }
}
