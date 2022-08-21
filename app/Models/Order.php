<?php

namespace App\Models;

use App\Models\City;
use App\Models\Admin;
use App\Models\Region;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    public const DONE = 1;
    public const ACTIVE = 2;
    public const CANCEL = 0;


    use HasFactory , SoftDeletes;

    protected $fillable = [
        'user_id',
        'client_phone',
        'address',
        'order_status',
        'payed',
        'delivery_price',
        'total_discount',
        'total_purchasing_price',
        'total_selling_price',
        'total_wholesale_price',
        'is_payed',
        'driver_id',
        'city_id',
        'region_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function driver()
    {
        return $this->belongsTo(Admin::class , 'driver_id');
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
