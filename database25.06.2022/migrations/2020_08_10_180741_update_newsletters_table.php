<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('newsletters', function (Blueprint $table) {
            $table->unsignedInteger('customer_id')->nullable()->after('id');
            $table->unsignedInteger('created_by')->nullable()->after('customer_id');
            $table->unsignedInteger('updated_by')->nullable()->after('created_by');
            $table->string('company_name')->nullable()->change();
            $table->string('name')->nullable()->change();
            $table->string('job_title')->nullable()->change();
            $table->string('cell_phone')->nullable()->change();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
       
    }
}
