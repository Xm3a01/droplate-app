<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;

    // protected $table = 'order_detail';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'selling_price',
        'purchasing_price',
        'vat',
        'wholesale_price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
