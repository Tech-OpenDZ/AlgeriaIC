<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiSubDashboardTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bi_sub_dashboard_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dashboard_id');
            $table->enum('locale',['en', 'fr', 'ar'])->index();
            $table->longText('description');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['dashboard_id','locale']);
            $table->foreign('dashboard_id')->references('id')->on('bi_sub_dashboard')->onDelete('cascade');
  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bi_sub_dashboard_translates');
    }
}
