<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id' , 
        'product_id',
        'review',
        'rate',
    ];


    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function product()
    {
        $this->belongsTo(Product::class);
    }
}
