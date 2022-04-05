<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('users')->count() == 0){

            DB::table('users')->insert([
        [
                'name' => 'Bhavdeep Bharadwaj',
                'email' => 'bhavdeep.bharadwaj@ashplan.media',
                'role' => '1',
                'prefix' => 'ADMIM',
                'is_admin' => '1',
                'password' => Hash::make('Bhavdeep@123'),
            ],

            [
                'name' => 'ASHPLAN Media',
                'email' => 'info@ashplan.media',
                'role' => '2',
                'prefix' => 'USER',
                'is_admin' => '0',
                'password' => Hash::make('Ashplan@123'),
            ],

            [
                'name' => 'AVITA India',
                'email' => 'contact@avita-india.com',
                'role' => '3',
                'prefix' => 'ADNESEA',
                'is_admin' => '0',
                'password' => Hash::make('Avita@123'),
            ],

            [
                'name' => 'Sandeep Rawat',
                'email' => 'sandeep.rawat@ashplan.media',
                'role' => '4',
                'prefix' => 'EMPLOYEE',
                'is_admin' => '0',
                'password' => Hash::make('Sandeep@123'),
            ],

            [
                'name' => 'Aman Sharma',
                'email' => 'aman.sharma@ashplan.media',
                'role' => '5',
                'prefix' => 'RESOURCE',
                'is_admin' => '0',
                'password' => Hash::make('Aman@123'),
            ]

         ]);

        }
        else {
            echo "\e[Table is not empty, therefore NOT "; }

    }
}
