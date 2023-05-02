<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableSubscriptionsPermissionsDropFieldDeletedAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriptions_permissions', function (Blueprint $table) {
            $table->dropColumn(['deleted_at']);
            $table->dropColumn(['created_at']);
            $table->dropColumn(['updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions_permissions', function (Blueprint $table) {
            //
        });
    }
}
