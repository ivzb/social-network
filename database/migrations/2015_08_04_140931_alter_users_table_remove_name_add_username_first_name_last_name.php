<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTableRemoveNameAddUsernameFirstNameLastName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('name');
            $table->string('username', 50)->unique()->after('id');
            $table->string('first_name', 50)->after('username');
            $table->string('last_name', 50)->after('first_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('username');
            $table->dropColumn('last_name');
            $table->dropColumn('first_name');
            $table->string('name')->after('id');
        });
    }
}