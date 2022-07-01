<?php

namespace App\Models;

use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory , HasTranslations , SoftDeletes;

    protected $translatable = ['name'];

    protected $fillable = [
        'name',
        'lat',
        'lang',
        'regular_delivery_price',
        'fast_delivery_price',
    ];


    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    public function employees()
    {
        return $this->hasMany(Admin::class);
    }
}
