<?php

namespace App\Http\Resources;

use App\Http\Resources\RegionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            'ar_name' => $this->getTranslation('name' , 'ar'),
            'en_name' => $this->getTranslation('name' , 'en'),
            'regular_delivery_price' => $this->regular_delivery_price,
            'fast_delivery_price' => $this->fast_delivery_price,
            'regions' => RegionResource::collection($this->regions)
        ];
    }
}
