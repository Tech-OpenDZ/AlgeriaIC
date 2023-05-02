<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subscription_id');
            $table->string('name');
            $table->string('company');
            $table->string('company_name');
            $table->string('job_title');
            $table->string('mobile_number');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('note');
            $table->foreignId('pays_id')->constrained("pays");
            $table->string('password');
            $table->string('payment_mode')->nullable();
            $table->tinyInteger('terms_accepted');
            $table->tinyInteger('receive_promotions');
            $table->string('company_type', 50)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->enum('default_locale', ['en', 'fr', 'ar']);
            $table->string('reset_password_token')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("customers", function(Blueprint $table){
            $table->dropConstrainedForeignId('pays_id');

        });
        Schema::dropIfExists('customers');
    }
}
