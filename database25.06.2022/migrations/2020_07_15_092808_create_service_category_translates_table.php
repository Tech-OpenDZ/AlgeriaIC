<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceCategoryTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_category_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->enum('locale',['en', 'fr', 'ar'])->index();
            $table->string('name');
            $table->longText('description');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['category_id','locale']);
            $table->foreign('category_id')->references('id')->on('service_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_category_translates');
    }
}
