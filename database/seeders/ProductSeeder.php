<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create(['name' => 'Kolam Renang Weekend', 'price' => 15000]);
        Product::create(['name' => 'Kolam Renang Weekday', 'price' => 20000]);
    }
}
