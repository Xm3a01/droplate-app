<?php

namespace App\Http\Resources;

use App\Models\Ads;
use App\Http\Resources\ArAdsResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class AdsResource extends JsonResource
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
            'en' => EnAdsResource::collection(Ads::whereNotNull('link')->whereNotNull('image')->get()),
            'ar' => ArAdsResource::collection(Ads::whereNotNull('ar_link')->whereNotNull('ar_image')->get())  
        ];
    }
}
