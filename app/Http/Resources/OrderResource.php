<?php

namespace App\Http\Resources;

use App\Models\Setting;
use App\Traits\SettingTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'client_name' => $this->user ? $this->user->name : '',
            'client_phone' => $this->client_phone,
            'address' => $this->address,
            'lng' => $this->lng,
            'lat' => $this->lat,
            'order_status' => $this->order_status,
            'progress' => $this->progress,
            'vat' =>   $this->vat(),
            'delivery_price' => (float)$this->delivery_price,
            'total_discount' =>(float) $this->total_discount,
            'total_purchasing_price' => (float)$this->total_purchasing_price,
            'total_selling_price' => (float)$this->total_selling_price,
            'total_wholesale_price' => (float)$this->total_wholesale_price,
            'created_at' => $this->created_at,
            'order_finish_date' => ($this->created_at == $this->updated_at ? "" : $this->updated_at),
            'order_details'  => OrederDetailResource::collection($this->orderDetails)
        ];
    }
}
