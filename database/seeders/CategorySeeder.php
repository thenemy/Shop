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
            "status" => true,
        ]);
        Category::create([
            "name" => "First category 1 ",
            "status" => true,
        ]);
        Category::create([
            "name" => "First category 2",
            "status" => true,
        ]);
        Category::create([
            "name" => "First category 3",
            "status" => true,
        ]);
        Category::create([
            "name" => "First category 4 ",
            "status" => true,
        ]);
        Category::create([
            "name" => "First category 5",
            "status" => true,
        ]);
        Category::create([
            "name" => "First category 6",
            "status" => true,
        ]);
        Category::create([
            "name" => "First category 665",
            "status" => true,
        ]);
        Category::create([
            "name" => "First category 32",
            "status" => true,
        ]);
        Category::create([
            "name" => "First category 6фыа",
            "status" => true,
        ]);
        Category::create([
            "name" => "First category 23",
            "status" => true,
        ]);

    }
}
