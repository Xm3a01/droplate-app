<?php

namespace App\Models;

use App\Models\User;
use App\Models\CartDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'total_price',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cartDetails()
    {
        return $this->hasMany(CartDetail::class);
    }
}
