<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'sub_total_price',
        'purchasing_price',
        'vat',
        'wholesale_price',
        'price',
        'sub_total_purchasing_price',
        'sub_total_vat',
        'sub_total_wholesale_price',
        'cart_id',
        'product_id',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
