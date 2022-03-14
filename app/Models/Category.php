<?php

namespace App\Models;

use App\Models\SubCategory;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia , HasTranslations , SoftDeletes;

    protected $translatable = ['name'];

    protected $fillable = ['name'];



    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

}
