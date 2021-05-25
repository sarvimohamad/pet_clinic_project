<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class vetresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' =>$this->user->id,
            'name'=>$this->user->name,
            'speciality'=>$this->speciality,

        ];
    }

}
