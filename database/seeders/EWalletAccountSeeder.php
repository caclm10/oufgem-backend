<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EWalletAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('e_wallet_accounts')->insert([
            [
                'payment_method_id' => 1,
                'name' => 'Cindy Rolexza',
                'phone_number' => '081360990134'
            ],
            [
                'payment_method_id' => 3,
                'name' => 'Cindy Rolexza',
                'phone_number' => '081360990134'
            ],
        ]);
    }
}
