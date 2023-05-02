<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableBusinessOpportunityTranslatesMakeSomeFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_opportunity_translates', function (Blueprint $table) {
            $table->dropColumn(['company_presentation_text', 'project_description', 'contact_person']);    
        });

        Schema::table('business_opportunity_translates', function (Blueprint $table) {
            $table->string('company_presentation_text')->nullable()->after('company_name');
            $table->string('project_description')->nullable()->after('company_presentation_text');
            $table->string('contact_person')->nullable()->after('project_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_opportunity_translates', function (Blueprint $table) {
            
        });
    }
}
