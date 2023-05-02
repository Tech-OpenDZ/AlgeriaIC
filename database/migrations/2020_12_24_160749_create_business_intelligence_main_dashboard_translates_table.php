<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessIntelligenceMainDashboardTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bi_main_dashboard_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dashboard_id');
            $table->enum('locale',['en', 'fr', 'ar'])->index();
            $table->longText('description');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['dashboard_id','locale']);
            $table->foreign('dashboard_id')->references('id')->on('business_intelligence_main_dashboard')->onDelete('cascade');
  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_intelligence_main_dashboard_translates');
    }
}
