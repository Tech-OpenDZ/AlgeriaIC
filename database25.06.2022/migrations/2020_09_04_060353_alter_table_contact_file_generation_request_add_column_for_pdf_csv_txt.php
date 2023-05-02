<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableContactFileGenerationRequestAddColumnForPdfCsvTxt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_file_generation_requests', function (Blueprint $table) {
            $table->dropColumn('file_path');
        });

        Schema::table('contact_file_generation_requests', function (Blueprint $table) {
            $table->string('keyword')->nullable()->after('customer_id');
            $table->string('file_path_xlsx')->nullable()->after('number_of_employees_to');
            $table->string('file_path_csv')->nullable()->after('file_path_xlsx');
            $table->string('file_path_pdf')->nullable()->after('file_path_csv');
            $table->string('file_path_txt')->nullable()->after('file_path_pdf');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_file_generation_request', function (Blueprint $table) {
            $table->dropColumn(['file_path_xlsx', 'file_path_csv', 'file_path_pdf', 'file_path_txt', 'keyword']);
        });
    }
}
