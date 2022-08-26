<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name', 'image', 'slug'
    ];

    public function types()
    {
        return $this->hasMany(Type::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Type::class);
    }

    public function image()
    {
        return $this->hasOne(CategoryImage::class);
    }
}
