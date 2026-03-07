<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CategorySeeder::class);

        Product::factory(20)->create();
    }
}
