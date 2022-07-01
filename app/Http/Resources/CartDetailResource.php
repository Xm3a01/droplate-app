<?php

namespace App\Http\Resources;

use App\Traits\SettingTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class CartDetailResource extends JsonResource
{

    use SettingTrait;
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
            'name' => $this->product->getTranslation('name' , 'en'),
            'ar_name' => $this->product->getTranslation('name' , 'ar'),
            'quantity' => (int)$this->quantity,
            // 'price' => (float)$this->price,
            // 'purchasing_price' => (float)$this->purchasing_price,
            // 'discount' => (float)$this->discount,
            'vat' => (float)$this->vat,
            'sub_total_discount' => (float)$this->discount * $this->quantity,
            'sub_total_price' => (float)$this->price * $this->quantity,
            'sub_total_purchasing_price' => (float)$this->purchasing_price * $this->quantity,
            'sub_total_wholesale_price' => (float)$this->wholesale_price * $this->quantity,
            'images' => $this->product->images 
                  ? ImageResource::collection($this->product->images)
                  : "",
            
        ];
    }
}
