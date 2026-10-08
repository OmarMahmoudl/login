<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class EnsureAdministratorAndSubscriberRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $now = now();

        if (!DB::table('roles')->where('name', 'administrator')->exists()) {
            DB::table('roles')->insert([
                'name' => 'administrator',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        if (DB::table('roles')->where('name', 'subscriber')->exists()) {
            return;
        }

        $secondRole = DB::table('roles')->where('id', 2)->first();

        if ($secondRole && $secondRole->name === 'user') {
            DB::table('roles')->where('id', 2)->update([
                'name' => 'subscriber',
                'updated_at' => $now,
            ]);

            return;
        }

        DB::table('roles')->insert([
            'name' => 'subscriber',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
