<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDescriptionToBiReportsTranslateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bi_reports_translate', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('bi_reports_translate', function (Blueprint $table) {
            $table->longText('description')->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bi_reports_translate', function (Blueprint $table) {

        });
    }
}
