<?php

namespace Database\Seeders;

use App\Domain\Category\Entities\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "name" => "First category",
        ]);
        Category::create([
            "name" => "First category 1 ",
        ]);
        Category::create([
            "name" => "First category 2",
        ]);
        Category::create([
            "name" => "First category 3",
        ]);
        Category::create([
            "name" => "First category 4 ",
        ]);
        Category::create([
            "name" => "First category 5",
        ]);
        Category::create([
            "name" => "First category 6",
        ]);
        Category::create([
            "name" => "First category 665",
        ]);
        Category::create([
            "name" => "First category 32",
        ]);
        Category::create([
            "name" => "First category 6фыа",
        ]);
        Category::create([
            "name" => "First category 23",
        ]);

    }
}
