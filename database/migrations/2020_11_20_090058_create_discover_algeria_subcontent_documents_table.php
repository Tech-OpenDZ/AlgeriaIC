<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscoverAlgeriaSubcontentDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discover_algeria_subcontent_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subcontent_id');
            $table->string('document_name');    
            $table->string('document');
            $table->foreign('subcontent_id')->references('id')->on('discover_algeria_subcontents')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discover_algeria_subcontent_documents');
    }
}
