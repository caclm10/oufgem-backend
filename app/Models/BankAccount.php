<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
