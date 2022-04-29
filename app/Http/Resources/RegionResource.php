<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegionResource extends JsonResource
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
            'en_name' => $this->getTranslation('name' , 'en'),
            'ar_name' => $this->getTranslation('name' , 'ar'),
            'cities' => CityResource::collection($this->cities)
        ];
    }
}
