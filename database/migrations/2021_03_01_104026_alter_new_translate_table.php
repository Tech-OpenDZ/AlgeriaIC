<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterNewTranslateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_translates', function (Blueprint $table) {
            $table->dropColumn('summary');
        });
        Schema::table('news_translates', function(Blueprint $table)
        {
            $table->longText('summary')->after('title');
        });

   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_translates', function (Blueprint $table) {
            //
        });
    }
}
