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
            'total_price' => $this->cartDetails()->sum('sub_total_price'),
            'quantity' => $this->cartDetails()->sum('quantity'),
            'products' => CartDetailResource::collection($this->cartDetails)
        ];
    }
}
