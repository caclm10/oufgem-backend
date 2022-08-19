<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class PaymentAccountHelper
{
    protected static $credentials = [
        'e-wallet' => [
            'table' => 'e_wallet_accounts',
            'attribute' => 'phone_number'
        ],
        'bank' => [
            'table' => 'bank_accounts',
            'attribute' => 'number'
        ]
    ];

    public static function isUnique(string $type, array $data, string|int|null $ignoreID = null)
    {
        $credential = self::$credentials[$type];

        $table = DB::table($credential['table']);

        $query = $table
            ->where('payment_method_id', $data['method'])
            ->where('name', $data['name'])
            ->where($credential['attribute'], $data[$credential['attribute']]);

        if ($ignoreID) $query->where('id', '!=', $ignoreID);

        return !$query->exists();
    }
}
