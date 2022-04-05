<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CountrieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('countries')->count() == 0) {

            DB::table('countries')->insert([
                [
                    'name' => 'India',
                    'user_id' => '3',
                ],

                [
                    'name' => 'Bangladesh',
                    'user_id' => '3',
                ],

                [
                    'name' => 'Mauritius',
                    'user_id' => '3',
                ],

                [
                    'name' => 'Srilanka',
                    'user_id' => '3',
                ],

                [
                    'name' => 'Nepal',
                    'user_id' => '3',
                ],

                [
                    'name' => 'MEA',
                    'user_id' => '3',
                ],

            ]);
        } else {
            echo "\e[Table is not empty, therefore NOT ";
        }
    }
}
