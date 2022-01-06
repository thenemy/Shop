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
        (new RoleSeeder())->run();
        (new CurrencySeeder())->run();
        (new SchemaSmsSeeder())->run();
        // \App\Models\User::factory(10)->create();
    }
}
