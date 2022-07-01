<?php

namespace App\Http\Resources;

use App\Traits\SettingTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'total_price' => (float)$this->cartDetails()->sum('price') * (float)$this->cartDetails()->sum('quantity'),
            'quantity' => (int)$this->cartDetails()->sum('quantity'),
            'sub_total_purchasing_price' => (float)$this->cartDetails()->sum('purchasing_price') * (float)$this->cartDetails()->sum('quantity'),
            'sub_total_discount' => (float)$this->cartDetails()->sum('discount') * (float)$this->cartDetails()->sum('quantity'),
            'sub_total_wholesale_price' => (float)$this->cartDetails()->sum('wholesale_price') * (float)$this->cartDetails()->sum('quantity'),
            'vat' => (float)$this->vat(),
            'cart_count' => $this->cartDetails()->count(),
            'products' => CartDetailResource::collection($this->cartDetails)

        ];
    }
}
