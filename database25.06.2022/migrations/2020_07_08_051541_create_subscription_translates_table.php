<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('subscription_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscription_id')->unsigned();
            $table->enum('locale', ['en', 'fr', 'ar'])->index();
            $table->string('name', 50);
            $table->longText('description');
            $table->softDeletes();
            $table->unique(['subscription_id','locale']);
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
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
        Schema::dropIfExists('subscription_translates');
    }
}
