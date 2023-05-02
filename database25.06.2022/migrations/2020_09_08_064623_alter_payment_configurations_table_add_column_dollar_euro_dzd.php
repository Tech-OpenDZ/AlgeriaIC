<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPaymentConfigurationsTableAddColumnDollarEuroDzd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_configurations', function (Blueprint $table) {
            $table->dropColumn(['value']);
            $table->double('value_USD')->after('module_type');
            $table->double('value_DZD')->after('value_USD');
            $table->double('value_Euro')->after('value_DZD');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_configurations', function (Blueprint $table) {
            //
        });
    }
}
