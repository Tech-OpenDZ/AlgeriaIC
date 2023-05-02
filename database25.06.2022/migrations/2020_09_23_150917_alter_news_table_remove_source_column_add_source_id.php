<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterNewsTableRemoveSourceColumnAddSourceId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_translates', function (Blueprint $table) {
            $table->dropColumn('source');
        });
        Schema::table('news', function (Blueprint $table) {
            $table->unsignedInteger('source_id')->after('updated_by');

            // $table->foreign('source_id')->references('id')->on('news_sources')->onDelete('cascade');
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
