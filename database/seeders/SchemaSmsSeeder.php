<?php

namespace Database\Seeders;

use App\Domain\SchemaSms\Entities\SchemaSmsInstallment;
use App\Domain\SchemaSms\Interfaces\SchemaSmsType;
use Illuminate\Database\Seeder;

class SchemaSmsSeeder extends Seeder implements SchemaSmsType
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchemaSmsInstallment::create([
            'type' => self::AFTER_PAYMENT,
            "schema" => "",
        ]);
        SchemaSmsInstallment::create([
            'type' => self::EXPIRED_PAYMENT,
            "schema" => "",
        ]);
        SchemaSmsInstallment::create([
            'type' => self::DAY_OF_PAYMENT,
            "schema" => "",
        ]);
        SchemaSmsInstallment::create([
            'type' => self::REMAINDER_PAYMENT,
            "schema" => "",
        ]);

    }
}
