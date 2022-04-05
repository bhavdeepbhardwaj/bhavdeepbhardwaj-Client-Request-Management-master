<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('categories')->count() == 0){

            DB::table('categories')->insert([
        [
                'name' => 'Social Media',
                'user_id' => '3',
            ],

            [
                'name' => 'Retail Artwork',
                'user_id' => '3',
            ],

            [
                'name' => 'Website / NEXSTMALL',
                'user_id' => '3',
            ],

            [
                'name' => 'SEO',
                'user_id' => '3',
            ],

            [
                'name' => 'Print Ads / Outdoor',
                'user_id' => '3',
            ],

            [
                'name' => 'Content',
                'user_id' => '3',
            ],

            [
                'name' => 'Reporting',
                'user_id' => '3',
            ],

            [
                'name' => 'EDM',
                'user_id' => '3',
            ],

            [
                'name' => '3rd Party eCommerce',
                'user_id' => '3',
            ],

            [
                'name' => 'Application Support',
                'user_id' => '3',
            ],

            [
                'name' => 'Video',
                'user_id' => '3',
            ],

            [
                'name' => 'Misc Work',
                'user_id' => '3',
            ],

         ]);

        }
        else {
            echo "\e[Table is not empty, therefore NOT "; }

    }
}
