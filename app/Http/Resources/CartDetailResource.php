<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartDetailResource extends JsonResource
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
            'name' => $this->product->getTranslation('name' , 'en'),
            'ar_name' => $this->product->getTranslation('name' , 'ar'),
            'quantity' => $this->quantity,
            'price' => $this->price,
            'sub_total_price' => $this->sub_total_price,
            'images' => $this->product->images 
                  ? ImageResource::collection($this->product->images)
                  : "",
            
        ];
    }
}
