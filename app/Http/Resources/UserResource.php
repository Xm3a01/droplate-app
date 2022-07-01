<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id ?? "",
            'name' => $this->name ? $this->name : "",
            'phone' => $this->phone,
            'email' => $this->email ? $this->email : "",
            'gender' => $this->gender ? $this->gender : "",
            'age' => $this->age ? $this->age : "",
            'address' => $this->address ? $this->address : "",
            'image' => $this->image ? $this->image : "",
            'points' => $this->wallet ?$this->wallet->points : 0,
            'membership' => $this->wallet ? $this->wallet->membership : 'blue',
            'money' => $this->wallet ? ($this->wallet->credit - $this->wallet->debit) : 0,
        ];
    }
}
