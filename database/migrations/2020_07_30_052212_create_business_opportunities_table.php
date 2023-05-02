<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_opportunities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_email');
            $table->string('company_contact');
            $table->string('logo');
            $table->string('company_presentation_file');
            $table->string('image');
            $table->string('display_order')->nullable();
            $table->tinyInteger('activated')->default(0);
            $table->unsignedInteger('sector_id');
            $table->unsignedInteger('zone_id'); 
            $table->unsignedInteger('created_by'); 
            $table->unsignedInteger('updated_by'); 
            $table->integer('reference_no_of_opportunity'); 
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_opportunities');
    }
}
