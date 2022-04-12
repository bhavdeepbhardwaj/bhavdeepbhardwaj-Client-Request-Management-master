<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();3
        $this->call([
            UserSeeder::class,
            BrandSeeder::class,
            CategoriesSeeder::class,
            RoleSeeder::class,
            PrioritiesSeeder::class,
            StatusesSeeder::class,
            CountrieSeeder::class,
            HelpCategoriesSeeder::class,
        ]);
    }
}
