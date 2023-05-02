<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonial_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('testimonial_id');
            $table->enum('locale',['en', 'fr', 'ar'])->index();
            $table->string('name');
            $table->string('sub_title');
            $table->longText('description');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['testimonial_id','locale']);
            $table->foreign('testimonial_id')->references('id')->on('testimonials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonial_translates');
    }
}
