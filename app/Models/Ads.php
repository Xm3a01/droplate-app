<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ads extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    //  protected $fillable = ['name'];
    protected $fillable = [
        'link',
        'ar_link',
        'image',
        'ar_image'
    ];

    public function getImagesAttribute()
    {
        return $this->getFirstMedia('ads');
    }

    public function getArImagesAttribute()
    {
        return $this->getFirstMedia('ar_ads');
    }
}
