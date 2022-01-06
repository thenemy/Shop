<?php

namespace Database\Seeders;

use App\Domain\Currency\Entities\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            'price'=>0,
            'date' => now()
        ]);
    }
}
