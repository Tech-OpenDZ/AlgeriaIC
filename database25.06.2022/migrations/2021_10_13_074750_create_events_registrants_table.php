<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_registrants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',25);
            $table->string('email',225)->length('50');
            $table->string('company');
            $table->string('job_title',25);
            $table->string('phone_number',20);
            $table->text('message');
            $table->string('note_events');
            $table->softDeletes();
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
        Schema::dropIfExists('events_registrants');
    }
}
