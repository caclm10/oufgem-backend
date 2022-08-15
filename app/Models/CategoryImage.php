<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'url', 'home_position'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
