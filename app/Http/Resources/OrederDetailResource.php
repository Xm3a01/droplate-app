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
            'selling_price' => (float)$this->selling_price,
            'purchasing_price' => (float)$this->purchasing_price,
            'vat' => (float)$this->vat,
            'wholesale_price' => (float)$this->wholesale_price,
            'product' => new ProductResource($this->product)
        ];
    }
}
