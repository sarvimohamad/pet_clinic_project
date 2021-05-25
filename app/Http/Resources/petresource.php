<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class petresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'name'=>$this->name,
            'age'=>$this->age,
            'user_id'=>$this->user_id
        ];
    }
}
