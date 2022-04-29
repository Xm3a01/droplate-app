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
            'id' => $this->product->id,
            'name' => $this->product->getTranslation('name' , 'en'),
            'ar_name' => $this->product->getTranslation('name' , 'ar'),
            'quantity' => (int)$this->quantity,
            'price' => (float)$this->price,
            'sub_total_price' => (float)$this->sub_total_price,
            'sub_total_purchasing_price' => (float)$this->sub_total_purchasing_price,
            'sub_total_vat' => (float)$this->sub_total_vat,
            'sub_total_wholesale_price' => (float)$this->sub_total_wholesale_price,
            'purchasing_price' => (float)$this->purchasing_price,
            'vat' => (float)$this->vat,
            'wholesale_price' => (float)$this->wholesale_price,
            'images' => $this->product->images 
                  ? ImageResource::collection($this->product->images)
                  : "",
            
        ];
    }
}
