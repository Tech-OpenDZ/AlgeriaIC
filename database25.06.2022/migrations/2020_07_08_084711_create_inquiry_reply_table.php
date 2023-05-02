<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiryReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry_reply', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inquiry_id')->unsigned();
            $table->text('reply');
            $table->integer('reply_by');
            $table->softDeletes();
            $table->foreign('inquiry_id')->references('id')->on('inquiries')->onDelete('cascade');
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
        Schema::dropIfExists('inquiry_reply');
    }
}
