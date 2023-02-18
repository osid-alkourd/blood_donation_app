<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DonationOfferRequest extends FormRequest
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
            'blood_type' => ['required' , Rule::in(['A+', 'A-',  'B+', 'B-', 'O+', 'O-',  'AB+', 'AB-'])] , 
            'phone_number' => ['required', 'numeric' , 'digits:10'] , 
            'location' => ['required','string' , 'max:20' , 'min:2'] , 
            'weight' => ['required' , 'numeric' , 'max:158' , 'min:60'] , 
            'age' => ['required' , 'integer' , 'max:65' , 'min:17'] , 
            'id_number' => ['required' , 'numeric' , 'digits:9'] ,  
            'name' => ['required', 'string' , 'max:30' , 'min:4'] , 
        ];
    }
    //'unique:donation_offers,id_number' , 
}
