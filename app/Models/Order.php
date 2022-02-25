<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    protected $with= [
        'products', 'user'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('amount');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
