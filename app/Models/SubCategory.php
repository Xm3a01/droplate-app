<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Category;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model implements HasMedia
{
    use HasFactory , HasTranslations , InteractsWithMedia , SoftDeletes;

    protected $translatable = ['name'];
    protected $fillable = ['name' , 'category_id'];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }


    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('subCategories');
    }
}
