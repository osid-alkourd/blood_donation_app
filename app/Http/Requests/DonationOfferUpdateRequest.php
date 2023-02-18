<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DonationOfferUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           
            'blood_type' => [ 'sometimes' , 'required' , Rule::in(['A+', 'A-',  'B+', 'B-', 'O+', 'O-',  'AB+', 'AB-'])] , 
            'phone_number' => [ 'sometimes' ,'required', 'numeric' , 'digits:10'] , 
            'location' => [ 'sometimes' ,'required','string' , 'max:20' , 'min:2'] , 
            'weight' => [ 'sometimes' ,'required' , 'numeric' , 'max:158' , 'min:60'] , 
            'age' => ['sometimes' ,'required' , 'integer' , 'max:65' , 'min:17'] , 
            'id_number' => [ 'sometimes' , 'required' , 'numeric' , 'digits:9' , 
              // Rule::unique('donation_offers')->ignore($reqeust->id),
              Rule::unique('donation_offers' , 'id_number')->ignore($this->route('donation')) ,
              ] ,  
            'name' => [ 'sometimes' , 'required', 'string' , 'max:30' , 'min:4'] ,      
        ];
    }
}
