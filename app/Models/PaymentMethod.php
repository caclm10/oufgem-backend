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
        return $this->hasMany(EWalletAccount::class);
    }

    public function banks()
    {
        return $this->hasMany(BankAccount::class);
    }

    public function scopeEWallet()
    {
        return $this->where('type', 'e-wallet');
    }

    public function scopeBank()
    {
        return $this->where('type', 'bank');
    }
}
