<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrederDetailResource extends JsonResource
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
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'quantity' => (int)$this->quantity,
            'selling_price' => $this->selling_price,
            'purchasing_price' => $this->purchasing_price,
            'discount' => $this->discount,
            'wholesale_price' => $this->wholesale_price,
            'product' => new ProductResource($this->product)
        ];
    }
}
