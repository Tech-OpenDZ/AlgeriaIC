<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TenderTranslates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tender_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tender_id')->unsigned();
            $table->enum('locale', ['en', 'fr', 'ar'])->index();
            $table->string('tender_type');
            $table->string('tendering_sector');
            $table->longText('tender_detail');
            $table->softDeletes();
            $table->timestamps(); 
            $table->unique(['tender_id','locale']);
            $table->foreign('tender_id')->references('id')->on('tenders')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
