<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableBusinessOpportunitiesMakeSomeFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_opportunities', function (Blueprint $table) {
            $table->string('company_email')->nullable()->change();
            $table->string('company_contact')->nullable()->change();
            $table->string('reference_no_of_opportunity')->nullable()->change();
            $table->integer('sector_id')->unsigned()->nullable()->change();
            $table->integer('zone_id')->unsigned()->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_opportunities', function (Blueprint $table) {
            $table->string('company_email')->change();
            $table->string('company_contact')->change();
            $table->string('reference_no_of_opportunity')->change();
            $table->integer('sector_id')->change();
            $table->integer('zone_id')->change();
        });
    }
}
