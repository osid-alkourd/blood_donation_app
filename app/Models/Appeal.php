<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Appeal extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'user_id' , 'name' , 'description' , 'phone_number' , 'blood_type' , 'location' 
     ];

     protected $hidden = [
          'created_at',
          'deleted_at'
        ];

     public static function storeRules(){
          return [
            'name' => ['required' , 'string' , 'max:30' , 'min:4'] , 
            'description' => ['required' , 'min:10'] , 
            'phone_number' => ['required', 'numeric' , 'digits:10'] , 
            'blood_type' => ['required' , Rule::in(['A+', 'A-',  'B+', 'B-', 'O+', 'O-',  'AB+', 'AB-'])] , 
            'location' => ['required','string' , 'max:20' , 'min:2'] , 

          ];
     }

     public static function updateRules(){
          return [
               'name' => [ 'sometimes' ,'required' , 'string' , 'max:30' , 'min:4'] , 
               'description' => ['sometimes' ,'required' , 'min:10'] , 
               'phone_number' => ['sometimes' , 'required', 'numeric' , 'digits:10'] , 
               'blood_type' => ['sometimes' ,'required' , Rule::in(['A+', 'A-',  'B+', 'B-', 'O+', 'O-',  'AB+', 'AB-'])] , 
               'location' => [ 'sometimes' ,'required','string' , 'max:20' , 'min:2'] , 

             ];
     }
}
