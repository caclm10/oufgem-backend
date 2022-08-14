<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function payment()
    {
        return $this->hasOne(TransactionPayment::class);
    }

    public function products()
    {
        return $this->hasMany(TransactionProduct::class);
    }

    public function user()
    {
        return $this->hasOne(TransactionUser::class);
    }
}
