<?php

namespace Database\Seeders;

use App\Domain\User\Entities\PlasticCard;
use App\Domain\User\Entities\User;
use Illuminate\Database\Seeder;

class CardSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::onlyUser()->first()->plasticCard()->attach(PlasticCard::create(
            [
                'card_number' => "asdsad",
                "expiry" => "asdsa",
                "phone" => "ASD",
                "card_token" => "ASDs",
                "pan" => "ASD"
            ]
        ));
    }
}
