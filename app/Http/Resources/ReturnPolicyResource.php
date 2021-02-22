<?php

namespace App\Http\Resources\ReturnPolicy;

use Illuminate\Http\Resources\Json\JsonResource;

class ReturnPolicyResource extends JsonResource
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
           // 'id' => $this->id,
           // 'name' => $this->name
        ];
    }
}
