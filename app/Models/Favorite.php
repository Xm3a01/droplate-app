<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id' , 'product_id'];


    public function users()
    {
        $this->belongsToMany(User::class);
    }

    public function products()
    {
        $this->belongsToMany(Product::class);
    }

     /**
     * Scope a query to only include Is current user Favorite
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsFavorite($query)
    {
        return $query->where('user_id' , Auth::guard('sanctum')->user()->id)->first() ? true : false;
    }
}
