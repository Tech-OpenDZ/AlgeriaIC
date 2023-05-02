<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompanyProductImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_product_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_product_id');
            $table->string('image');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('company_product_id')->references('id')->on('company_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_company_product_images');
    }
}
