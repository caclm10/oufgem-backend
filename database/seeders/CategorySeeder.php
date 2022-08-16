<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'T-Shirt',
                'slug' => str('T-Shirt')->slug(),
            ],
            [
                'name' => 'Shirt',
                'slug' => str('Shirt')->slug(),
            ],
            [
                'name' => 'Outer',
                'slug' => str('Outer')->slug(),
            ],
        ]);

        DB::table('category_images')->insert([
            [
                'url' => null,
                'category_id' => 1,
            ],
            [
                'url' => null,
                'category_id' => 2,
            ],
            [
                'url' => null,
                'category_id' => 3,
            ],
        ]);
    }
}
