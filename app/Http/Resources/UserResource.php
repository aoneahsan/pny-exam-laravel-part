<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'api_token' => $this->api_token,
            'phone_number' => $this->phone_number,
            'role_id' => $this->roles[0]->id,
            'role_name' => $this->roles[0]->name,
            'profession' => $this->user_details->profession,
            'profile_image' => $this->getProfileImage(),
            'mariage_status' => $this->user_details->mariage_status,
            'gender' => $this->user_details->gender,
            'date_of_birth' => $this->user_details->date_of_birth,
            'zip_code' => $this->user_details->zip_code,
            'number' => $this->user_details->number,
            'address' => $this->user_details->address,
            'neighborhood' => $this->user_details->neighborhood,
            'state' => $this->user_details->state,
            'company_name' => $this->user_details->company_name
        ];
    }
}
