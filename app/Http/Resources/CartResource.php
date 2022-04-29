<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'total_price' => (float)$this->cartDetails()->sum('sub_total_price'),
            'quantity' => (int)$this->cartDetails()->sum('quantity'),
            'sub_total_purchasing_price' => (float)$this->cartDetails()->sum('sub_total_purchasing_price'),
            'sub_total_vat' => (float)$this->cartDetails()->sum('sub_total_vat'),
            'sub_total_wholesale_price' => (float)$this->cartDetails()->sum('sub_total_wholesale_price'),
            'products' => CartDetailResource::collection($this->cartDetails)

        ];
    }
}
