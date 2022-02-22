<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
