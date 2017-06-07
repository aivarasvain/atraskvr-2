<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(LanguagesSeeder::class);
         $this->call(CategoriesSeeder::class);
         $this->call(CategoriesTranslationsSeeder::class);
         $this->call(PagesSeeder::class);
         $this->call(PagesTranslationsSeeder::class);
         $this->call(RolesSeeder::class);
    }
}
