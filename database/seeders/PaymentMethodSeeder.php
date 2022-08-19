<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            [
                'name' => 'DANA',
                'type' => 'e-wallet'
            ],
            [
                'name' => 'GOPAY',
                'type' => 'e-wallet'
            ],
            [
                'name' => 'OVO',
                'type' => 'e-wallet'
            ],
            [
                'name' => 'BCA',
                'type' => 'bank'
            ],
            [
                'name' => 'Bank Mandiri',
                'type' => 'bank'
            ],
            [
                'name' => 'BRI',
                'type' => 'bank'
            ]
        ]);
    }
}
