<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'produk';

    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    // Relasi dengan Cart
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
