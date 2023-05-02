<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessOpportunityZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_opportunity_zones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('business_opportunity_id');
            $table->unsignedInteger('zone_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('business_opportunity_id')->references('id')->on('business_opportunities')->onDelete('cascade');
            $table->foreign('zone_id')->references('id')->on('zones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_opportunity_zones');
    }
}
