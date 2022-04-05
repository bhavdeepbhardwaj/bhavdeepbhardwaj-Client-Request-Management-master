<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('statuses')->count() == 0){

            DB::table('statuses')->insert([
        [
                'name' => 'N/A',
            ],

            [
                'name' => 'Open',
            ],

            [
                'name' => 'Processing',
            ],

            [
                'name' => 'Pending from Client',
            ],

            [
                'name' => 'Closed',
            ],

            [
                'name' => 'Rejected',
            ],

         ]);

        }
        else {
            echo "\e[Table is not empty, therefore NOT "; }

    }
}
