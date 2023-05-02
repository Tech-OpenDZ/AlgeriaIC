<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiReportsTranslateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bi_reports_translate', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bi_report_id')->unsigned();
            $table->enum('locale', ['en', 'fr', 'ar'])->index();
            $table->string('title');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps(); 

            $table->unique(['bi_report_id','locale']);
            $table->foreign('bi_report_id')->references('id')->on('bussiness_intelligence_reports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bi_reports_translate');
    }
}
