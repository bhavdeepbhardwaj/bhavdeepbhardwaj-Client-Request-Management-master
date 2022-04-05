<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('roles')->count() == 0) {

            DB::table('roles')->insert([
                [
                    'name' => 'Super Admin',
                    'guard_name' => 'superadmin',
                ],

                [
                    'name' => 'User',
                    'guard_name' => 'user',

                ],

                [
                    'name' => 'Client',
                    'guard_name' => 'client',

                ],

                [
                    'name' => 'Resources',
                    'guard_name' => 'resource',

                ],

                [
                    'name' => 'Employee',
                    'guard_name' => 'employee',

                ],

            ]);
        } else {
            echo "\e[Table is not empty, therefore NOT ";
        }
    }
}
