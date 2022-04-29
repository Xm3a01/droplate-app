<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user_id' => $this->user_id,
            'client_phone' => $this->client_phone,
            'address' => $this->address,
            'order_status' => $this->order_status,
            // 'total_price' => $this->total_price,
            'delivery_price' => (float)$this->delivery_price,
            'total_vat' =>(float) $this->total_vat,
            'total_purchasing_price' => (float)$this->total_purchasing_price,
            'total_selling_price' => (float)$this->total_selling_price,
            'total_wholesale_price' => (float)$this->total_wholesale_price,
            'order_details'  => OrederDetailResource::collection($this->orderDetails)
        ];
    }
}
