<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\SubCategory;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia , HasTranslations , SoftDeletes;

    protected $translatable = ['name' , 'descripton'];
    protected $fillable  =[
        'name',
        'descripton',
        'purchasing_price',
        'selling_price',
        'discount',
        'wholesale_price',
        'quantity',
        'category_id',
        'sub_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    /**
     * Get the Images
     *
     * @param  string  $value
     * @return string
     */
    public function getImagesAttribute()
    {
        return $this->getMedia('products');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

   


}
