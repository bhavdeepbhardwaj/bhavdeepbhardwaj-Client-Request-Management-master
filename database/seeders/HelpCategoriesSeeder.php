<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HelpCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('help_categories')->count() == 0){

            DB::table('help_categories')->insert([
            [
                'name' => 'Create Ticket Help',
                'user_id' => '3',
            ],

            [
                'name' => 'Ticket Show Help',
                'user_id' => '3',
            ],

            [
                'name' => 'Comment Ticket Help',
                'user_id' => '3',
            ],

            [
                'name' => 'Comment Show Help',
                'user_id' => '3',
            ],

            [
                'name' => 'Create Ticket Help',
                'user_id' => '2',
            ],

            [
                'name' => 'Ticket Show Help',
                'user_id' => '2',
            ],

            [
                'name' => 'Comment Ticket Help',
                'user_id' => '2',
            ],

            [
                'name' => 'Comment Show Help',
                'user_id' => '2',
            ],

         ]);

        }
        else {
            echo "\e[Table is not empty, therefore NOT "; }

    }
}
