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
                'card_number' => "8600123445678789",
                "expiry" => "23/23",
                "phone" => "+998911669982",
                "card_token" => "sadsad",
                "pan" => "8600******78789"
            ]
        ));
    }
}
