<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('brands')->count() == 0){

            DB::table('brands')->insert([
        [
                'name' => 'AVITA',
                'user_id' => '3',
            ],

            [
                'name' => 'NEXSTGO',
                'user_id' => '3',
            ],

            [
                'name' => 'VAIO',
                'user_id' => '3',
            ],

         ]);

        }
        else {
            echo "\e[Table is not empty, therefore NOT "; }

    }
}
