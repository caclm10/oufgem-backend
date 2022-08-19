<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    const METHOD_TYPES = ['e-wallet', 'bank'];

    public $timestamps = false;

    protected $guarded = ['id'];

    public function ewallets()
    {
        return $this->hasMany(EWallet::class);
    }

    public function banks()
    {
        return $this->hasMany(Bank::class);
    }
}
