<?php

namespace App\Models;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    public const DONE = 1;
    public const INPROGRESS = 2;
    public const CANCEL = 0;
    // public const DONE = 1;

    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_phone',
        'address',
        'order_status',
        // 'total_price',
        'delivery_price',
        'total_vat',
        'total_purchasing_price',
        'total_selling_price',
        'total_wholesale_price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
