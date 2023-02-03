<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PendingCustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return array_merge(parent::toArray($request), [
            'avatar' => env('APP_URL') . $this->avatar,
            'id_photo' => env('APP_URL') . $this->id_photo,
            'signature' => env('APP_URL') . $this->signature,
        ]);
    }
}
