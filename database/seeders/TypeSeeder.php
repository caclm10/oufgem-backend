<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [
                'name' => 'Long Slevee T-Shirt',
                'slug' => str('Long Slevee T-Shirt')->slug(),
                'category_id' => 1,
            ],
            [
                'name' => 'Long Sleeve Shirt',
                'slug' => str('Long Slevee Shirt')->slug(),
                'category_id' => 2
            ]
        ]);
    }
}
