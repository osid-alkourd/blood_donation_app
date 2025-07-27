<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DonationOffer extends Model
{
    use HasFactory , SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id', 'status', 'blood_type', 'phone_number', 'location', 
        'weight', 'age', 'id_number',  'name' , 'deleted_at'];

        
    public  function updateRules(){
          return [
            'blood_type' => [ 'sometimes' , 'required' , Rule::in(['A+', 'A-',  'B+', 'B-', 'O+', 'O-',  'AB+', 'AB-'])] , 
            'phone_number' => [ 'sometimes' ,'required', 'numeric' , 'digits:10'] , 
            'location' => [ 'sometimes' ,'required','string' , 'max:20' , 'min:2'] , 
            'weight' => [ 'sometimes' ,'required' , 'numeric' , 'max:158' , 'min:60'] , 
            'age' => ['sometimes' ,'required' , 'integer' , 'max:65' , 'min:17'] , 
            'id_number' => [ 'sometimes' , 'required' , 'numeric' , 'digits:9' , 
              Rule::unique('donation_offers')->ignore($this->id),
             // Rule::unique('donation_offers' , 'id_number')->ignore($this->route('donation')) ,
          //Rule::unique('donation_offers' , 'id_number')->ignore($this->route('donation')) ,

              ] ,  
            'name' => [ 'sometimes' , 'required', 'string' , 'max:30' , 'min:4'] ,  

             ];
     }
    protected $hidden = [
      'created_at',
      'updated_at',
      'deleted_at'
    ];
}
