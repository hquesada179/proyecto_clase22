<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $tecnologia = new Category();
        $tecnologia->name = "tecnologia";
        $tecnologia->description = "todo lo relacionado a tecnologia";
        $tecnologia->save();

    }
}
