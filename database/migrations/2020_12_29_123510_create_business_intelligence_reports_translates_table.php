<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessIntelligenceReportsTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_intelligence_reports_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('report_id');
            $table->enum('locale',['en', 'fr', 'ar'])->index();
            $table->longText('title');
            $table->longText('period');
            $table->longText('description');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['report_id','locale']);
            $table->foreign('report_id')->references('id')->on('business_intelligence_reports')->onDelete('cascade');
  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_intelligence_reports_translates');
    }
}
