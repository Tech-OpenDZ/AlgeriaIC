<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscoverAlgeriaSubcontentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discover_algeria_subcontents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('content_id');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by'); 
            $table->tinyInteger('status');
            $table->tinyInteger('display_order');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('content_id')->references('id')->on('discover_algeria_contents')->onDelete('cascade');
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
        Schema::dropIfExists('discover_algeria_subcontents');
    }
}
