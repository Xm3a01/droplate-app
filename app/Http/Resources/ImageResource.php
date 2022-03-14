<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
//    public products =  collect($this->collection);

    public function toArray($request)
    {
        return [
           'image' => $this->getUrl()
        ];
    }
}
