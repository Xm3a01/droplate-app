<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
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
            'image' => $this->image,
        ];
    }
}
