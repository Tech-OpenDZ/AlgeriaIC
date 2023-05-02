<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableSubscriptionsAddPriceKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn('price');
        });

        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('price_dollar', 255)->after('no_of_users');
            $table->string('price_dzd', 255)->after('price_dollar');
            $table->string('price_euro', 255)->after('price_dzd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            //
        });
    }
}
