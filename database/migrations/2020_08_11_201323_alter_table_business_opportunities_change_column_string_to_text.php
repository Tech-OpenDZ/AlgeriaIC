<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableBusinessOpportunitiesChangeColumnStringToText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_opportunity_translates', function (Blueprint $table) {
            $table->dropColumn(['company_presentation_text', 'project_description']);
        });

        Schema::table('business_opportunity_translates', function (Blueprint $table) {
            $table->text('company_presentation_text')->nullable()->after('company_name');
            $table->text('project_description')->nullable()->after('company_presentation_text');
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
            //
        });
    }
}
