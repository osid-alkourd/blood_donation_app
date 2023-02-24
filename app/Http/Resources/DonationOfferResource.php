<?php

namespace App\Http\Resources;

use App\Functions\DonationResponseCondition;
use Illuminate\Http\Resources\Json\JsonResource;

class DonationOfferResource extends JsonResource
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
            'name' => $this->name,
            'user_id' => $this->user_id,
            'blood_type' => $this->blood_type,
            'location' => $this->location,
            'phone_number' => $this->phone_number , 
            // // $this->mergeWhen(auth()->check()== $this->user_id , [
            // //     'id_number' => $this->id_number,
            // //     'age' => $this->age,
            // //     'weight' => $this->weight
            // // ]),
            // $this->mergeWhen(DonationResponseCondition::ownDonationOffers() , [
            //     'id_number' => $this->id_number,
            //     'age' => $this->age,
            //     'weight' => $this->weight
            // ]),
           
        ];
    }
}
