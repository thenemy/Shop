<?php

namespace Database\Seeders;

use App\Domain\User\Entities\PlasticCard;
use App\Domain\User\Entities\User;
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
//        User::find(5)->plasticCard()->attach(PlasticCard::create(
//            [
//                'card_number' => "asdsad",
//                "expiry" => "asdsa",
//                "phone" => "ASD",
//                "card_token" => "ASDs",
//                "pan" => "ASD"
//            ]
//        ));

    }
}
