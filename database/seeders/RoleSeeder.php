<?php

namespace Database\Seeders;

use App\Domain\User\Entities\Role;
use App\Domain\User\Interfaces\Roles;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role' => Roles::USER
        ]);
        Role::create([
            'role' => Roles::SHOP
        ]);
        Role::create([
            'role' => Roles::ADMIN_MAIN
        ]);
        Role::create([
            'role' => Roles::ADMIN_MODERATOR
        ]);
        Role::create([
            'role' => Roles::NOT_ADMIN
        ]);


    }
}
