<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessOpportunityTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_opportunity_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_opportunity_id')->unsigned();
            $table->enum('locale', ['en', 'fr', 'ar'])->index();
            $table->string('project_title');
            $table->string('company_name');
            $table->string('company_presentation_text');
            $table->string('project_description');
            $table->string('contact_person');
            $table->softDeletes();
            $table->timestamps(); 
            $table->unique(['business_opportunity_id','locale'], 'business_opportunity_id');
            $table->foreign('business_opportunity_id')->references('id')->on('business_opportunities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_opportunity_translates');
    }
}
