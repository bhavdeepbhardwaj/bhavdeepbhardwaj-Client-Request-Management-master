<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PrioritiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('priorities')->count() == 0){

            DB::table('priorities')->insert([
        [
                'name' => 'Low',
            ],

            [
                'name' => 'Medium',
            ],

            [
                'name' => 'High',
            ],

         ]);

        }
        else {
            echo "\e[Table is not empty, therefore NOT "; }

    }
}
