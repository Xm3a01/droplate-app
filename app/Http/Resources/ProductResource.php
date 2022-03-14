<?php

namespace App\Http\Resources;

// use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'en_name' => $this->getTranslation('name' , 'en'),
            'ar_name' => $this->getTranslation('name' , 'ar'),
            'vat' => $this->vat,
            'selling_price' => $this->selling_price,
            'purchasing_price' => $this->purchasing_price,
            'wholesale_price' => $this->wholesale_price,
            'quantity' => $this->quantity,
            'rate' => $this->reviews()->count(),
            'favorites' => $this->favorites()->count(),
            'is_user_favorite' => $this->favorites()->IsFavorite(),
            'en_category' => $this->category->getTranslation('name' , 'en'),
            'ar_category' => $this->category->getTranslation('name' , 'ar'),
            'en_sub_category' => $this->subCategory->getTranslation('name' , 'en'),
            'ar_sub_category' => $this->subCategory->getTranslation('name' , 'ar'),
            'ar_description' => $this->getTranslation('descripton' , 'ar'),
            'en_description' => $this->getTranslation('descripton' , 'en'),
            'image' => $this->image,
            'reviews' => $this->reviews
        ];
    }
}
